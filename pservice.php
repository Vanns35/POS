<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nailit";


$errors = array(); 

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


  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($service_name)) { array_push($errors, "Service is required"); }
  if (empty($quantity)) { array_push($errors, "Quantity is required"); }
  if (empty($price)) { array_push($errors, "Price is required"); }
  // $grand_total = mysqli_real_escape_string($conn,$_POST['grand_total']);

  // $qty = mysqli_real_escape_string($conn, $_POST['quantity']);

 if(count($errors) == 0){
  $user_check_query = "SELECT * FROM customers WHERE Cust_mobile ='$phone' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Cust_mobile'] === $phone) {
      array_push($errors, "Phone number already exists");
    }
  }
}

      if (count($errors) == 0){
            // Check connection
            if ($conn->connect_error) {
                    array_push($errors, $conn->connect_error);
            } 
      
            $sql = "INSERT INTO customers (Cust_name, Cust_add, Cust_add_2 ,Cust_mobile, Cust_email)
            VALUES ('$name', '$add1', '$add2' , '$phone','email')";
      
            if ($conn->query($sql) === TRUE) {
                $cust_id = $conn->insert_id;
      
              if (is_array($quantity)) {
                  for ($i=0;$i<count($quantity);$i++) {
                   $sql = "INSERT INTO service (order_name, quantity, unit_price, cust_id) VALUES ('$service_name[$i]', '$quantity[$i]', '$price[$i]','$cust_id')";
                   $conn->query($sql);
                  }
                  header("Location: http://localhost/NailIt/invoice.php?cust_id=".$cust_id); 
              }
              else {
                $sql = "INSERT INTO service (order_name, quantity, unit_price, cust_id) VALUES ('$service_name', '$quantity', '$price','$cust_id')";
                if ($conn->query($sql) === TRUE) {
                  header("Location: http://localhost/NailIt/invoice.php?cust_id=".$cust_id); 
                }
                else {
                    array_push($errors, $conn->error); 
                }
              }
            } else {
                array_push($errors, $conn->error); 

            }
      }
}

$conn->close();
?>