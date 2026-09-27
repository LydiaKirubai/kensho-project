<?php
require_once __DIR__ . '/auth.php';
require_admin();

$sources = [
    'contact_submissions' => 'Contact Form',
    'course_email'        => 'Course Form',
    'email_list'          => 'Free Guide Form',
];
$badgeClass = [
    'Contact Form'    => 'badge-contact',
    'Course Form'     => 'badge-course',
    'Free Guide Form' => 'badge-guide',
];
$dateColumns = ['created_at', 'submitted_at', 'subscribed_at', 'date', 'timestamp'];
$hiddenColumns = ['id'];

$conn = db_connect();
$rows = [];
$columns = [];
$counts = [];
$loadErrors = [];

if ($conn) {
    foreach ($sources as $table => $label) {
        $result = $conn->query('SELECT * FROM `' . $table . '`');
        if (!$result) {
            $loadErrors[] = $label;
            continue;
        }
        $counts[$label] = $result->num_rows;

        while ($row = $result->fetch_assoc()) {
            $submittedAt = null;
            foreach ($dateColumns as $col) {
                if (array_key_exists($col, $row)) {
                    $submittedAt = $row[$col];
                    unset($row[$col]);
                    break;
                }
            }
            foreach ($hiddenColumns as $col) {
                unset($row[$col]);
            }
            foreach (array_keys($row) as $col) {
                $columns[$col] = true;
            }
            $rows[] = [
                'source' => $label,
                'fields' => $row,
                'time'   => $submittedAt ? (int)strtotime($submittedAt) : 0,
            ];
        }
        $result->free();
    }

    usort($rows, function ($a, $b) {
        return $b['time'] <=> $a['time'];
    });
}

$columns = array_keys($columns);

$perPage = 10;
$totalRows = count($rows);
$totalPages = max(1, (int)ceil($totalRows / $perPage));
$page = min(max(1, (int)($_GET['page'] ?? 1)), $totalPages);
$offset = ($page - 1) * $perPage;
$pageRows = array_slice($rows, $offset, $perPage);

function page_links(int $page, int $totalPages): array
{
    $links = [1, $totalPages];
    for ($i = $page - 2; $i <= $page + 2; $i++) {
        if ($i > 1 && $i < $totalPages) {
            $links[] = $i;
        }
    }
    $links = array_unique($links);
    sort($links);
    return $links;
}

function column_label(string $col): string
{
    return ucwords(str_replace('_', ' ', $col));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Form Submissions - Kensho Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/my-favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/my-favicon/favicon.svg" />
    <link rel="shortcut icon" href="/my-favicon/favicon.ico" />
    <style>
        :root {
            --primary: #1B3592;
            --secondary: #0F7EC3;
            --accent: #678C25;
            --bg: #f6fdf6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg);
            color: #333;
        }

        .header {
            background-color: var(--primary);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .header .user {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 14px;
        }

        .header a {
            background: var(--secondary);
            color: white;
            padding: 9px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .header a:hover {
            background-color: #0c6ead;
        }

        .dashboard {
            max-width: 1300px;
            margin: 30px auto;
            padding: 24px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .dashboard h2 {
            color: var(--primary);
            margin: 0 0 12px;
        }

        .summary {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .summary span {
            background: #eef4ff;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .notice {
            background: #fdecea;
            color: #a93226;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
            font-size: 14px;
        }

        th {
            background-color: #e6f0ea;
            color: var(--accent);
            white-space: nowrap;
        }

        tr:hover td {
            background-color: #f9f9f9;
        }

        td.message {
            min-width: 240px;
            max-width: 420px;
            word-wrap: break-word;
        }

        td.empty {
            color: #bbb;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-contact {
            background: #e3ebff;
            color: var(--primary);
        }

        .badge-course {
            background: #eaf4dc;
            color: #4d6b1b;
        }

        .badge-guide {
            background: #e0f2fb;
            color: #0b6394;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
            font-size: 14px;
        }

        .page-info {
            color: #666;
        }

        .pages {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pages a,
        .pages span {
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: var(--primary);
            background: #fff;
        }

        .pages a:hover {
            background: #eef4ff;
            border-color: var(--secondary);
        }

        .pages .current {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            font-weight: bold;
        }

        .pages .disabled {
            color: #ccc;
        }

        .pages .gap {
            border: none;
            min-width: auto;
            padding: 0 4px;
        }

        @media (max-width: 768px) {
            .dashboard {
                margin: 15px;
                padding: 15px;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 8px;
            }

            td {
                border-bottom: none;
                padding: 6px 4px;
            }

            td.message {
                max-width: none;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                color: var(--accent);
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h1><i class="fas fa-leaf"></i> Kensho Admin</h1>
    <div class="user">
        <span><i class="fas fa-user"></i> <?= htmlspecialchars(admin_user()) ?></span>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="dashboard">
    <h2><i class="fas fa-inbox"></i> Form Submissions</h2>

    <?php if (!$conn): ?>
        <div class="notice">Could not connect to the database. Check the settings in <code>.env</code>.</div>
    <?php else: ?>
        <div class="summary">
            <span><strong><?= $totalRows ?></strong> total</span>
            <?php foreach ($counts as $label => $count): ?>
                <span><?= htmlspecialchars($label) ?>: <strong><?= $count ?></strong></span>
            <?php endforeach; ?>
        </div>

        <?php if ($loadErrors): ?>
            <div class="notice">Could not load: <?= htmlspecialchars(implode(', ', $loadErrors)) ?>.</div>
        <?php endif; ?>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Form</th>
                        <?php foreach ($columns as $col): ?>
                            <th><?= htmlspecialchars(column_label($col)) ?></th>
                        <?php endforeach; ?>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$rows): ?>
                        <tr><td colspan="<?= count($columns) + 2 ?>">No submissions yet.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($pageRows as $r): ?>
                        <tr>
                            <td data-label="Form">
                                <span class="badge <?= $badgeClass[$r['source']] ?? '' ?>"><?= htmlspecialchars($r['source']) ?></span>
                            </td>
                            <?php foreach ($columns as $col): ?>
                                <?php
                                $value = $r['fields'][$col] ?? null;
                                $label = htmlspecialchars(column_label($col));
                                ?>
                                <?php if ($value === null || $value === ''): ?>
                                    <td data-label="<?= $label ?>" class="empty">&mdash;</td>
                                <?php else: ?>
                                    <td data-label="<?= $label ?>"<?= $col === 'message' ? ' class="message"' : '' ?>><?= nl2br(htmlspecialchars((string)$value)) ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td data-label="Created At"><?= $r['time'] ? date('d/m/y', $r['time']) : '&mdash;' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if ($totalRows > 0): ?>
            <div class="pagination">
                <span class="page-info">
                    Showing <?= $offset + 1 ?>&ndash;<?= $offset + count($pageRows) ?> of <?= $totalRows ?>
                </span>
                <?php if ($totalPages > 1): ?>
                    <nav class="pages" aria-label="Pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1 ?>" aria-label="Previous page"><i class="fas fa-chevron-left"></i></a>
                        <?php else: ?>
                            <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                        <?php endif; ?>

                        <?php $prev = 0; ?>
                        <?php foreach (page_links($page, $totalPages) as $p): ?>
                            <?php if ($p - $prev > 1): ?>
                                <span class="gap">&hellip;</span>
                            <?php endif; ?>
                            <?php if ($p === $page): ?>
                                <span class="current" aria-current="page"><?= $p ?></span>
                            <?php else: ?>
                                <a href="?page=<?= $p ?>"><?= $p ?></a>
                            <?php endif; ?>
                            <?php $prev = $p; ?>
                        <?php endforeach; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1 ?>" aria-label="Next page"><i class="fas fa-chevron-right"></i></a>
                        <?php else: ?>
                            <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                        <?php endif; ?>
                    </nav>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
