<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";

$sendmail_path = ini_get('sendmail_path');
echo "Sendmail PATH: $sendmail_path" . PHP_EOL;

echo PHP_EOL;

$opts = [
    "From: sender@mailhog.local"
];

$mail = mail('recipient@mailhog.local', 'subject', 'message', implode("\r\n", $opts));
echo "Test: " . var_export($mail, true) . PHP_EOL;

echo PHP_EOL;
print_r(error_get_last());