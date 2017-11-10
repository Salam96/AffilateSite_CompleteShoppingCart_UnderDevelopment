<?php 
  session_start();
  ?>
<?php 
if (isset($_SESSION['login'])) {
 
        //Connecting to our DB            
                           include_once('db.php');
                   if (isset($_SESSION['CustomerID'])) {
                       
                                  $sql='SELECT * FROM customer where CustomerID =' .$_SESSION['CustomerID']  ;
                                        $res = $conn->prepare($sql);
                                        $res->execute();
                                        $result = $res->fetch(PDO::FETCH_ASSOC);

                                     

                                         $sql2='SELECT * from postcodeinfo t1 join customer t2 on t1.postcodeID = t2.postcodeID where t2.CustomerID =' .$_SESSION['CustomerID'];
                                         $res = $conn->prepare($sql2);
                                         $res->execute();
                                         $result2 = $res->fetch(PDO::FETCH_ASSOC);
                                        


                                         $sql3='SELECT * from login t1 join customer t2 on t1.LoginID = t2.LoginID where t2.CustomerID =' .$_SESSION['CustomerID'];
                                         $res = $conn->prepare($sql3);
                                        $res->execute();
                                        $result = $res->fetch(PDO::FETCH_ASSOC);
                        }  else {
                            session_destroy();
                            header('location:index.php');
                          }
                          


                                  //Defining our Variables
                                           $fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])):null;
                                          $lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])):null;
                                           $email = !empty($_POST['email'])? test_user_input(($_POST['email'])):null;
                                          $address1 = !empty($_POST['address1'])? test_user_input(($_POST['address1'])):null;
                                         $address2 = !empty($_POST['address2'])? test_user_input(($_POST['address2'])):null;
                                          $dob = !empty($_POST['dob'])? test_user_input(($_POST['dob'])):null;
                                          $postcode = !empty($_POST['postcode'])? test_user_input(($_POST['postcode'])):null;
                                          $suburb = !empty($_POST['suburb'])? test_user_input(($_POST['suburb'])):null;
                                           $state = !empty($_POST['state'])? test_user_input(($_POST['state'])):null;
                                           $username = !empty($_POST['username'])? test_user_input(($_POST['username'])):null;
                                          $password = !empty($_POST['password'])? test_user_input(($_POST['password'])):null;
                                      //Updating our records!
                        if (isset($_POST['send'])) {

                                 try {
                           $conn->beginTransaction();

                              $sql4 ="UPDATE `postcodeinfo`, `customer` SET `postcode`='$postcode',`suburb`='$suburb',`state`='$state' WHERE customer.postcodeID = postcodeinfo.postcodeID AND customer.CustomerID =" .$_SESSION['CustomerID'] AND 'customer.postcodeID = postcodeinfo.postcodeID';
                                        $res = $conn->prepare($sql4); 
                             
                                        $res->execute();   
                                         $postid = $conn-> lastInsertId();
                                          
                                        $sql6="UPDATE login, customer SET UserName = '$username', Password='$password' WHERE login.LoginID=customer.CustomerID AND customer.CustomerID =" .$_SESSION['CustomerID'] AND "login.LoginID=customer.CustomerID";
                                     //   echo $sql6;
                                        $res = $conn->prepare($sql6); 
                                      
                                        $res->execute();
                                       $loginid = $conn-> lastInsertId();
                                  
                                      $sql7 ="UPDATE `customer` SET `FirstName`='$fname',`LastName`='$lname',`DateOfBirth`='$dob',`email`='$email',`addressone`='$address1',`addresstwo`='$address2' WHERE  CustomerID =" .$_SESSION['CustomerID'];
                                       $res = $conn->prepare($sql7);

                                       $res->execute();
                                           $customerid = $conn-> lastInsertId();
                                                 $conn->commit();
                                           header("location:../view/clientarea.php");

                                    }
                                        catch (PDOException $e){
                                                $conn->rollback();
                                                echo $e;
                                                  die();}
                                                }
                    
                                if (isset($_POST['cancel'])) {
                                  header("location:../view/clientarea.php");
                                 // $_SESSION();

                                }}
                                else{
          logout();
          die();
  }
function logout(){
          header('location:../view/index.php');
          ob_end_flush();
          die();
  }
 
    ?>
   

<html>
<head>
	<title></title>
 <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <h2><strong><?php echo $result['FirstName']; ?></strong>, Please make sure your information is correct</h2> 
    <form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="firstname">Firstname:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="fname" value="<?php echo $result['FirstName']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="lastname" class="control-label col-sm-2">Lastname:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="lname"  value="<?php echo $result['LastName']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="date" class="control-label col-sm-2">Date of birth:</label>
        <div class="col-sm-10">
        <input type="date" class="form-control"  name="dob"   value="<?php echo $result['DateOfBirth']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="control-label col-sm-2">Email:</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" value="<?php echo $result['email']; ?>" name="email">
        </div>
      </div>
       <div class="form-group">
        <label for="address1" class="control-label col-sm-2">Address one:</label>
        <div class="col-sm-10">
        <input type="address" class="form-control" name="address1"  value="<?php echo $result['addressone']; ?>">
        </div>
      </div>
       <div class="form-group">
        <label for="address2" class="control-label col-sm-2">Address two:</label>
        <div class="col-sm-10">
        <input type="address" class="form-control" name="address2"  value="<?php echo $result['addresstwo']; ?>">
        </div>
      </div>
     <div class="form-group">
        <label for="username" class="control-label col-sm-2">Username:</label>
        <div class="col-sm-10" >
        <input type="username" class="form-control" name="username"  value="<?php echo $result['UserName']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="control-label col-sm-2">Password:</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="password"  value="<?php echo $result['Password']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="postcode" class="control-label col-sm-2">Postcode:</label>
        <div class="col-sm-10">
        <input type="postcode" class="form-control" name="postcode"  value="<?php echo $result2['postcode']; ?>">
        </div>
      </div>
       <div class="form-group">

        <label for="suburb" class="control-label col-sm-2">Suburb:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="suburb"  value="<?php echo $result2['suburb']; ?>">
        </div>
      </div>
       <div class="form-group">

        <label for="state" class="control-label col-sm-2">State:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="state"  value="<?php echo $result2['state']; ?>">
        </div>
      </div>
      <div class="btn  btn-block">
      <button type="submit" name="cancel" value"add" class="btn btn-default">Cancel</button>
      </div>  
        <div class="btn  btn-block">
      <button type="submit" name="send" value"add" class="btn btn-default">Submit</button>
      </div>  
       

    </form>
    </div>
        <?php include'../view/footer.php'; ?>
</body>
</html>