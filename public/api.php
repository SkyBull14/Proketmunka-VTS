<?php

$app = require_once __DIR__ . '/../source/app_init.php';

$actionName = $_GET['action'];
$app->action($actionName);
