<?php 
session_start();
ob_start(); ?>
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
  
       <script src="../javascript/show_hide.js"></script>
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
        <img src="../images/widgets.png">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link"  <?php echo  "href=../view/adminhomepage.php"?>>Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" <?php echo  "href=../view/adminarea.php" ?>>Profile</a>
              <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item">
                <a class="nav-link"  <?php echo  "href=../controller/logout.php"?>>Logout</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
         <div class="tabbable-line">
              <ul class="nav nav-tabs ">
                  <li>
                    <a  class="nav-link" href="#personal_info"  onclick="open_new_content(this.href)" data-toggle="tab">
                    Users accounts </a>
                  </li>
                  <li>
                    <a  class="nav-link" href="#add_product" onclick="open_new_content(this.href)" data-toggle="tab" >
                    Add product </a>
                  </li>
              </ul>
         </div>

      <!-- Page Content -->
    <div class="container">
           <div id="content_frame">
    
                <h2>Welcome Admin </h2>
                <p>Users Accounts:</p>        
                <!-- Trigger the modal with a button -->
                 
                <table class="table table-inverse table-lg" >              
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Email</th>
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
                          <td><a href='../crud/deleteUser.php?action_type=delete&CustomerID=<?php echo $result["CustomerID"];?>' class="btn btn-info "  onclick="return confirm('Are you sure?')">Ban</a></td>
                        </tr>
                        
                       
                   </tbody>
                     <?php }     endwhile;  ?>
              </table>
            </div>
      </div>

     
            <?php include'footer.php'; ?>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper/popper.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>
  </html> 
  </body>
  </html>