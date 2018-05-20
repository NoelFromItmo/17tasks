<?php
$conn = new mysqli(localhost, root, toor, noel_test);
$sql = "SELECT * FROM noel_test.names;";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
echo $row['name'];
};

