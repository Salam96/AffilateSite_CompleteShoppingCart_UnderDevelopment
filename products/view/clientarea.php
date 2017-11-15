<?php 
session_start();
ob_start();?>
<?php 
if (isset($_SESSION['login']) == true) {
  include_once('../crud/db.php'); 
  include_once('../controller/show_client_page.php'); 
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
  <title>ModernWidgets - Client area</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style type="text/css">
  @media only screen 
  and (max-width : 900px) {
    .col-lg-6_text-left{padding-left: 70px;}}
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a href="clienthomepage.php"><img src="../images/widgets.png"><a/>
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
  <!-- Page Content -->
  <div class="row">
    <div class="col-md-12">
      <?php $_SESSION['CustomerID'] = $result['CustomerID'] ?> 
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="invoice-title">
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6_text-left">    
            <strong>Personal Information:</strong>
            <p>Firstname</p> <?php echo $result['FirstName']; ?>
            <p>Date of birth</p><?php echo $result['DateOfBirth']; ?>
            <p>Email</p><?php echo $result['email']; ?>
          </div>
          <div class="col-lg-6 text-right">
            <strong>Shipping Address:</strong><br>
            <?php echo $result['FirstName'];  ?><?php echo $result['LastName']; ?><br>
            <?php echo $result['addressone']; ?><br>
            <?php echo $result['addresstwo']; ?><br>
            <?php echo $result['suburb']; ?>, <?php echo $result['postcode']; ?>
          </div>
        </div>
        <div class="col-lg-6">
         <p class="blue"><input type="submit" onclick="location.href = '../crud/update.php';"  value="Edit" /></p>
         <p class="blue"><input type="submit" onclick="location.href = '../crud/delete.php';"  value="Terminate the account" /></p>
         <p class="blue"><input type="submit" name="invoice" onclick="location.href = '../controller/basket.php?pageid=invoice';"  value="Previous invoices" /></p>
       </div>
     </div>
   </div>
   <?php
   if (isset($_SESSION['cart_items'])) {

    $cart_total = 0;
    ?>
  </div>
  <div class="container">
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
                    <td><strong>Item</strong></td>
                    <td class="text-center"><strong>Price</strong></td>
                    <td class="text-center"><strong>Quantity</strong></td>
                    <td class="text-right"><strong>Totals</strong></td>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  
                  
                  foreach ($_SESSION['cart_items'] as $product){
                   $sql='SELECT * FROM product where ProductID =' . $product[0];
                   $res = $conn->prepare($sql);
                   $res->execute();
                   $result = $res->fetch(PDO::FETCH_ASSOC);
                   $subtotal = $result['Price'] * $product[1];
                   $cart_total += $subtotal;
                   ?>
                   <tr>
                    
                    <td><?php echo $result['ProductName']; ?></td>
                    <td class="text-center"><?php echo number_format($result['Price'], 2, '.', ','); ?></td>
                    <td class="text-center"><?php echo $product[1]; ?></td>
                    <td class="text-right"><?php echo number_format(($cart_total - ($cart_total/11)), 2, '.', ','); ?></td>
                  </tr>
                  <?php 
                }                              
                ?>
                <tr>
                  <td class="thick-line"></td>
                  <td class="thick-line"></td>
                  <td class="thick-line text-center"><strong>Subtotal</strong></td>
                  <td class="thick-line text-right"><?php echo number_format($cart_total, 2, '.', ','); ?></td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Shipping</strong></td>
                  <td class="no-line text-right">FREE</td>
                </tr>
                <tr>
                  <td class="no-line"></td>
                  <td class="no-line"></td>
                  <td class="no-line text-center"><strong>Total</strong></td>
                  <td class="no-line text-right"><?php echo number_format($cart_total, 2, '.', ','); ?></td>
                </tr>
                
              </tbody>

            </table>

          </div>
        </div>
        <form action="<?php echo PPCART_URL; ?>" method="post">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="upload" value="1">
          <input type="hidden" name="amount_1" value="<?php echo $cart_total; ?>"/>
          <input type="hidden" name="quantity_1" value="<?php echo $product[1]; ?>"/>
          <input type="hidden" name="item_name_1" value="<?php echo $result['ProductName']; ?>"/>
          <input type="hidden" name="item_number_1" value="<?php echo $product[0]; ?>"/>
          <input type="HIDDEN" name="business" value="<?php echo PPCART_ACCOUNT; ?>">
          <input type="hidden" name="business" value="salamemad11-facilitator@yahoo.com">
          <input type="hidden" name="currency_code" value="<?php echo PPCART_CURRENCY; ?>">
          <input type="hidden" name="lc" value="<?php echo PPCART_COUNTRY; ?>">
          <input type="hidden" name="return" value="<?php echo PPCART_RETURN_URL; ?>">   
          <td class="text-center"><p class="blue"><input type="submit" value="Pay" /></p></td>
        </form>                   
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</div>

<!-- Footer -->
<?php include'footer.php'; ?>

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