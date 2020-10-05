<?php

session_start();

if (empty($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);

?>

 <p>
   Item added to cart!
   <a = href="shopping_cart.php">Go to Cart</a>
 </p>
