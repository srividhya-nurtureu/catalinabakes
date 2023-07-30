<header id="header">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
        <a class="nav-link active" href="#About">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#Online Order">Products</a>
      </li>

      <li class="nav-item">
      <a class="navbar-brand  active" href="#Home"><img src="images/logo.png" alt="Catalina Cupcake Logo" class="logo"></a>
</li>
      
      <li class="nav-item">
        <a class="nav-link active" href="#Contact Us">Contact</a>
      </li>
    
      <li class="nav-item">
         <a href="cart.php" class="nav-link">
         <h5 class="px-5 cart">
       <i class="fas fa-shopping-cart"></i>Cart 
       <?php
           if(isset($_SESSION['cart']))
           {
             $count = count($_SESSION['cart']);
             echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
           }
           else
           {
          echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
           }

       ?>
          </h5>
         </a>
        </li>
          </ul>
  </div>

 </nav>
</header>
<?php
      function getLogoWidth() {
          // Condition to determine the logo width
          // Example condition: If the user is logged in, use a smaller width
          if (isset($_SESSION['user_id'])) {
              return '100px'; // Shrunk width
          } else {
              return '200px'; // Initial width
          }
      }
  ?>
