<?php 
  session_start();
  ob_start();?>
<?php 
  if (isset($_SESSION['login']) == true) {
       include_once('../crud/db.php');  
  } else{
    logout();
    die();
  }
    function logout(){
      header('location:index.php');
      ob_end_flush();
      die();
    }
 ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
      <title>ModernWidgets - Client invoice</title>
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/shop-homepage.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css.invoice.css">
    </head>
    <body>
      <!-- Navigation -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <img src="../images/widgets.png">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                          <div class="collapse navbar-collapse" id="navbarResponsive">
                              <ul class="navbar-nav ml-auto">
                                  <li class="nav-item">
                            <a class="nav-link" <?php echo  "href=clienthomepage.php"?>>Home</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link active" <?php echo  "href=../view/clientarea.php?"?>>Profile</a>
                                <span class="sr-only">(current)</span>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" <?php echo  "href=../controller/logout.php"?>>Logout</a>
                              </li>
                              </ul>
                          </div>  
            </div>
       </nav>
</head>
    <div class="container">
       <?php
                $sql = "SELECT * FROM customer, postcodeinfo WHERE postcodeinfo.postcodeID = customer.postcodeID AND CustomerID = '" . $_SESSION['CustomerID'] . "'";
                $res = $conn->prepare($sql);
                $res->execute();
                $row = $res->fetch(PDO::FETCH_ASSOC);
?>
        <?php
                $sql2 = 'SELECT * FROM orders WHERE OrderID =' . $_GET['invid'];
                $res = $conn->prepare($sql2);
                $res->execute();
                $result = $res->fetch(PDO::FETCH_ASSOC);
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="invoice-title" >
                <h3 class="pull-right"> Invoice# <?php echo sprintf('%05d', $result['OrderID']); ?></h3>
            </div>
            <hr>
            <div class="row">
              
                <div class="col-md-6">
                    <address>
                    <strong>Shipped To:</strong>
                       <p><strong>Full name</strong>  :        <?php echo $row['FirstName'];?> <?php echo $row['LastName']; ?></p>
                       <p><strong>Address 1</strong>  :        <?php echo $row['addressone']; ?></p>
                        <p><strong>Address 2</strong> :       <?php echo $row['addresstwo']; ?></p>
                        <p><strong>Suburb</strong>    :          <?php echo $row['suburb']; ?></p>
                        <p><strong>Postcode</strong>  :        <?php echo $row['postcode']; ?></p>
                        <p><strong>State</strong>     :           <?php echo $row['state']; ?></p>
                    </address>

                </div>
            </div>
            <div class="row">
  
                <div class="col-md-6">
                  
                    <address>
                        <strong>Order Date:</strong><br>
                         <?php 
                            $date = strtotime($result['date']);
                            $formatted_date = date( 'd/m/Y H:i', $date );
                    echo $formatted_date; ?> <br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <?php
                $sql = "SELECT * FROM orders WHERE CustomerID = '" . $_SESSION['CustomerID'] . "' ORDER BY date DESC";
                $res = $conn->prepare($sql);
                $res->execute();
                $result = $res->fetch(PDO::FETCH_ASSOC);

?>
  
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Invoice ID</strong></td>
                                    <td class="text-center"><strong>Date</strong></td>
                                    <td class="text-center">Order states</td>
                                </tr>
                            </thead>
                            <tbody>
                
                                <tr>
                                    <td>ddd<?php echo sprintf('%05d', $result['OrderID']); ?></td>
                                    <td class="text-center"><?php 
                            $a_date = strtotime($result['date']);
                            $formatted_date = date( 'd/m/Y H:i', $a_date );
                    echo $formatted_date; ?> </td>
                                  <td class="text-center" style="color:red;">SHIPPED</td>                           
                                </tr>
                         
                    
                            </tbody>
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center">Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
        $sql3 = 'SELECT * FROM order_items WHERE OrderID = ' . $_GET['invid'];
        $res3 = $conn->prepare($sql3);
                $res3->execute();
        $invoice_total = 0;
        
        while ($row3 = $res3->fetch(PDO::FETCH_ASSOC)){
           
            $sql4 = 'SELECT * FROM orders WHERE OrderID = ' . $_GET['invid'];
            $res4 = $conn->prepare($sql4);
                $res4->execute();
            $row4 = $res4->fetch(PDO::FETCH_ASSOC);
            $invoice_total += $row3['price'];
        ?>
                
                                <tr>
                                    <td><?php echo $row3["Items_ID"]; ?></td>
                                    <td class="text-center">$<?php echo number_format($row3['price'], 2, '.', ','); ?></td>
                                  <td class="text-center"><?php echo $row3["quantity"]; ?></td>
                                    
                                </tr>
                       <?php }?>
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <!-- /.container -->
      <!-- Footer -->
      <footer class="py-5 bg-dark">
        <div class="container">

          <p class="m-0 text-center text-white">Copyright &copy; ModernWidgets 2017</p>
        </div>

        
      </footer>

      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper/popper.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>


             <environment names="Development">
          <script src="~/lib/jquery/dist/jquery.js"></script>
          <script src="~/lib/bootstrap/dist/js/bootstrap.js"></script>
          <script src="~/js/site.js" asp-append-version="true"></script>
      </environment>
      <environment names="Staging,Production">
          <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-2.2.0.min.js"
                  asp-fallback-src="~/lib/jquery/dist/jquery.min.js"
                  asp-fallback-test="window.jQuery">
          </script>
       </environment>

</body>
</html>