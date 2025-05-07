<?php
// Start the session to track the admin user
session_start();

//start connection with db
require_once 'db.php';

// Check if user is logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login if not admin
    exit;
}

// On form submit, process article creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

// SQL here
    $stmt = $conn->prepare("INSERT INTO articles (title, author, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $author, $content);
    $stmt->execute();
    $stmt->close();

    // Redirect to the article gallery page after creating the article
    header("Location: article_gallery.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <title>Create Article</title>
    <style>
        .flex-container {
            display: flex;
            flex-direction: column;
        }
        .flex-item {
            display: flex;
            align-items: center;
            /* border: 1px solid #ccc; */
            flex-direction: column;
        }
        body {

        }
        h1 {
            text-align: center;
        }
        label {

        }
        button {
        background-color: #007bff;   
        color: white;                
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;          
        cursor: pointer;
        transition: background-color 0.3s ease;
        }
        
    </style>
</head>
<body>
<header class="site-header">
    <nav class="nav-bar">
        <a href="index.php">Home</a>
        <a href="article_gallery.php">Articles</a>
        <?php if ($_SESSION['is_admin'] == 1): ?>
            <a href="create_article.php">Add Articles</a>
        <?php endif; ?>
        <?php if ($_SESSION['is_admin'] == 1): ?>
            <a href="user_list.php">Manage Users</a>
        <?php endif; ?>
        <?php if ($_SESSION['is_admin'] == 1): ?>
            <a href="admin.php">Admin</a>
        <?php endif; ?>
    </nav>
</header> 
    <h1>Create New Article</h1>
    <div class="flex-container">
        <div class="flex-item">
            <form method="POST">

                <label>Title:</label><br>
                <input type="text" name="title" required><br><br>

                <label>Author:</label><br>
                <input type="text" name="author" required><br><br>

                <label>Content:</label><br>
                <textarea name="content" rows="10" cols="60" required></textarea><br><br>

                <button onclick="return confirmAdd();" type="submit">Create Article</button>

            </form>
        </div>
    </div>

    <script>
      function confirmAdd() {
      return confirm("Confirm to add article.");
      }
    </script>
</body>
</html>
