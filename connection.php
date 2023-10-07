<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Scandiweb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully <br>";

    // Create database for the first time only
    $sql = "CREATE DATABASE IF NOT EXISTS {$database}";
    if ($conn->query($sql) === TRUE) {
        // echo "Database created successfully <br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
    mysqli_select_db($conn, $database);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS Products (
                SKU VARCHAR(12) PRIMARY KEY,
                pname VARCHAR(30) NOT NULL,
                price INT(6) NOT NULL,
                create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table Products created successfully <br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    
?>
