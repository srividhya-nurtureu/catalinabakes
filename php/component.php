<?php

function component($cakename, $cakeprice,$cakeimage, $cakeid, $cakedescription)
{
    $element = '
    <div class="col-md-3 col-sm-6 my-3 my-md-0">
    <form action="index.php" method="post">
    <div class="card shadow">
    <div>
    <img src="' . $cakeimage . '" alt="Butterscotch Cake" class="img-fluid card-img-top">

       </div>
        <div class="card-body">
        <h6 class="card-title">' . $cakename . '</h6>

                    <p class="card-text"> ' . $cakedescription .'</p>
            
                         <h5> <small><s class="text-secondary"> </s></small>
             <span class="price">' . $cakeprice . '</span>
            </h5>
            <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
            
            <input type="hidden" name="cake_id" value="' . $cakeid . '">

            </div>
    </div>
</form>
</div>
    ';
    echo $element;
}

function cartElement($cakeimage, $cakename, $cakeprice, $cakeid, $quantity)

{
    $element='
    <form action="cart.php?action=remove&id=' . $cakeid . '" method="POST" class="cart-items">

   
    <div class="border rounded">
      <div class="row bg-white">
        <div class="col-md-3 pl-0">
        <img src="' . $cakeimage . '" alt="Butterscotch Cake" class="img-fluid card-img-top">
                 </div>
        <div class="col-md-6">
          <h6 class="pt-2">'. $cakename .'</h6>
         
          <h5 class="pt-2">'. $cakeprice . '</h5>
         
         
         <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
        </div>
         <div class="col-md-3 py-5">
         <div class="input-group">
         <div class="input-group-prepend">
         <!-- Decrease button -->

        <button type="button" class="btn bg-light border rounded-circle decrease-btn" onclick="decreaseQuantity(' . $cakeid . ')">
        <i class="fas fa-minus"></i>
         </button>
        </div>

         <!-- Quantity input -->
          
          <input id="quantity-'. $cakeid .'" type="text" value="' . $quantity . '" class="form-control w-25 d-inline quantity-input">
          
          <!-- Increase button -->
          <div class="input-group-append">
          
          <button type="button" class="btn bg-light border rounded-circle increase-btn" onclick="increaseQuantity(' . $cakeid . ')">
          <i class="fas fa-plus"></i>
     
           </button>
         </div>
        </div>
        </div>
      </div>
    </div>
   </form>
    
    
    ';
    echo $element;
}
?>


