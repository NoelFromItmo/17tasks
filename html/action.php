<?php

$conn = new mysqli("localhost", "root", "toor", "noel_test");
$a = $_POST['name'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO noel_test.names (name) VALUES ('$a')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
