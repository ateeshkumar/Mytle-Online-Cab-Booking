<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fa-solid fa-viruses">Covid-19</a>
         </div>
         <p> <a href="login.php">Login</a> | <a href="register.php">Register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><img src="images/logo-1.png" alt="logo"></a>

         <nav class="navbar">
         <div class="nav-2-container">
                    <ul>
                      <li><button class="nav-2-btn"  onclick="window.location.href='home.php'"><i class="fas fa-home"></i> Home</button></li>
                      <li><button class="nav-2-btn"  onclick="window.location.href='about.php'"><i class="fas fa-exclamation-circle"></i> About</button></li>
                      <li><button class="nav-2-btn"  onclick="window.location.href='servises.php'"><i class="fas fa-cog fa-spin"></i> Our Services</button></li>
                      <li><button class="nav-2-btn"  onclick="window.location.href='contact.php'"><i class="fas fa-map-marker-alt"></i> Contact</button></li>
                      <li><button class="nav-2-btn"  onclick="window.location.href='orders.php'"><i class="fas fa-bell"></i>  Order</button></li>
                      <li><button class="nav-2-btn"  onclick="window.location.href='booking.php'"><i class="fas fa-hand-o-right"></i>  Book Now</button></li>
                    </ul>
                </div>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
         </div>

         <div class="user-box">
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Logout</a>
         </div>
      </div>
   </div>

</header>