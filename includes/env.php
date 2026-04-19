<?php

/**
 * Minimal .env loader (no Composer). Loads KEY=value into getenv() and $_ENV.
 */
function loadEnv(string $path): void
{
    if (!is_readable($path)) {
        return;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }
        if (strpos($line, '=') === false) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if ($value !== '' && strlen($value) >= 2) {
            $q = $value[0];
            if (($q === '"' || $q === "'") && $value[strlen($value) - 1] === $q) {
                $value = substr($value, 1, -1);
            }
        }
        putenv($name . '=' . $value);
        $_ENV[$name] = $value;
    }
}

/**
 * @param mixed $default
 * @return mixed|string|null
 */
function env(string $key, $default = null)
{
    if (array_key_exists($key, $_ENV)) {
        $v = $_ENV[$key];
        return $v === '' ? $default : $v;
    }
    $v = getenv($key);
    if ($v === false) {
        return $default;
    }
    return $v === '' ? $default : $v;
}
