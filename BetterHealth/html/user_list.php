<?php 
session_start();

require_once 'db.php';
$conn = $GLOBALS['conn'];

$stmt = $conn->prepare("SELECT id, username, email, is_admin FROM users");
$stmt->execute();
$result = $stmt->get_result();


// while ($row = $result->fetch_assoc()) {
//     echo "<tr>";
//     echo "<td>{$row['username']}</td>";
//     echo "<td>{$row['email']}</td>";
//     echo "<td>" . ($row['is_admin'] ? 'Admin' : 'User') . "</td>";
//     echo "<td><a href='delete_user.php?id={$row['id']}'>Delete</a></td>";
//     echo "</tr>";
// }

?>

<!DOCTYPE html>
<html> 
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
    <title> View Users </title>
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
<!-- Loop through Database -->
    <h1> User List </h1>
    <?php while ($row = $result->fetch_assoc()) : ?>
    <div class="flex-container">
        <div class="flex-item">
            <h2><?php echo htmlspecialchars($row['username']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($row['email']); ?></p>
            <p><strong>User ID:</strong> <?php echo htmlspecialchars($row['id']); ?></p>
            <p><strong>Admin Status: </strong> <?php echo htmlspecialchars($row['is_admin']); ?></p>
            <p><a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?');">
            <button>Delete</button>
            </a></p>
        </div>
    </div>
    <?php endwhile; ?>
</body>
</html>
