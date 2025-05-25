<!-- For admins to do admin things -->
<?php session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
} 
include 'db.php';

$userId = $_SESSION['user_id'];
$isTutor = $_SESSION['is_tutor']; 
$isAdmin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : 0;


$quotes = [
    "Believe you can and you're halfway there.",
    "Every accomplishment starts with the decision to try.",
    "You miss 100% of the shots you don't take.",
    "The best time to start was yesterday. The next best time is now.",
    "It does not matter how slowly you go as long as you do not stop.",
    "We can all fight against loneliness by engaging in random acts of kindness."
];

$random_quote = $quotes[array_rand($quotes)];

$myArticles = [];

if ($isTutor == 1) {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $myArticles[] = $row;
    }
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
      <title>Dashboard</title>
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
        .services_taital {
            width: 100%;
            font-size: 40px;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .services_text {
            width: 100%;
            font-size: 16px;
            color: #ffffff;
            margin: 0px;
            text-align: center;
        }
        
       
      </style>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><a href="index.php"><img src="images/newlogo.png"></a></div>
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
                           <a class="nav-link" href="g">Guides</a>
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
      <!-- TUTORS section start -->
      <div class="services_section layout_padding" id="service">
         <div class="container">
            <div class="row">
               
                  <h1 class="services_taital">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
                  <p class="services_text"><?php echo htmlspecialchars($quotes[array_rand($quotes)]); ?></p>
                  <?php if ($isTutor == 1): ?>
   <div style="margin-top: 40px;">
      <h2 class="services_taital" style="font-size: 32px;">My Articles</h2>
      <?php if (count($myArticles) > 0): ?>
         <?php foreach ($myArticles as $article): ?>
            <div class="article-card" style="background:#f2f2f2;padding:15px;border-radius:10px;margin:15px 0;">
               <h3><?= htmlspecialchars($article['title']) ?></h3>
               <p><?= htmlspecialchars(substr($article['content'], 0, 100)) ?>...</p>
               <a href="article_template.php?id=<?= $article['id'] ?>" style="color:blue;">Read More</a>
            </div>
         <?php endforeach; ?>
      <?php else: ?>
         <p style="text-align:center;color:#fff;">You haven't written any articles yet bruh.</p>
      <?php endif; ?>
   </div>
<?php endif; ?>
            </div>
         </div>
       </div>
      <!-- Tutors section end -->
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
                        <li><a href="tutors.php">Services</a></li>
                        <li><a href="contact_us.php">Tutors</a></li>

                        <?php if (isset($_SESSION['user_id'])): ?> <!--Show when logged in -->
                        <li><a class="footer_menu" href="account.php"> Account</a> </li>
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