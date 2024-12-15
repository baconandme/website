<?php
// Include the database connection
require 'connection.php';

session_start(); // Start session management
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch form inputs and sanitize them
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    // Check if inputs are not empty
    if (!empty($username) && !empty($password)) {
        // Query the database for the username
        $sql = "SELECT * FROM user_login WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password using password_verify
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['roles']; // Store user role

                // Redirect based on user role
                if ($user['roles'] === 'admin') {
                    header("Location: /website/admin/posts/index.php");
                } else {
                    header("Location: index1.php");
                }
                exit();
            } else {
                $error_message = "Invalid password. Please try again.";
            }
        } else {
            $error_message = "No user found with that username.";
        }
    } else {
        $error_message = "Please fill in both username and password.";
    }
}
?>

<!DOCTYPE html>
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

    <title>login</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1 class="logo-text"><span>Food</span>Blog </h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
           <li><a href="#">Home</a></li>
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
               <li><a href="#" class="logout">logout</a></li>
            </ul>
           </li>
        </ul>  
    </header>
    
    <div class="auth-content">
        <form method="post" action="login.php">
            <h2 class="form-title">Login</h2>

            <!-- Display dynamic error message -->
            <?php if (!empty($error_message)): ?>
                <div class="msg error">
                    <li><?php echo htmlspecialchars($error_message); ?></li>
                </div>
            <?php endif; ?>

            <div>
                <label>Username</label>
                <input type="text" name="username" class="text-input" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" class="text-input" required>
            </div>

            <div>
                <button type="submit" class="btn btn-big">Login</button>
            </div>

            <p>Or <a href="index.php">Sign up</a></p>
        </form>
    </div>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
    
    <!--Custom Script-->
    <script src="index.js"></script>
</body>
</html>