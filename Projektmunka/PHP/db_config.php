<?php
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'score');

    try {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER, DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPRION);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
        die();
    }
?>