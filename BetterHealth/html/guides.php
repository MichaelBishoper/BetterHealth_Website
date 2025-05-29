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
      <style>
         .gallery_section {
            width: 100%;
            float: left;
            padding-bottom: 0px;
            background-image: url('images/guides_bg2.jpg');
         }

         .gallery_taital {
            width: 100%;
            float: left;
            text-align: center;
            font-size: 40px;
            color: #f76d37;
            font-weight: bold;
         }

         .gallery_text {
            width: 100%;
            float: left;
            font-size: 16px;
            text-align: center;
            margin: 0px;
            padding-top: 20px;
            color: #262525;
         }

         .gallery_section_2 {
            width: 100%;
            float: left;
            padding-top: 50px;
         }

         .container_main {
            margin-bottom: 30px;
         }

         .liked_heart {
            color: red;
         }

         .unliked_heart {
            color: grey;
         }

         

      </style>
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
                           <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="guides.php">Guides</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="tutors.php">Tutors</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact">Contact Us</a>
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
<?php 
   $liked_articles = [];
   if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $like_sql = "SELECT article_id FROM article_likes WHERE user_id = ?";
      $stmt = $conn->prepare($like_sql);
      $stmt->bind_param("i", $user_id);
      $stmt->execute();
      $like_result = $stmt->get_result();
      while ($like_row = $like_result->fetch_assoc()) {
         $liked_articles[] = $like_row['article_id'];
      }
      $stmt->close();
   }

   // Filter only liked articles
   $sql = "
   SELECT a.*
   FROM articles a
   INNER JOIN article_likes al ON a.id = al.article_id
   WHERE al.user_id = ?
   ORDER BY a.created_at DESC
   ";

   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $_SESSION['user_id']);
   $stmt->execute();
   $result = $stmt->get_result();
?>
            
            <!-- Only Show when user has liked a guide -->
            

            <div class="row">
               <div class="col-sm-12">
                  <?php if($result->num_rows > 0): ?>
                  <h1 class="gallery_taital">Liked Guides</h1>
                  <?php endif ?>
               </div>
            </div>
            
            <div class="">
               <div class="gallery_section_2">
                  <div class="row"> 
            
            <!-- Iterates over the user's LIKED GUIDES -->

<?php
   if ($result && $result->num_rows > 0):
       while ($row = $result->fetch_assoc()):  // Start While Loop
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
               <?php if (isset($_SESSION['user_id'])): ?>
               <a href="article_template.php?id=<?php echo htmlspecialchars($row['id']); ?>"> 
                  Read More <i class="fa fa-search" aria-hidden="true"></i>
               </a>
               <?php else: ?>
               <span style="cursor: not-allowed;" title="Login Required">
                  <i class="fa fa-lock" aria-hidden="true"></i>
               </span>
               <?php endif; ?>
            </div>
         </div>
                  
         <?php
            $article_id = $row['id'];
            $is_liked = in_array($article_id, $liked_articles);
         ?>
         <div class="like-section">
            <?php if (isset($_SESSION['user_id'])): ?>
               <form action="like_article.php" method="POST" style="display:inline;">
                  <input type="hidden" name="article_id" value="<?= $article_id ?>">
                  <button type="submit" name="like" class="like-btn" style="background:none;border:none;">
                     <?php if ($is_liked): ?>
                        <i class="fa fa-heart liked_heart"></i> Liked
                     <?php else: ?>
                        <i class="fa fa-heart unliked_heart"></i> Like
                     <?php endif; ?>
                  </button>
               </form>
            <?php else: ?>
               <span title="Login to like">🤍</span>
            <?php endif; ?>
         </div>

      </div> <!-- .container_main -->
   </div> <!-- .col-md-4 -->

<?php
            endwhile;  //  END LOOP
         else:
            echo "<p>Love an article? Like it to save it! </p>";
         endif;
?>
</div>
   

   <div class="row">
      <div class="col-sm-12">
         <h1 class="gallery_taital">All Guides</h1>
      </div>
   </div>
      
    <div class="row"> <!-- Iterates Over While Loop -->
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
                      <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="article_template.php?id=<?php echo htmlspecialchars($row['id']); ?>"> Read More <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                     <?php else: ?>
                     <span style="cursor: not-allowed;" title="Login Required">
                           <i class="fa fa-lock" aria-hidden="true"></i>
                     </span>
                  <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        endwhile;
        else:
            echo "<p>Love an article? Like it to save it! </p>";
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
               
               

            <!-- </div>
            <div class="seemore_bt">
            <a href="<?php echo isset($_SESSION['user_id']) ? 'article_gallery.php' : 'signup.php'; ?>"> See More </a>
            </div> -->

         </div>
      </div>
      <!-- GUIDES section end -->
       <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">About</h3>
                  <p class="footer_text">We provide high quality nutrition blogs that helps readers learn more about nutrition and lets them choose an optimal diet.</p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">Menu</h3>
                  <div class="footer_menu">
                     <ul>
                        <!-- Show regardless -->
                        <li><a href="#">Home</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="guides.php">Guides</a></li>
                        <li><a href="tutors.php">Tutors</a></li>
                        <li><a href="contact_us.php">Contact Us</a></li>

                        <?php if (isset($_SESSION['user_id'])): ?> <!--Show when logged in -->
                        <li><a class="footer_menu" href=<?php echo ($_SESSION['is_admin'] == 1) ? 'admin.php' : 'dashboard.php'; ?>> Account</a> </li>
                        <li><a class="footer_menu" href="logout.php" onclick="return confirmLogout();"> Logout</a> </li>
                        <?php else: ?> <!--Show when NOT logged in -->
                        <li class="nav-item">
                        <a href="signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                        <a href="login.php">Login</a>
                        </li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </div>

               <!-- Fix spacing issue (Same Solution as above--> 
               <div class="col-lg-3 col-sm-6">
                  <div class="footer_menu"> 
                  <h1 class="useful_text">Useful Links</h1>
                  <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/@Talon_Fitness">Talon Fitness</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/@Talon_Fitness">Muscle Mommy</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/@Talon_Fitness">Muscle Mommy</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/@Talon_Fitness">Muscle Mommy</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/@Talon_Fitness">Muscle Mommy</a>
                  </li>
                  </div>
                  
                  
                  <!-- <p class="dummy_text nav-item"><a href="">Talon_Fitness</a></p>
                  <p class="nav-item"><a href="https://www.youtube.com/@Talon_Fitness">Muscle Mommy</a></p> -->
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h1 class="useful_text">Contact Us</h1>
                  <div class="location_text">
                     <ul>
                        <li>
                           <a href="https://youtu.be/L_ByGeT4Qzk">
                           <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_10">Address : The Prominence Office Tower, Jl. Jalur Sutera Bar. No.15, RT.003/RW.006, Panunggangan Tim., Kec. Pinang, Kota Tangerang, Banten 15143</span>
                           </a>
                        </li>
                        <li>
                           <a href="https://youtu.be/L_ByGeT4Qzk">
                           <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">Call : +62 810 0928 1882</span>
                           </a>
                        </li>
                        <li>
                           <a href="https://youtu.be/L_ByGeT4Qzk">
                           <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_10">Email : betterhelp@gmail.com</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
       <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2025 All Rights Reserved.</p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>     
      <!--Logout confirmation -->
      <script>
      function confirmLogout() {
      return confirm("Are you sure you want to log out?");
      }
      </script>
</body>
</html>