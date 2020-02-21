<?php
session_start();

$_SESSION['cust_id'] = 'green';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Invoice</title>

 <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
              <style type="text/css">
         @media print {
       #printPageButton {
        display: none;
        }
        }

                 @media print {
       #printPage {
        display: none;
        }
        }


        </style>
</head>

   <body class="fixed-nav sticky-footer" id="page-top">

    <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Nail it - Gel it to nail it</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="service.php">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">New entry</span>
          </a>
        </li>

         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <!-- <a class="nav-link" href="invoice.php?id=1"> -->
          <a class="nav-link" href="users.php">
            <i class="fa fas fa-user"></i>
            <span class="nav-link-text">All Users</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="content-wrapper" id="printPage">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
    </div>
  </div>

    <div class="content-wrapper">
    <div class="container-fluid">

            <button id="printPageButton" onclick="myFunction()">Print this page</button>
    </div>
  </div>

<div class="container">
  <div class="card">
<div class="card-header" style="display: none;">
Invoice :
<strong>121</strong> 
  <span class="float-right"> <strong>Date : </strong>20/02/2020</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-4">
<div>
<strong>Nail it - Gel nail studio</strong>
</div>
<div>c/o Derma Touch Skin Laser Hair Clinic,</div>
<div>Springfield, near reliance mall,</div>
<div>Kharadi, Pune-411014</div>
</div>

<div class="col-sm-4" style="text-align: center;">
<img src="./nail_logo.png" alt="logo" style="height: 100px; width: 100px;">
</div>

<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "nailit";
 
 $cust_id = $_GET['cust_id'];
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 $sql = "SELECT * from customers WHERE Cust_id='$cust_id'";
 if (mysqli_query($conn, $sql)) {
 echo "";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 $count=1;
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) { ?>

<div class="col-sm-4" style="text-align: right;">
<h6 class="mb-3">To : </h6>
<div>
<strong> <?php echo $row['Cust_name']; ?></strong>
</div>
<div><?php echo $row['Cust_add']; ?></div>
<div><?php echo $row['Cust_add_2']; ?></div>
<div>Email : <?php echo $row['Cust_email']; ?></div>
<div><?php echo $row['Cust_mobile']; ?></div>
</div>
<?php
 $count++;
 }
 } else {
 echo '0 results';
 }
 ?>

</div>

<div class="table-responsive-sm">
<?php
  if(isset($_GET['id']))
{
$item_id = $_GET['id'];
echo $item_id;
}
?>


<table class="table table-striped" id="tab_logic">
<thead>
<tr>
<th class="center">ID</th>
<th>Service</th>
<th class="right">Unit Cost</th>
  <th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>


<tbody>

  <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "nailit";
 
 $cust_id = $_GET['cust_id'];

 $i =1 ;
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 $sql = "SELECT * from service WHERE cust_id='$cust_id'";
 if (mysqli_query($conn, $sql)) {
 echo "";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 $count=1;
 $grand_total = 0;

 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) { ?>


<tr>
<td class="center"><?php echo $i++ ?></td>
<td class="left strong"><?php echo $row['order_name']; ?></td>
<td class="left" id="price"><?php echo $row['unit_price']; ?></td>
<td class="right" id="quantity"><?php echo $row['quantity']; ?></td>
<td class="right" id="total"> <?php echo $row['quantity']*$row['unit_price']?></td>
</tr>
<?php
  $grand_total = $grand_total + ($row['quantity']*$row['unit_price']);
 $count++;
   }
?>

</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr style="display: none;">
<td class="left">
<strong>Subtotal</strong>
</td>
<td class="right">$8.497,00</td>
</tr>
<tr style="display: none;">
<td class="left">
<strong>Discount (20%)</strong>
</td>
<td class="right">$1,699,40</td>
</tr>
<tr style="display: none;">
<td class="left">
 <strong>VAT (10%)</strong>
</td>
<td class="right">$679,76</td>
</tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong><?php echo $grand_total ?></strong>
</td>
</tr>
</tbody>
</table>
<?php
 } else {
 echo '0 results';
 }
 ?>

</div>

</div>

</div>
</div>
</div>

            
            <script>
            function myFunction() {
              window.print();
            }

            function calc()
            {
              $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if(html!='')
                {
                  var quantity = $(this).find('.quantity').val();
                  var price = $(this).find('.price').val();
                  $(this).find('.total').val(quantity*price);
                  
                  calc_total();
                }
                });
            }

            function calc_total()
            {
              total=0;
              $('.total').each(function() {
                    total += parseInt($(this).val());
                });
              $('#sub_total').val(total.toFixed(2));
              tax_sum=total/100*$('#tax').val();
              $('#tax_amount').val(tax_sum.toFixed(2));
              $('#total_amount').val((tax_sum+total).toFixed(2));
            }
            </script>

  </body>
  </html>