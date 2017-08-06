<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Exception\InvalidPathException;

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (InvalidPathException $e) {
    throw new InvalidPathException($e->getMessage());
}
