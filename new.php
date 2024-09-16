<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username) && !empty($password)) {
    $conn = new mysqli("localhost", "root", "", "account");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Username and password should not be empty";
}
?>
