<?php
    $host = "192.168.65.2";
    $user = "sa";
    $password = "mon60053";
    $dbname="fcatdb";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];

    try {
        $connection = new PDO("sqlsrv:Server=$host,1433; Database=$dbname", $user, $password);


    } catch(PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
        exit;
    }
    echo"Connection Successful";
    ?>
