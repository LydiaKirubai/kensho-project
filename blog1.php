<?php
// Optional: Get blog title/content from database or static source
$title = "Healing Through Trauma-Informed Therapy";
$date = "July 18, 2025";
$image = "images/54da9d90-dfa6-42a2-8008-b9c8536f8a78.png"; // Use your uploaded image
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title) ?> - Kensho Project</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fffefc] text-gray-800 font-sans">

  <?php include 'includes/navbar.php'; ?>

  <main class="max-w-5xl mx-auto px-4 md:px-8 py-12">
    <!-- Blog Header Image -->
    <div class="mb-10">
      <img src="assets/img/about-us.png" alt="Blog Cover" class="rounded-2xl shadow-xl w-full object-contain h-64 sm:h-96" />
    </div>

    <!-- Title and Meta -->
    <h1 class="text-3xl md:text-4xl font-bold text-primary mb-3"><?= htmlspecialchars($title) ?></h1>
    <p class="text-sm text-gray-500 mb-8">Published on <?= $date ?></p>

    <!-- Blog Content -->
    <article class="prose lg:prose-lg max-w-none text-gray-700">
      <p>Trauma-informed care offers a compassionate framework that honors the complexity of healing. It helps you move at your own pace, gently creating space to feel safe in your body again.</p>

      <p>Therapists trained in this method focus on your autonomy, consent, and emotional regulation. Instead of pushing through, they guide you to notice your body’s responses and build resilience through awareness.</p>

      <p>This approach reminds us that healing is not linear, and safety is foundational. By reconnecting with your inner wisdom and understanding your nervous system, you can begin to feel empowered and supported.</p>

      <p>It’s okay to move slowly. You deserve healing that meets you with gentleness and respect.</p>
    </article>

    <!-- Back Button -->
    <div class="mt-10">
      <a href="blogs.php" class="text-secondary font-semibold hover:underline flex items-center gap-2">
        <i class="fas fa-arrow-left"></i> Back to all blogs
      </a>
    </div>
  </main>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
