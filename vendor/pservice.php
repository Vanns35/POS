<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nailit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['reg_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $add = mysqli_real_escape_string($conn,$_POST['add']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO customer (Cust_name, Cust_add, Cust_mobile, Cust_email)
VALUES ('$name', '$add', '$phone','email')";



if ($conn->query($sql) === TRUE) {
    echo "alert('New record created successfully')";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>