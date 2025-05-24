<?php require_once 'db.php'; 
session_start();

// Check if 'id' is passed in URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Sanitize input
    $stmt = $conn->prepare("SELECT title, content, author FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();  // <-- fetch the row here
} else {
    echo "No article selected.";
    exit;
}

$liked = false;
if (isset($_SESSION['user_id']) && $result && $row) {
    $user_id = $_SESSION['user_id'];
    $article_id = $id;

    $like_check_sql = "SELECT 1 FROM article_likes WHERE user_id = ? AND article_id = ? LIMIT 1";
    $stmt_like = $conn->prepare($like_check_sql);
    $stmt_like->bind_param("ii", $user_id, $article_id);
    $stmt_like->execute();
    $stmt_like->store_result();
    if ($stmt_like->num_rows > 0) {
        $liked = true;
    }
    $stmt_like->close();
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
     <title>BetterHealth</title>
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

     <style>
         .liked_heart {
            color: red;
         }

         .unliked_heart {
            color: grey;
         }

         i.liked_heart:hover {
            color:rgb(0, 0, 0);
         }
     </style>
</head>

<body> 
<div class="header_section">
    <div class="container-fluid">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo"><a href="index.php"><img src="images/newLogo.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                   <a class="nav-link" href="guides.php">Back</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="tutors.php">Tutors</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
                <?php if ($_SESSION['is_admin'] == 1): ?>
                   <a class="nav-link" href="admin.php">Admin</a>
                <?php endif; ?>
               
                
             </ul>
          </div>
       </nav>
    </div>
 </div>

 <main>
    <?php if ($row): ?>
        <h1 class="gallery_taital"><?php echo htmlspecialchars($row['title']); ?></h1>
        <h2 class="client_text subheading">By <?php echo htmlspecialchars($row['author']); ?></h2>
        <p class="client_text">
            <?php echo nl2br(htmlspecialchars($row['content'])); ?>
        </p>
    <?php else: ?>
        <h2>Article not found.</h2>
        <p>Try returning to the <a href="index.php">homepage</a>.</p>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id']) && $row): ?>
        <form action="article_like.php" method="POST" style="margin-top: 20px;">
            <input type="hidden" name="article_id" value="<?= htmlspecialchars($id) ?>">
            <button class="like-btn" style="background:none; border:none; font-size:18px; cursor:pointer;">
            <i class="fa fa-heart <?= $liked ? 'liked_heart' : 'unliked_heart' ?>"></i>
            <?= $liked ? 'Liked' : 'Like' ?>
            </button>
        </form>
        <!-- Extra protection -->
    <?php elseif (!isset($_SESSION['user_id'])): ?>
        <p><em><a href="login.php">Log in</a> to like this article.</em></p>
    <?php endif; ?>
</main>
</body>
</html>