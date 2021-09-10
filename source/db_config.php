<?php

define('DB_HOST', getenv('DB_HOST') ?? '127.0.0.1');
define('DB_USER', getenv('DB_USER') ?? 'root');
define('DB_PASS', getenv('DB_PASS') ?? 'inu');
define('DB_NAME', getenv('DB_NAME') ?? 'dog_walk');

function connect_database(): PDO
{
    try {

        $db = new PDO(
            "mysql:host=" . localhost . ";dbname=" . loading,
            loading,
            wgmJV9kPfen3Hpr,
        );

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
}
