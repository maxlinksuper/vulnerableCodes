<?php
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysqli = new mysqli('localhost', 'dbuser', 'dbpassword', 'example');

    if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }

    $sql = "SELECT * FROM employees 
    WHERE username = $username 
    AND password = $password";

    if ($result = $mysqli->query($sql)) {
        while($obj = $result->fetch_object()) {
            echo($result);
        }
    }
    elseif($mysqli->error) {
            echo($mysqli->error);
        }
}