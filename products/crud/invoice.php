<?php 
function create_invoice(){
  if (isset($_SESSION['cart_items'])) {
     include_once('db.php');
     try {
         $sql = "INSERT INTO orders (CustomerID) VALUES (" . $_SESSION['CustomerID'] . ")";
         $result = $conn->query($sql);
         if ($result) {
             $order_id = $conn->lastInsertId();
         } else {
            return false;
        }
    } catch (PDOException $Exception) {
        echo $Exception;    
        exit();
    }
    foreach ($_SESSION['cart_items'] as $product) {   
        $sql = 'SELECT * FROM product WHERE ProductID = ' . $product[0];
        $res = $conn->prepare($sql);
        $res->execute();
        $result = $res->fetch(PDO::FETCH_ASSOC);
        $subtotal = $result['Price'] * $product[1];
        $sql2 = "INSERT INTO order_items (ProductsID, quantity, price, OrderID) VALUES (" .
        $product[0] . ", " . $product[1] . ", " . $subtotal . ", " . $order_id . ")";
        $res = $conn->prepare($sql2);
        $res->execute();
        $sql3 = "UPDATE product SET Quantity = " . ($result['Quantity'] - $product[1]) . " WHERE ProductID = " . $product[0];
        $res3 = $conn->prepare($sql3);
        $res3->execute();
    }
    unset($_SESSION['cart_items']);
    $_SESSION['Message'] = 'Thank you for your purchase';
}
else{
 echo "u done goof'd";
}
}
?>