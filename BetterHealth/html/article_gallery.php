<?php
session_start();

//start db connection
require_once 'db.php';
$conn = $GLOBALS['conn'];

$stmt = $conn->prepare("SELECT * FROM articles");  
$stmt->execute();
$result = $stmt->get_result();
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

    <title>Articles Gallery</title>
    <style>
        .flex-container {
            display: flex;
            flex-direction: column;
        }
        .flex-item {
            display: flex;
            border: 1px solid #ccc;
            align-items: center;
            margin: 5px;
            padding: 5px;
        }
        h1 {
            text-align: center;
            margin: 10px;
        }
        .site-header{
            text-align: center;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<header class="site-header">
    <nav class="nav-bar">
        <?php if ($_SESSION['is_tutor'] == 1): ?>
            <a href="dashboard.php">Back</a>
        <?php endif; ?>
        <?php if ($_SESSION['is_tutor'] == 1): ?>
            <a href="index.php">Home</a>
        <?php endif; ?>
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
    

<?php if ($_SESSION['is_admin'] == 1): 
// Show if user is ADMIN    
?>
    <h1>Article Gallery</h1>
    <!-- Loop through Database -->
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="flex-container">
            <div class="flex-item">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p>Author: <?php echo htmlspecialchars($row['author']); ?></p>
                <p><strong>Published on:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
                <p><a href="article_template.php?id=<?php echo htmlspecialchars($row['id']); ?>">Read More</a></p>
                <p><a href="delete_article.php?id=<?= urlencode($row['id']) ?>"
                      onclick="return confirm('Are you sure you want to delete this article?');">Delete</a></p>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

<?php
// Show if user is tutor
// Added filter for user's OWN articles
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT id, title, author, created_at FROM articles WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php if ($_SESSION['is_tutor'] == 1): ?>
<h1>My Articles</h1>
<?php while ($row = $result->fetch_assoc()) : ?>
    <div class="flex-container">
        <div class="flex-item">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p>Author: <?php echo htmlspecialchars($row['author']); ?></p>
            <p><strong>Published on:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
            <p><a href="article_template.php?id=<?php echo htmlspecialchars($row['id']); ?>">Read More</a></p>
            <p>
                <a href="delete_article.php?id=<?= urlencode($row['id']) ?>"
                   onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
            </p>
        </div>
    </div>
<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

      
</body>
</html>
