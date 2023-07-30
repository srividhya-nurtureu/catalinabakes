<?php


$con = mysqli_connect('localhost', 'root');
if ($con) {
  echo "Connection Successful";
} else {
  echo "Connection Failed: " . mysqli_connect_error();
}

mysqli_select_db($con, 'catalinabakes');

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];

$query = "INSERT INTO user (Name, Email, PhoneNumber) VALUES ('$Name', '$Email', '$PhoneNumber')";
$result = mysqli_query($con, $query);
if ($result) {
  echo "Data inserted successfully";
} else {
  echo "Error: " . mysqli_error($con);
}

header('location:index.php#Contact');


?>


