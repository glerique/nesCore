<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

header('Content-Type: application/json');

$response = match ($uri) {
    '/' => json_encode([
        'message' => 'FrankenPHP is running!',
        'version' => PHP_VERSION,
        'server' => 'FrankenPHP'
    ]),
    '/health' => json_encode(['status' => 'ok']),
    default => null
};

if ($response !== null) {
    echo $response;
} else {
    http_response_code(404);
}
