<?php
Include_once('../crud/db.php');        
                if (isset($_SESSION['login'])) {
                              $sql="SELECT * from customer t2 join login t1 on t1.LoginID = t2.LoginID WHERE t1.LoginID =" . $_SESSION['login'];                  
                                                $res = $conn->prepare($sql);      
                                                $res->execute();
                                                $result = $res->fetch(PDO::FETCH_ASSOC);
                              $sql2="SELECT * FROM product";
                              $res = $conn->prepare($sql2);      
                                                $res->execute();
             
                                              
                                                                             
                }else {

                      session_destroy();
                      header('location:index.php');
                      
                }
                

 ?>