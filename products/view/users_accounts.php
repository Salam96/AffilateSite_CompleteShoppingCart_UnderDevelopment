
<?php include"../crud/db.php"; ?>


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

    <?php }
    endwhile;  ?>
  </table>
