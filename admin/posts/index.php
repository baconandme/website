<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blogwebsite";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete user
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM user_login WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    }
}

// Handle publish user (set role to "admin")
if (isset($_GET['publish_id'])) {
    $publish_id = intval($_GET['publish_id']);
    $sql = "UPDATE user_login SET roles = 'admin' WHERE id = $publish_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    }
}

// Fetch registered users
$sql = "SELECT id, email, username, roles FROM user_login";
$result = $conn->query($sql);
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

    <title>Admin Section - Manage Registered Users</title>
</head>
<body>
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
           <li><a href="http://localhost/website/login.php" class="logout">logout</a></li>
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
        <!-- Button Group -->
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add post</a>
            <a href="index.php" class="btn btn-big">Manage post</a>
        </div>

        <div class="content">
            <h2 class="page-title">Manage Registered Users</h2>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th colspan="3">Actions</th>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['roles']); ?></td>
                                <td><a href="edit_user.php?id=<?php echo $row['id']; ?>" class="Edit">Edit</a></td>
                                <td><a href="index.php?delete_id=<?php echo $row['id']; ?>" class="Delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a></td>
                                <td><a href="index.php?publish_id=<?php echo $row['id']; ?>" class="Publish">Publish</a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- slick carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--Custom Script-->
<script src="../../js/index.js"></script>
</body>
</html>
