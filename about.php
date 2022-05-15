<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/blog-1.jpg" alt="blog">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We aim to provide a first-class service, getting you from door to destination in style and comfort all for a low fixed price. Excepturi fugiat placeat iusto facere id officia assumenda temporibus?</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>I am happy with all the services except for the bill amount. I was unable to understand how the bill amount was calculated. I would be grateful if someone can explain it to me. Regards</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ashutosh Misra</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>I booked a Mahindra Xylo but got an Innova. That was the only part which I could see wrong. Rest the journey was superb, the Driver had the knowledge of the place.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sudha</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>my experience with q clear is superb. easy to book car was good and new as promised driver was good whatever i m very happy and satisfied hope u will maintain same quality in feature also</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Dr.Tushar Singh</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>Driver was very polite and he ensured that we reached back to the airport on time though there was heavy traffic. His name is Maruti Shingate car front seat does not have seat belt</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mahi Gupta</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>I am happy with the service. Driver behaviour and punctuality is very good. The only dissapointed thing is that car front seat does not have seat belt, but car condition is good.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Satheesh Adepu</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>The overall service from booking till trip completion was good except the payment option which I was made to pay in cash even after informing upfront</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Priya Gupta</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">Taxi Features</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/car-1.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Hundai Car</h3>
      </div>

      <div class="box">
         <img src="images/car-2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Tata Car</h3>
      </div>

      <div class="box">
         <img src="images/car-3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Yamaha Scooty</h3>
      </div>

      <div class="box">
         <img src="images/car-4.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Honda. Petrol: i-VTEC</h3>
      </div>

      <div class="box">
         <img src="images/car-5.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>CNG Auto</h3>
      </div>

      <div class="box">
         <img src="images/car-6.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Laxery Car</h3>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>