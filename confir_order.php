<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $pickup_address = mysqli_real_escape_string($conn, $_POST['pickup_street'].', '. $_POST['country']);
   $drop_address = mysqli_real_escape_string($conn, $_POST['drop_street'].', '. $_POST['country']);
   // $pickup_date = date('d-M-Y');
   $pickup_date = $_POST['date'];
   $pickup_time = $_POST['time'];
   

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'];
         $sub_total = ($cart_item['price']);
         $cart_total = $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND pickup_address = '$pickup_address' AND drop_address = '$drop_address' AND car_name = '$total_products' AND price_rate = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = "You are't selected any car";
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, pickup_address,drop_address, car_name, price_rate, pickup_date, pickup_time) VALUES('$user_id', '$name', '$number', '$email', '$method', '$pickup_address','$drop_address', '$total_products', '$cart_total', '$pickup_date','$pickup_time')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
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
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>checkout</h3>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span><?php echo '$'.$fetch_cart['price'].'/Km'; ?></span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Grand total : <span>$<?php echo $grand_total; ?>/Km</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your name :</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>
         <div class="inputBox">
            <span>Your number :</span>
            <input type="number" name="number" required placeholder="Enter your number">
         </div>
         <div class="inputBox">
            <span>Your email :</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="inputBox">
            <span>Payment method :</span>
            <select name="method">
               <option value="cash on delivery">Cash Payment</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Pickup Time :</span>
            <input type="time" name="time" required placeholder="12:00 AM">
         </div>
         <div class="inputBox">
            <span>Pickup Date :</span>
            <input type="date" name="date" required placeholder="12-may-2022">
         </div>
         <div class="inputBox">
            <span>Pickup address :</span>
            <input type="text" name="pickup_street" required placeholder="e.g.flat no, street name, mumbai, maharashtra 123456.">
         </div>
         <div class="inputBox">
            <span>Drop address :</span>
            <input type="text" name="drop_street" required placeholder="e.g.flat no, street name, mumbai, maharashtra 123456.">
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" required placeholder="e.g. India">
         </div>
      </div>
      <input type="submit" value="Book Now" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>