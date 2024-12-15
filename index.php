<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "blogwebsite";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['signup'])) {
        // Handle Signup
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);

        // Check if passwords match
        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
            exit;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Check if an admin exists
        $checkAdminQuery = "SELECT COUNT(*) AS admin_count FROM user_login WHERE roles = 'admin'";
        $result = $conn->query($checkAdminQuery);
        $row = $result->fetch_assoc();

        if ($row['admin_count'] > 0) {
            // Admin exists, assign "user" role
            $roles = "user";  
        } else {
            // No admin exists, assign "admin" role
            $roles = "admin";
        }

        // Insert data into the user_login table
        $sql = "INSERT INTO user_login (email, username, password, roles) VALUES ('$email', '$username', '$hashedPassword', '$roles')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign-up successful! Redirecting to login...";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; // Debugging output
        }
    }
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

    <title>Register</title>
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
        <form action="index.php" method="post">
            <h2 class="form-title">Register</h2>

            <!-- Display error messages -->
            <?php if (!empty($errors)): ?>
                <div class="msg error">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div>
                <label>Username</label>
                <input type="text" name="username" class="text-input" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" class="text-input" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" class="text-input" required>
            </div>

            <div>
                <label>Password Confirmation</label>
                <input type="password" name="confirm-password" class="text-input" required> 
            </div>

            <div>
                <button type="submit" name="signup" class="btn btn-big">Register</
