<?php
http_response_code(503);
$app = require_once __DIR__ . '/../source/app.php';

$uri = parse_url($_SERVER['REQUEST_URI']);
parse_str($uri['query'], $query);
$_GET = array_merge($_GET, $query);

$action = $_GET['action'] ?? false;
if ($action)
{
    $app->action($action);
    exit();
}

$viewName = $_SERVER['PATH_INFO'] ?? $query['path'] ?? 'index';
$app->renderPage($viewName);