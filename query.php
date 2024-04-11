<?php
    // Database connection parameters
    $servername = "127.0.0.1";
    $username = "root";
    $password = "computer"; 
    $database = "vahini";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_errno . " - " . $conn->connect_error);

    }

    // SQL query
    $sql = "SELECT * FROM emp";
    $result = $conn->query($sql);

    // Output data
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ename: " . $row["ename"]. " - job: " . $row["job"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>
