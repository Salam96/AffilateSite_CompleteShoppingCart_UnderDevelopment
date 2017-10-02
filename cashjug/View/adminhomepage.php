<?php 
session_start();
ob_start();?>
<?php 
if (isset($_SESSION['login'])) {
		Include_once('../crud/db.php'); 
	  Include_once('../controller/show_home_page.php'); 
	
} else{
	logout();
	die();
	}
	function logout(){
		header('location:index.html');
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
    <style type="text/css">
      #model{
        display: none;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="fancybox/dist/jquery.fancybox.css" type="text/css" media="screen" />
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script src="../javascript.js"></script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">My logo goes here</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" data-toggle="tooltip" title="Main page" <?php echo  "href=../view/clienthomepage.php"?>>Home</a>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tooltip" title="Profile" <?php echo  "href=../view/adminarea.php"?>>Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tooltip" title="Log out" <?php echo  "href=../Controller/logout.php"?>>Logout</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
           <div><svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">

                  <path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/>
                 <polygon points="120,0 140,125 0,25" fill="white"/>
                <text x="0" y="100" font-family="Verdana" font-size="55" fill="white" stroke="black" stroke-width="3">
                     Affilate
               </text>
              </s
   <?php echo "<h2>Welcome " . $result["FirstName"] ?><h1 class="my-4"></h1></strong>
          <div class="list-group">
            <a href="#" class="list-group-item">Technology</a>
            <a href="#" class="list-group-item">Accessories</a>
          </div>

        </div>

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <a class="d-block img-fluid" href="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png"><img src="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png" alt="First slide"></a>
              </div>
               <div class="carousel-item">
                <a class="d-block img-fluid" href="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png"><img src="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png" alt="Second slide"></a>
              </div>
               <div class="carousel-item">
                <a class="d-block img-fluid" href="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png"><img src="https://cdn.yourstory.com/wp-content/uploads/2016/08/125-fall-in-love.png" alt="Third slide"></a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="row">                                       
             <?php while ($result2 = $res->fetch(PDO::FETCH_ASSOC)):{
              ?>                                  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="single_image" href="<?php echo $result2['Image']?>"><img class="card-img-top" src="<?php echo $result2['Image']?>" alt=""></div>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $result2['ProductName']?></a>
                  </h4>
                  <h5>$<?php echo $result2['Price']?></h5>
                  <p class="card-text"><?php echo $result2['Description']?></p>
                </div>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Read more
                  </button>                  
                  <?php  echo '<a class="btn" href="#" data-toggle="modal" data-target="#edit" onClick= editProduct(' . $result2['ProductID'] . ')>Edit</a>'?>
                    <a class="btn" href='../crud/deleteProduct.php?action_type=delete&ProductID=<?php echo $result2['ProductID'];?>' onclick="return confirm('Are you sure?')">Delete</a>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Product description</h4>
                        </div>
                        <div class="modal-body">
                         <p class="card-text"><?php echo $result2['Description']?></p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
             <?php }
                    endwhile;  ?>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Edit form</h4>
            </div>
            <div class="modal-body">
              <div id="model">
            <form id="editform">
                    <input type="hidden" name="primarykey" class="form-control" id="primarykey">
              <div class="form-group">
                      <label for="pname">Product name:</label>
                      <input type="text" name="pname" class="form-control" id="pname" placeholder="Product name">
              </div>
              <div class="form-group">
                      <label for="brand">Brand:</label>
                      <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand">
              </div>
              <div class="form-group">
                      <label for="m_del">Model:</label>
                      <input type="text" name="m_del" class="form-control" id="m_del" placeholder="Model">
              </div>
              <div class="form-group">
                      <label for="m_del">Quantity:</label>
                      <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
              </div>
               <div class="form-group">
                      <label for="price">Price:</label>
                      <input type="text" name="price" class="form-control" id="price" placeholder="Price">
              </div>
              <div class="form-group">
                      <label for="price">Description:</label>
                      <input type="text" name="description" class="form-control" id="description" placeholder="Description">
              </div>
              <div class="form-group">
                      <label for="image">Image:</label>
                      <input type="text" name="image" class="form-control" id="image" placeholder="Image">
              </div>

                      <input type="button" class="btn btn-outline-success" value="edit" onClick="doedit(this)"></input>
                      <input type="button" class="btn btn-outline-success" value="cancel" onClick="close()"></input>
            </form>
          </div>
             <p class="card-text"><?php echo $result2['Description']?></p>
            </div>
          </div>
        </div>
      </div>
    <!-- Button trigger modal -->
    <!-- Footer -->
          <footer class="py-5 bg-dark">
            <div class="container"> 
             <?php  echo var_dump($result); 
              echo print_r($result);
               var_dump($result);?> 
           <?php  ?>
              <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
            </div>
          </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.js"></script>

  </body>

</html>
 ?>