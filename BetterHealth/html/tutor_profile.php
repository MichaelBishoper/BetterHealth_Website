<?php

session_start();
require_once 'db.php';

$conn = $GLOBALS['conn'];
$user_id = $_SESSION['user_id'];
$tutor_id = intval($_GET['id']); 
if (!isset($_GET['id'])) {
    echo "No tutor ID provided.";
    exit;
}

// sanitize get input
$tutor_id = intval($_GET['id']); 


// Fetch tutor info
$stmt = $conn->prepare("SELECT * FROM tutors WHERE user_id = ?");
$stmt->bind_param("i", $tutor_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows === 0) {
    echo "Tutor not found.";
    exit;
}

$tutor = $result->fetch_assoc();
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
      <title>Tutors Page</title>
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
         .tutor-btn {
         color: #10e2bd;
         font-size: 0.5rem;
      }
            .seemore_bt {
         width: 170px;
         margin: 0 auto;
         text-align: center;
         display: flex;
      }

      .seemore_bt a {
         width: 100%;
         text-align: center;
         font-size: 16px;
         color: #ffffff;
         background-color: #252525;
         padding: 10px 0px;
         margin-top: 40px;
      }

      .tutor-card img {
         border-radius: 100%;
      }

      .services_text {
         margin-bottom: 15px;
      }
      .img_centered {
         align-items: center;
      }

      .float_left {
         float: left;
         text-align: left;
      }

      .tutor-btn {
      background-color: red;        
      color: #fff;                   
      border: 2px solid red;         
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
      transition: all 0.3s ease;
      }

      .tutor-btn:hover {
      background-color: darkred;         
      color: whitesmoke;                    
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
                           <a class="nav-link" href="tutors.php">Back</a>
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
                           <a class="nav-link" href="contact_us.php">Contact Us</a>
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





      <!-- TUTORS section start 🛺🛺🛺🛺🛺🛺🛺🛺 --> 
      <?php

      
         // Unsubscribe Logic
         $subscribed = false;
         if (isset($_SESSION['user_id']) && isset($tutor_id)) {
         $stmt = $conn->prepare("SELECT 1 FROM tutor_subscribe WHERE user_id = ? AND tutor_id = ?");
         $stmt->bind_param("ii", $_SESSION['user_id'], $tutor_id);
         $stmt->execute();
         $stmt->store_result();
         $subscribed = $stmt->num_rows > 0;
         $stmt->close();
      }
      ?>

      <div class="services_section layout_padding" id="service">
         <div class="container">
            <?php
            $pfp = !empty($tutor['pfp_url']) ? htmlspecialchars($tutor['pfp_url']) : 'uploads/default_pfp.png';
            ?>

            <img class="tutor-card" src="<?php echo $pfp; ?>" style="width: 250px; height: 250px;" alt="Tutor profile picture">
            <h3 class="services_taital float_left"><?php echo htmlspecialchars($tutor['tutor_name'])?> </h3>
            <h3 class="services_text float_left"><?php echo htmlspecialchars($tutor['bio'])?> </h3>

            <?php if (isset($_SESSION['user_id']) && isset($tutor_id)): ?>
        <form action="tutor_subscribe.php" method="POST">
            <input type="hidden" name="tutor_id" value="<?php echo $tutor_id; ?>">
            <button class="tutor-btn" type="submit" name="subscribe">

            <?php echo $subscribed ? 'Unsubscribe' : 'Subscribe'; ?>

            </button>
         </form>

               
            <?php endif; ?>
         </div>
         </div>
         
         </div>

         <?php
        
         ?>

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
                        <li><a href="index.php">Home</a></li>
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