<?php
$base = __DIR__;

require $base . '/vendor/autoload.php';

if (class_exists(\Dotenv\Dotenv::class) && !function_exists('env')) {
  function env(string $key, $default = null)
  {
    static $repository = null;

    if ($repository === null) {
      $base = __DIR__;
      $repository = \Dotenv\Repository\RepositoryBuilder::createWithDefaultAdapters()->immutable()->make();
      \Dotenv\Dotenv::create($repository, $base)->safeLoad();
    }

    $value = $repository->get($key);

    if ($value === null) {
      return $default instanceof \Closure ? $default() : $default;
    }

    return match (strtolower($value)) {
      'true', '(true)' => true,
      'false', '(false)' => false,
      'empty', '(empty)' => '',
      'null', '(null)' => null,
      default => preg_match('/\A([\'"])(.*)\1\z/', $value, $matches) ? $matches[2] : $value
    };
  }
}

require 'kirby/bootstrap.php';

echo (new Kirby)->render();
