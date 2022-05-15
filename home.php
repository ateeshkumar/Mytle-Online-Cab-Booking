<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already Choosen Go to order now!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image) VALUES('$user_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
      $message[] = 'product added to Book Now page!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

<div class="slide-container">
        <div class="w3-content w3-section" style="max-width:100%">
            <img class="mySlides" src="images/slide-1.png" style="width:100%">
            <img class="mySlides" src="images/slide-2.png" style="width:100%">
            <img class="mySlides" src="images/slide-3.png" style="width:100%">
          </div>
      </div>

</section>
<section class="work-on">
<div class="container-fluid work-container">
        <h1>HOW IT WORKS</h1>
        <div class="grid">
            <div class="grid-container">
                <div class="single-icon">
                <img src="https://carrgo-html.netlify.app/assets/images/icon/1.png" alt="icon">
                </div>
                <h4>Book in just 2 tabs</h4>
                <p>Our website is user friendly and easy to use for anyone and you can book your ride just in two tabs by choosing your destination and car.</p>
            </div>
            <div class="grid-container">
                <div class="single-icon">
                    <img src="https://carrgo-html.netlify.app/assets/images/icon/2.png" alt="icon">
                    </div>
                <h4>Get a Driver</h4>
                <p>We have well trained drivers with minimum 1 and 2 years of experience and also cooperate with customer. </p>
            </div>
            <div class="grid-container">
                <div class="single-icon">
                    <img src="https://carrgo-html.netlify.app/assets/images/icon/3.png" alt="icon">
                    </div>
                <h4>Track Your Driver</h4>
                <p>We are providing the contact number and location of driver which make it easy to get your cab without waiting for hours.</p>
            </div>
            <div class="grid-container">
                <div class="single-icon">
                    <img src="https://carrgo-html.netlify.app/assets/images/icon/4.png" alt="icon">
                    </div>
                <h4>Arrive Safely</h4>
                <p>We are providing a safe and secure ride with proper rules and regulations of traffic so that customers can arrived at your destination.</p>
            </div>
        </div>
      </div>
</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/Km</div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="Go to order" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="servises.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/blog-1.jpg" alt="blog">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Customer satisfaction is our priority and we have made easy to use interface ,we partner with safety advocates and develop new technologies and systems to help improve safety and help make it easier for everyone to get around.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>If you have any issue or any problem with our services you can contact our page!!</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/home.js"></script>

</body>
</html>