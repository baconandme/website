<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogwebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Slick slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <title>Single Post</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1 class="logo-text"><span>Food</span>Blog </h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
           <li><a href="index.html">Home</a></li>
           <li><a href="#">About</a></li>
           <li><a href="#">Services</a></li>
           <li>
            <a href="#">
                <i class="fa fa-user"></i>
                Chavs FoodBlog
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
               <li><a href="#">Dashboard</a></li>
               <li><a href="login.html" class="logout">logout</a></li>
            </ul>
           </li>
        </ul>  
    </header>
    
    <!-- Page wrapper -->

    <div class="page-wrapper"></div>
     
    <!-- Post slider -->
<div class="post-slider">
    <h1 class="slider-title">Cravings</h1>
    <div class="post-wrapper">

        <div class="post">
            <img src="Cravings.jpg" alt="" class="post-image">
            <div class="post-info">
                <h4><a href="single.html">Cravings</a></h4>
                <i class="far fa-user"> Chavie</i>
                &nbsp;
                <i class="far fa-calendar"> 1/10/2024</i>
            </div>
        </div>    

        <div class="post">
            <img src="Cravings Menu.jpg" alt="" class="post-image">
            <div class="post-info">
                <h4><a href="single.html">Cravings Menu</a></h4>
                <i class="far fa-user"> Chavie</i>
                &nbsp;
                <i class="far fa-calendar"> 1/10/2024</i>
            </div>
        </div>  


        <div class="post">
            <img src="Cravings Menu 2.jpg" alt="" class="post-image">
            <div class="post-info">
                <h4><a href="single.html">Cravings Menu</a></h4>
                <i class="far fa-user "> Chavie</i>
                &nbsp;
                <i class="far fa-calendar"> 1/10/2024</i>
            </div>
        </div>  

        <div class="post">
            <img src="Cravings open.jpg" alt="" class="post-image">
            <div class="post-info">
                <h4><a href="single.html">Cravings</a></h4>
                <i class="far fa-user"> Chavie</i>
                &nbsp;
                <i class="far fa-calendar"> 1/10/2024</i>
            </div>
        </div>  

    </div>
</div>
     
<!-- Content-->
<div class="content clearfix">



<!-- Main Content-->
<div class="main-content single">
  <h1 class="post-title">Cravings</h1>

  <div class="post-content">
      <p>If you're craving delicious food with a twist, Cravings is the perfect spot to check out! Located in North Fundador, Iloilo, they serve a unique blend of affordably priced international dishes with a delightful Filipino twist. They recently introduced new flavors, much bigger and better servings, and their famous unli-rice, unli-gravy, and unli-soup offer unbeatable value.</p>
      <p>Step into their exciting menu options, starting with a choice of Protein: Chicken, Pork, Beef, or Sausage & Franks, all paired with rice and flavorful toppings. Then, amp up your meal by selecting from a range of irresistible sauces—whether you're into Garlic Parm, Umami Gold, or a spicy kick like Mango Habanero, there's something to suit every palate.</p>
      <p>With servings like whole chicken thighs, wings, and drumsticks with unlimited rice for only ₱135, it's an irresistible deal that's sure to satisfy your cravings. Get ready to indulge in deliciousness at Cravings!</p>
  </div>
   
  <!-- Like and Comment Form -->
  <div class="like-comment-section">
      <form>
          <div class="heart__icon center__display" id="like-btn">
              <i class="far fa-heart"></i> <span id="like-count">0</span> Likes
          </div>
          <div class="form__info center__display">
              <input type="text" id="user" placeholder="Your user name">
              <input type="text" id="comment-input" placeholder="Add a short comment here">
          </div>
          <button type="submit" class="submit__btn">
              Submit
          </button>
      </form>

      <!-- Display comments -->
      <div id="comment-display"></div>
  </div>
</div>






 <!-- Side Bar -->
<div class="sidebar single">
    <div class="section popular">
        <h2 class="section-title">Popular</h2>

        <div class="post clearfix">
            <img src="Drip.jpg" alt="">
            <a href="#" class="title">Drip</a>
        </div>

        <div class="post clearfix">
            <img src="Jeval Beau Restaurant.jpg" alt="">
            <a href="#" class="title">Jeval Beau Restaurant</a>
        </div>

        <div class="post clearfix">
            <img src="Wrap n Bites.jpg" alt="">
            <a href="#" class="title">Wrap n Bites</a>
        </div>

        <div class="post clearfix">
            <img src="Pares university.jpg" alt="">
            <a href="#" class="title">Pares University</a>
        </div>
    </div>



    <div class="section topics">
      <h2 class="section-title">Category</h2>
      <ul>
        <li><a href="#">Cafés</a></li>
        <li><a href="#">Buffet/Casual dining</a></li>
        <li><a href="#">Korean BBQ</a></li>
        <li><a href="#">Fine dining</a></li>
        <li><a href="#">Casual dining</a></li>
      </ul>
    </div>
  </div>
  

   <!--Footer--
   <div class="footer">
    <div class="footer-content">
  
      <div class="footer-section about">
        <h1 class="logo-text"><span>Food</span>Blog</h1>
        <p>
          FoodBlog highlights Iloilo’s hidden culinary gems, featuring vibrant food spots that offer budget-friendly yet high-quality meals. Discover the flavors of the city, from cozy local cafes to bustling street food markets, all while keeping your wallet in check. Join us as we uncover the best places to satisfy your cravings without breaking the bank!
        </p>
        <div class="contact">
          <span><i class="fas fa-phone"></i>&nbsp;123-456-789 </span>
          <span><i class="fas fa-envelope"></i>&nbsp;chaviesabado08@gmail.com</span>
        </div>
        <div class="socials">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
  
      <div class="footer-section links">
        <h2>Quick Links</h2>
        <ul>
          <li><a href="#">* Events</a></li>
          <li><a href="#">* Teams</a></li>
          <li><a href="#">* Gallery</a></li>
          <li><a href="#">* Terms and Conditions</a></li>
        </ul>
      </div>
  
      <div class="footer-section contact-form">
        <h2>Contact us</h2>
        <form action="index.html" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
          <textarea name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
          <button type="submit" class="btn btn-big">
            <i class="fas fa-envelope"></i> Send
          </button>
        </form>
      </div>
  
    </div>
  </div>
  
    
    <div class="footer-bottom">
      <small>&copy; FoodBlog.com | Designed by John Chavie Sabado</small>
    </div>
  </div>>
        





     jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- slick carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!--Custom Script-->
    <script src="js/index.js"></script>
</body>
</html>