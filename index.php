<?php


//start session
session_start();

require_once('php/CreateDb.php');
require_once('./php/component.php');
require_once('php/header.php');



// Create an instance of the CreateDb class
$database = new CreateDb(dbname: "catalinabakes",tablename:"productdb");

if(isset($_POST['add']))
{
/// print_r($_POST['cake_id']);
if(isset($_SESSION['cart']))
{
  $item_array_id = array_column($_SESSION['cart'], column_key:'cake_id');
 // print_r($item_array_id);
 
if(in_array($_POST['cake_id'], $item_array_id))
  {
   echo "<script> alert('product is already added in the cart..!')</script>";
   echo "<script>window.location='index.php' </script>";
  }
  else
  {
    $count = count($_SESSION['cart']);
    $item_array = array('cake_id'=>$_POST['cake_id'] );

    $_SESSION['cart'][$count]=$item_array;
   //print_r($_SESSION['cart']);

  }
}else{
  $item_array =  array( 'cake_id' => $_POST['cake_id']);
  //create new session varaiable
  $_SESSION['cart'][$count] = $item_array;
  print_r($_SESSION['cart']);
}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalina Cupcake</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare/ajax/libs/font-awesome/5.8.2/css/all.css"/>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>





  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/Cupcake-Banner.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/Cupcake-Banner (1).png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/Cupcake-Banner (2).png" alt="Third slide">
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

  
  
  <a id="Online Order">
       <div class="container">
       <div class="py-4">
        <h2 class="text-center">Featured Categories</h2>
      </div>
    <div class="row text-center py-5">
      <?php
      $result = $database->getData();
      while($row = mysqli_fetch_assoc($result))
      {
        component($row['cakename'],$row['cakeprice'],$row['cakeimage'],  $row['id'], $row['cakedescription']);
      }
     ?>
    </div>

    </div>

    </a>


  <a id="About">
    <section class="my-4">
      <div class="py-4">
        <h2 class="text-center">About Us</h2>
      </div>
      <div class="container-fluid">
        <h3 class="text-center">Vision</h3><br>
        <p class="text-center">
          To bring smile to your homes, friends and loved ones through our fresh and home-baked pastries.
        </p><br>
        <h3 class="text-center">Mission</h3><br>
        <p class="text-center">
        Cupcakes by Catalina intends to offer the tastiest with the highest quality <br> of baked products at a competitive price to meet the demands of middle to high income customers.
      </p><br>
      
        
      </div>
    </section>
  </a>

  <a id="Contact Us">
    <section class="my-4">
      <div class="py-4">
        <h2 class="text-center">Contact Us</h2><br>
        <p class="text-center">Enquiries and Custom Requests</p>
        <p class="text-center">For a complete list of Desserts and Custom Orders please contact us<br> via email, phone or by visiting us.</p><br>
      </div>
      <div class="w-50 m-auto">
        <form action="about.php" method="post">
          <div class="form-group ">
          <label class="d-block">Name</label>
              <input type="text" id="Name" name="Name" class="form-control" autocomplete="name"></label>
          </div>
          <div class="form-group">
            <label class="d-block">Email</label>
              <input type="email" id="Email" name="Email" class="form-control" autocomplete="email"></label>
          </div>
          <div class="form-group">
            <label class="d-block">PhoneNumber</label>
              <input type="tel" id="PhoneNumber" name="PhoneNumber" class="form-control" autocomplete="tel"></label>
          </div>
          <div class="text-center"> <!-- Center the button using text-center class -->
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
         
        </form>
      </div>
    </section>
  </a>
  <?php
$phone_number = '+639155241609';
$whatsapp_link = 'https://wa.me/' . $phone_number;
?>

<div class="whatsapp-icon">
  <a href="<?php echo $whatsapp_link; ?>" target="_blank">
    <img src="images/whatsapp-icon.png" alt="WhatsApp Chat" style="width: 50px; height: 50px; border-radius: 20%;">
  </a>
</div>

<?php include 'php/footer.php'; ?>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
