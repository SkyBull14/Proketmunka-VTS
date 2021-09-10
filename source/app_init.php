<?php
require __DIR__ . '/db_config.php';
require __DIR__ . '/app_config.php';
require __DIR__ . '/core/App.php';

function debug(string $label, $var)
{
    $var = var_export($var, true);
    echo "<pre>$label: $var</pre>" . PHP_EOL;
}

function error_handler($error)
{
    http_response_code(500);
    echo get_class($error) . ': ' .  $error->getMessage() . ' in ' . $error->getFile() . ':' . $error->getLine() . PHP_EOL;
}

set_exception_handler('error_handler');

return new App();
