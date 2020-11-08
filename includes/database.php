<?php

    define('HOST', 'localhost');
    define('DB', '3il_cine');
    define('USER', 'root');
    define('PASS', '');

    try {
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
    }
?>