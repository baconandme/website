<?php
    session_start();

    // Check if user is logged in
    if (isset($_SESSION['username'])) {
        $userName = $_SESSION['username'];
    } else {
        $userName = 'Guest'; // Default value if not logged in
    }
    
    // Include database connection
include 'connection.php'; // Ensure you have a db_connection.php file for DB connectivity

// Fetch related posts from the database
$query = "SELECT title, description, category, img, date FROM posting ORDER BY date DESC LIMIT 4";
$result = $conn->query($query);

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

    <title>Blog</title>
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
                <?php echo $userName; ?>
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
               <li><a href="#">Dashboard</a></li>
               <li><a href="logout.php" class="logout">logout</a></li>
               
            </ul>
           </li>
        </ul>  
    </header>
    
    <!-- Page wrapper -->
<div class="page-wrapper"></div>
     
     <!-- Post slider -->
     <div class="post-slider">
         <h1 class="slider-title">Latest Blog Posts</h1>
         <div class="post-wrapper">
     
             <div class="post">
                 <img src="Cravings.jpg" alt="" class="post-image">
                 <div class="post-info">
                     <h4><a href="userdashboard.php">Cravings</a></h4> <!-- Changed href -->
                     <i class="far fa-user"> Chavie</i>
                     &nbsp;
                     <i class="far fa-calendar"> 1/10/2024</i>
                 </div>
             </div>    
     
             <div class="post">
                 <img src="Pares university.jpg" alt="" class="post-image">
                 <div class="post-info">
                     <h4><a href="userdashboard.php">Pares University</a></h4> <!-- Changed href -->
                     <i class="far fa-user"> Chavie</i>
                     &nbsp;
                     <i class="far fa-calendar"> 1/10/2024</i>
                 </div>
             </div>  
     
             <div class="post">
                 <img src="Crispy Pares sa Muelle.jpg" alt="" class="post-image">
                 <div class="post-info">
                     <h4><a href="userdashboard.php">Crispy Pares Sa Muelle</a></h4> <!-- Changed href -->
                     <i class="far fa-user "> Chavie</i>
                     &nbsp;
                     <i class="far fa-calendar"> 1/10/2024</i>
                 </div>
             </div>  
     
             <div class="post">
                 <img src="Bangaw Keeng.jpg" alt="" class="post-image">
                 <div class="post-info">
                     <h4><a href="userdashboard.php">Bangkaw Keeng</a></h4> <!-- Changed href -->
                     <i class="far fa-user"> Chavie</i>
                     &nbsp;
                     <i class="far fa-calendar"> 1/10/2024</i>
                 </div>
             </div>  
     
         </div>
     </div>
     
     <!-- Content-->
     
     <div class="content clearfix"> 
         <div class="main-content">
             <h1 class="recent-post-title">Related Posts</h1>
     
             <?php
             // Database connection
             include 'connection.php';
     
             // Fetch posts
             $query = "SELECT title, description, category, img, date FROM posting ORDER BY date DESC LIMIT 4";
             $result = $conn->query($query);
     
             // Check if posts exist
             if ($result && $result->num_rows > 0):
                 while ($row = $result->fetch_assoc()): 
             ?>
             <!-- Post -->
             <div class="post">
                 <!-- Display Image -->
                 <img src="<?php echo htmlspecialchars($row['img']); ?>" alt="post-image" class="post-image">
     
                 <!-- Post Content -->
                 <div class="post-preview">
                     <!-- Title -->
                     <h2>
                         <a href="userdashboard.php"><?php echo htmlspecialchars($row['title']); ?></a> <!-- Changed href -->
                     </h2>
     
                     <!-- Category -->
                     <i class="far fa-user"> <?php echo htmlspecialchars($row['category']); ?></i>
                     &nbsp;
     
                     <!-- Date -->
                     <i class="far fa-calendar"> <?php echo date('d/m/Y', strtotime($row['date'])); ?></i>
     
                     <!-- Description -->
                     <p class="preview-text">
                         <?php echo htmlspecialchars($row['description']); ?>
                     </p>
                 </div>
             </div>
             <?php 
                 endwhile; 
             else: 
             ?>
                 <!-- If no posts found -->
                 <p>No related posts available.</p>
             <?php 
             endif;
             ?>
         </div>
     </div>
    </div>
  
    <div class="sidebar">

      <div class="section search">
        <h2 class="section-title">Search</h2>
        <form action="index.html" method="post">
          <input type="text" name="search-term" class="text-input" placeholder="Search...">
        </form>
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

  </div>
  

   <!--Footer-->
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
  </div>
        





    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- slick carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <!--Custom Script-->
    <script src="index.js"></script>
</body>
</html>