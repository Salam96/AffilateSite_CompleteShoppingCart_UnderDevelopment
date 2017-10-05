
<?php 

include_once('../crud/db.php');
                if (isset($_SESSION['login']))
                    {
                    

                                          $sql="SELECT * FROM customer, login WHERE customer.LoginID = login.LoginID AND login.LoginID =" .$_SESSION['login'];
                                        
                                                    $res = $conn->prepare($sql);
                                                    $res->execute();
                                                    $result = $res->fetch(PDO::FETCH_ASSOC);
                                         $sql2='SELECT * from postcodeinfo t1 join customer t2 on t1.postcodeID = t2.postcodeID where t2.LoginID =' .$_SESSION['login'];
                                                   $res = $conn->prepare($sql2);
                                                   $res->execute();
                                                   $result = $res->fetch(PDO::FETCH_ASSOC);
                                                  // $_SESSION['CustomerID']= $result['CustomerID'];
//include_once("../view/clientarea.php");
                                                   
                    }else {

                                   session_destroy();
                                      header('location:../view/index.html');
           
                                               
                                             
                                    }
 ?>


 ?>