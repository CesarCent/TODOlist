<?php
    $host = 'localhost';
    $db = 'todo_db';
    $user = 'root';
    $password = '';

    $dsn = "mysql:host=$host;dbname=$db";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user,$password, $options);
    } catch (\PDOExeption $e ) {
        echo $e->getMessage();
    }
?>