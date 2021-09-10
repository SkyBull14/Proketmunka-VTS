<?php

define('APP_SECRET', getenv('APP_SECRET') ?: 'goulash');

define('SMTP_HOST', getenv('SMTP_HOST') ?: '127.0.0.1');
define('SMTP_PORT', getenv('SMTP_PORT') ?: '25');
define('SMTP_USER', getenv('SMTP_USER') ?: 'root');
define('SMTP_PASS', getenv('SMTP_PASS') ?: '');
