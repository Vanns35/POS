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
  $add1 = mysqli_real_escape_string($conn,$_POST['add1']);
  $add2 = mysqli_real_escape_string($conn,$_POST['add2']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $service_name = $_POST['service_name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = $_POST['total'];
  // $grand_total = mysqli_real_escape_string($conn,$_POST['grand_total']);

  // $qty = mysqli_real_escape_string($conn, $_POST['quantity']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO customers (Cust_name, Cust_add, Cust_add_2 ,Cust_mobile, Cust_email)
VALUES ('$name', '$add1', '$add2' , '$phone','email')";

if ($conn->query($sql) === TRUE) {
    $cust_id = $conn->insert_id;

    if (is_array($quantity)) {
	  for ($i=0;$i<count($quantity);$i++) {
	   $sql = "INSERT INTO service (order_name, quantity, unit_price, cust_id) VALUES ('$service_name[0]', '$quantity[0]', '$price[0]','$cust_id')";
	   $conn->query($sql);
	  }
    header("Location: http://localhost/NailIt/invoice.php?cust_id=".$cust_id); 
	}
	else {
		$sql = "INSERT INTO service (order_name, quantity, unit_price, cust_id) VALUES ('$service_name', '$quantity', '$price','$cust_id')";

		if ($conn->query($sql) === TRUE) {
		    echo "alert('New record created successfully')";
		}
		else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>