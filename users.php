<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Nail It</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

   <body class="fixed-nav sticky-footer bg-dark" id="page-top">

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

      <div class="content-wrapper">
         <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="index.html">Dashboard</a>
               </li>
               <li class="breadcrumb-item active">User Page</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
               <div class="card-header">
                  <i class="fa fa-table"></i> User Table
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Customer</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Invoice</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>ID</th>
                              <th>Customer</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Invoice</th>
                           </tr>
                        </tfoot>
                        <?php
                           $servername = "localhost";
                           $username = "root";
                           $password = "";
                           $dbname = "nailit";
                           
                           // Create connection
                           $conn = new mysqli($servername, $username, $password, $dbname);
                           
                           $sql = 'SELECT * from customers';
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
                        <tbody>
                           <tr>
                              <th>
                                 <?php echo $row['Cust_id']; ?>
                              </th>
                              <td>
                                 <?php echo $row['Cust_name']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_add']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_mobile']; ?>
                              </td>
                              <td>
                                 <?php echo $row['Cust_email']; ?>
                              </td>
                              <td>
                                 <a class="nav-link" href="invoice.php?cust_id=<?php echo $row['Cust_id']?>">
                                    <button class="btn btn-primary btn-block" name="login_user">View</button>
                                 </a>
                              </td>
                           </tr>
                        </tbody>
                        <?php
                           $count++;
                           }
                           } else {
                           echo '0 results';
                           }
                           ?>
                     </table>
                  </div>
               </div>
               <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
         </div>
         <!-- /.container-fluid-->
         
         <!-- /.content-wrapper-->
         <footer class="sticky-footer">
            <div class="container">
               <div class="text-center">
                  <small>Copyright © Your Website 2018</small>
               </div>
            </div>
         </footer>
         <!-- Scroll to Top Button-->
         <a class="scroll-to-top rounded" href="#page-top">
         <i class="fa fa-angle-up"></i>
         </a>
         <!-- Logout Modal-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-primary" href="login.php">Logout</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Bootstrap core JavaScript-->
         <script src="vendor/jquery/jquery.min.js"></script>
         <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <!-- Core plugin JavaScript-->
         <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
         <!-- Custom scripts for all pages-->
         <script src="js/sb-admin.min.js"></script>
      </div>
   </body>
</html>

