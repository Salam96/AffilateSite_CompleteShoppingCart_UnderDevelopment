<?php 
session_start();
ob_start();
?>
<?php 
if (isset($_SESSION['login'])) {
    include_once('../crud/db.php'); 
  include_once('../controller/show_home_page.php');   
} else{
  logout();
  die();
  }
  function logout(){
    header('location:material-login-form/index.html');
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

    <title>Shop Homepage - Start Bootstrap Template</title>
    

    <!-- Bootstrap core CSS -->
    

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.css">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/menu_css.css">
    <link rel="stylesheet" type="text/css" href="css/CartCSS.css">

    
    <link rel="stylesheet" href="fancybox/dist/jquery.fancybox.css" type="text/css" media="screen" />
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="../JavaScript/javascript.js"></script>
    <script type="text/javascript" src="../JavaScript/show_hide.js"></script>
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
            <li class="nav-item active">
              <a class="nav-link" <?php echo  "href=../view/clienthomepage.php"?>>Home</a>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" <?php echo  "href=../view/clientarea.php"?>>Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" <?php echo  "href=../controller/logout.php"?>>Logout</a>
              </li>
          </ul>
        </div>
        
      </div>

    </nav>
     <div class="row">
    <div class="col-md-12">
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li >
              <a href="../view/clienthomepage.php" id="products_section">
              Our products </a>
            </li>
               <?php
                            if (isset($_SESSION['cart_items']) == true) {
                                ?>                
                                <li><a href="#"  id="basket_section">My Basket</a></li>
                                <?php
                            } else {
                                ?>                
                                <li><span>Basket is empty</span></li>
                                <?php
                            }
                            ?> 
            <li>
          </ul>
         
            </div>

            <div class="tab-pane" id="basket">
              <section id="main">
    <div class="container content">
      <h1>My Cart</h1>
        <div class="tableLeft">
          <table>
            <tr>
              <th></th>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
              <th></th>
            </tr>
            <?php
                $cart_total = 0;
             foreach ($_SESSION['cart_items'] as $product){
              

              $sql='SELECT * FROM product where ProductID =' . $product[0];
              $res = $conn->prepare($sql);
              $res->execute();
              $result = $res->fetch(PDO::FETCH_ASSOC);
              
             ?>
            <tr>
              <td> <div class="single_image" href="<?php echo $result['Image']?>"><img src="../images/<?php echo $result['Image']; ?>"  width="100" height="50" ></div></td>
              <td><a href="item.html"><?php echo $result['ProductName']  ?></a></td>
              <td>$<?php echo $result['Price']  ?></td>
              <td>
                <form action="../controller/basket.php?pageid=updatecart" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product[0]?>">
                <select name="product_qty">
                  <?php for($loop=0; $loop <=10; $loop++){
                  echo '<option value=' . $loop . '';
                  if($product[1] == $loop){
                      echo " selected ";
                  } 
                      echo '>' .$loop. '</option>';
                        }
                  ?>
                
                </select>

              </td>
               <td><?php $subtotal = $result['Price'] * $product[1];
                        echo number_format($subtotal, 2, '.', ','); ?></td>
              
            </tr>
            <td class="red"><input type="submit" name="submit" value="update"></td>
              </form>
            <?php 
          $cart_total += $subtotal;
        }
            ?>
            
          </table>
        </div> <!-- end tableLeft --> 

        <div class="tableRight">
          <table>
            <tr>
              <th colspan="2">Your Order</th>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td><?php echo number_format($cart_total, 2, '.', ','); ?></td>
            </tr>
            <tr>
              <td>Shipping</td>
              <td class="red">Free</td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="total"><?php echo number_format($cart_total, 2, '.', ','); ?></td>
            </tr>
          </table>
          <p class="center blue"><input type="button" name="checkout" onclick="location.href='clientarea.php';" value="Checkout" /></p>
          <p class="center"><input type="button" name="continue" onclick="location.href='clienthomepage.php';" value="Continue Shopping" /></p>
        </div> <!-- end tableRight -->  
        
    </div> <!-- end container -->
  </section> <!-- end main -->   
              
            </div>
            <div class="tab-pane" id="Contact_us">
              
            </div>
            <div class="tab-pane" id="About">
  
              
            </div>
          </div>
        </div>
      </div>



    <!-- Page Content -->

    
    
  
    <!-- /.container -->

    <!-- Footer -->
    <?php include'../view/footer.php' ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.js"></script>

  </body>

</html>
