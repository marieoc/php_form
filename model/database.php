<?php
    $dsn = 'mysql:host=localhost;dbname=world';
    $username = 'root';
    // $password = 'password';

    try {
        $db = new PDO($dsn, $username);
        // $db = new PDO($dsn, $username, $password);
    }

    catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('view/error.php');
        exit();
    }

// closing tab for php is not necessary when there is no html on the page, but only php