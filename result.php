<?php
$conn = new mysqli(localhost, root, toor, noel_test);
$sql = "SELECT * FROM noel_test.names;";
$result = mysqli_query($sql);
while($row=mysqli_fetch_array($result)){
echo $row['name'];
};

