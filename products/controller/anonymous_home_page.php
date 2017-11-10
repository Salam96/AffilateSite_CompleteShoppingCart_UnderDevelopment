<?php
Include_once('../crud/db.php');        
                if (!isset($_SESSION['login'])) {
                              $sql2="SELECT * FROM product";
                              $res = $conn->prepare($sql2);      
                                                $res->execute();                                                        
                }
 ?>