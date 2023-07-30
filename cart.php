<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//session_start();

require_once('php/CreateDb.php');
require_once('php/component.php');






$db = new CreateDb(dbname: "catalinabakes",tablename:"productdb");

/*
if(isset($_POST['remove']))
{
  if($_GET['action'] == 'remove')
  {
    foreach($_SESSION['cart'] as $key => $value)
    {
      if($value['cake_id'] == $_GET['id'])
      {
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Product has been Removed...!')</script>";
        echo "<script>window.location='cart.php'</script>";
        exit;
      }
    }
  }
} 
*/

/*
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $key => $value) {
      $cakeIdToRemove = $_GET['id'];

      if ($value['cake_id'] == $cakeIdToRemove) {
          unset($_SESSION['cart'][$key]);
          echo "<script>alert('Product has been Removed...!')</script>";
          echo "<script>window.location='cart.php'</script>";
          exit;
      }
  }
} 

*/

if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
  $cakeIdToRemove = $_GET['id'];

  foreach($_SESSION['cart'] as $key => $value) {
    if($value['cake_id'] == $cakeIdToRemove) {
      unset($_SESSION['cart'][$key]);
      echo "<script>alert('Product has been Removed...!')</script>";
      echo "<script>window.location='cart.php'</script>";
      exit;
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalina Bakes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare/ajax/libs/font-awesome/5.8.2/css/all.css"/>
  <link rel="stylesheet" href="Css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</head>
<body class="bg-light">
<div class="container-fluid">
<div class="container">
        <div class="text-center">
          <h2>Catalina Bakes</h2>
           
</div>
        <div class="left-side">
            <!-- Link to index.php -->
            <a href="index.php">< Continue to Shopping</a>
           
</div>
</div>
  <div class="row px-5">
    <div class="col-md-7">
      

      <div class="shopping-cart">
       <h5>My Cart</h5><br>
      
       <?php
        if(isset($_SESSION['cart']))
        {
          $count = count($_SESSION['cart']);
          echo "<h6>Your Order($count items)</h6>";
        }else
        {
          echo "<h6>Price(0 items)</h6>";
        }
        ?>
       

       <hr>
       <?php
       $total=0;
       if(isset($_SESSION['cart'])){
       $cake_id=array_column($_SESSION['cart'], column_key:'cake_id');
       $result = $db->getData();
       while($row=mysqli_fetch_assoc($result))
       {
        foreach($cake_id as $id)
        {
          if($row['id']==$id)
          {
            cartElement($row['cakeimage'], $row['cakename'], $row['cakeprice'], $row['id'], 1);

                    $total = $total + (int)$row['cakeprice'];
          }
        }
       }
      } else {
        echo "<h5>Cart is Empty</h5>";
       }

       ?>

      </div> 
      </div>
    
    <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
    <div class="pt-4">
      <h6>PRICE DETAILS</h6>
      <hr>
      <div class="row price-details">
        <div class="col-md-6">
      
        <?php
        if(isset($_SESSION['cart']))
        {
          $count = count($_SESSION['cart']);
          echo "<h6>Price($count items)</h6>";
        }else
        {
          echo "<h6>Price(0 items)</h6>";
        }
        ?>
      <h6>Delivery Charges</h6>
      <hr>
      <h6>Amount Payable</h6>  
      

      </div>
      <div class="pt-2">
     
         
        <h6><?php
        echo $total;
        ?>
        </h6>
        <h6 class="text-success">FREE</h6>
        <hr>
        <h6>PHP<?php
        echo $total;
        ?></h6>
      </div>
    
      <div class="col-md-6">
      <form action="details.php" method="POST">
        <button class="btn btn-warning">Proceed to pay</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
      
      
<script src="php/script.js"></script>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 