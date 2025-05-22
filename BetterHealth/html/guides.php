<?php 
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <title>Guides</title>
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
      <style></style>
</head>
<body>
    <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><a href="index.php"><img src="images/newLogo.png"></a></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#about_us">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="guides.php">Guides</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="tutors.php">Tutors</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#contact">Contact Us</a>
                        </li>

                        <!-- PHP -->

                        <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Show only when logged in -->
                        <li class="nav-item">
                           <a class="nav-link" href="logout.php" onclick="return confirmLogout();">Logout</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo ($_SESSION['is_admin'] == 1) ? 'admin.php' : 'dashboard.php'; ?>">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</a>
                        </li>
                        <?php else: ?>
                        <!-- Show only when NOT logged in -->
                        <li class="nav-item">
                           <a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <?php endif; ?>

                        <li class="nav-item">
                           <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                        
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!--header section end -->
    <!-- GUIDES section start -->
      <div class="gallery_section layout_padding" id="gallery">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="gallery_taital">Our Guides</h1>
               </div>
            </div>
            <div class="">
        <div class="gallery_section_2">
    
    <div class="row">
    <?php
    $sql = "SELECT * FROM articles ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
    <div class="col-md-4">
        <div class="container_main">
            <p class="gallery-item">
                <?= htmlspecialchars($row['title']) ?><br>
                <small><em>by <?= htmlspecialchars($row['author']) ?></em></small>
            </p>
            <img src="images/gallery_img<?= rand(1,3) ?>.jpg" alt="Article Image" class="image">
            <div class="overlay">
                <div class="text">
                    <a href="article_template.php?id=<?php echo htmlspecialchars($row['id']); ?>"> Read More <i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php
        endwhile;
        else:
            echo "<p>No articles found.</p>";
        endif;
    ?>
    </div>
</div>
                  <!-- <div class="row">
                     <div class="col-md-4">
                        <div class="container_main">
                           <p class="gallery-item"> How to seduce your male friends </p>
                           <img src="images/gallery_img1.jpg" alt="Avatar" class="image">
                           <div class="overlay">
                              <div class="text"><a href="article_1.html"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="container_main">
                           <p class="gallery-item"> How to not cry after cutting onions </p>
                           <img src="images/gallery_img2.jpg" alt="Avatar" class="image">
                           <div class="overlay">
                              <div class="text"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="container_main">
                           <p class="gallery-item"> Why vegies are overrated </p>
                           <img src="images/gallery_img3.jpg" alt="Avatar" class="image">
                           <div class="overlay">
                              <div class="text"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->

               <!-- End of div: Copy here-->
               
               

            </div>
            <div class="seemore_bt">
            <a href="<?php echo isset($_SESSION['user_id']) ? 'article_gallery.php' : 'signup.php'; ?>"> See More </a>
            </div>

         </div>
      </div>
      <!-- GUIDES section end -->
</body>
</html>