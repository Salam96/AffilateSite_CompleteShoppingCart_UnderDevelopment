<?php 
session_start();
ob_start();?>

<?php 

if (isset($_SESSION['login'])) {
    Include_once('../crud/db.php'); 
  Include_once('../controller/show_admin_page.php'); 

  
} else{
  logout();
  die();
  }

  function logout(){
    header('location:../view/index.php');
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
      <title>Shop Homepage - Start Bootstrap Template</title>

      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="css/shop-homepage.css" rel="stylesheet">

      

    </head>

    <body>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">My logo goes here</a>
         
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
         
              <li class="nav-item active">
           
            <a class="nav-link" <?php echo  "href=adminhomepage.php"?>>Home</a>
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" <?php echo  "href=../view/adminarea.php"?>>Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" <?php echo  "href=../controller/logout.php"?>>Logout</a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
     <div class="container">
    
    <h2>Welcome Admin <strong><?php echo $result['FirstName']; ?></strong></h2>
    <p>Users Accounts:</p>        
    <!-- Trigger the modal with a button -->
      <?php  $_SESSION['CustomerID'] = $result['CustomerID']; ?>
      
    
    <table class="table table-inverse table-lg" >
     
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Last Login</th>
      <th>Purchases</th>
    </tr>
  </thead>
  <tbody>
    <?php 
            
                GLOBAL $conn;
              $sql = "SELECT * FROM customer, login WHERE login.LoginID = customer.LoginID AND login.UserType = 'Customer' ORDER BY 'LoginID'";
              $res = $conn->prepare($sql);
              $res->execute();
              while ($result = $res->fetch(PDO::FETCH_ASSOC)):{  

?>
    <tr>
      <th scope="row"><?php echo $result['CustomerID']; ?></th>
      <td><?php echo $result['UserName']; ?></td>
      <td><?php echo $result['email']; ?></td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><a href='../crud/deleteUser.php?action_type=delete&CustomerID=<?php echo $result["CustomerID"];?>' class="btn btn-info "  onclick="return confirm('Are you sure?')">Ban</a></td>
    </tr>
    
   
  </tbody>

   <?php }
                    endwhile;  ?>
</table>
</div>
      <!-- Footer -->
      <footer class="py-5 bg-dark">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
        </div>
        <!-- /.container -->
      </footer>

      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper/popper.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>
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
          <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.6/bootstrap.min.js"
                  asp-fallback-src="~/lib/bootstrap/dist/js/bootstrap.min.js"
                  asp-fallback-test="window.jQuery && window.jQuery.fn && window.jQuery.fn.modal">
          </script>
          <script src="~/js/site.min.js" asp-append-version="true"></script>
      </environment>
       <footer>       <?php  echo print_r($sql); ?> 
     <?php  echo $_SESSION['LoginID'];?> <?php echo $sql?> <?php echo $sql2 ?>  </footer> 
  </html> 
  </body>
  </html>