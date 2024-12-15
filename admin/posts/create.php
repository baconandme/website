<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "blogwebsite");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare variables
    $title = $_POST['title'];
    $description = $_POST['body'];
    $category = $_POST['category'];
    $likes = 0; // Default likes value
    $date = date('Y-m-d H:i:s'); // Current date and time

    // Handle image upload
    $img = $_FILES['image']['name'];
    $target_dir = "C:/xampp/htdocs/website/admin/posts/uploads/";
    $target_file = $target_dir . basename($img);

    // Check if uploads directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Store only the relative path in the database
        $db_file_path = "admin/posts/uploads/" . basename($img);

        // Insert query
        $stmt = $mysqli->prepare("INSERT INTO posting (title, description, category, img, date, likes) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $title, $description, $category, $db_file_path, $date, $likes);

        // Execute query
        if ($stmt->execute()) {
            echo "New post added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
}

$mysqli->close();
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
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Admin Style -->
    <link rel="stylesheet" href="../../css/admin.css">


    <!-- Slick slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <title>Admin Section - Create Posts</title>
</head>
<>

<header>
    <div class="logo">
        <h1 class="logo-text"><span>Food</span>Blog </h1>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="#">Home</a></li>
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
    
<!-- Admin Page Wrapper -->
<div class="admin-wrapper">

<!-- Left Sidebar -->
<div class="left-sidebar">
    <ul> 
        <li><a href="#"> Manage Post</a></li>
        <li><a href="#"> Manage User</a></li>
        <li><a href="#"> Manage Topics</a></li>
    </ul>
</div>

<!-- Admin Content -->
<div class="admin-content">
    <div class="button-group">
        <a href="create.php" class="btn btn-big">Add post</a>
        <a href="index.php" class="btn btn-big">Manage post</a>
    </div>

    <div class="content">
        <h2 class="page-title">Manage Post</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" required />
            </div>
            <div>
                <label for="body">Body</label>
                <textarea id="body" name="body" placeholder="Enter the content" required></textarea>
            </div>
            <div>
                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="cafes">Cafes</option>
                    <option value="casual_dining">Casual Dining</option>
                    <option value="korean_bbq">Korean BBQ</option>
                    <option value="fine_dining">Fine Dining</option>
                </select>
            </div>
            <div>
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" required />
            </div>
            <div>
                <button type="submit" class="btn-save">Save Post</button>
            </div>
        </form>
    </div>
</div>
    
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../../js/index.js"></script>
</body>
</html>
