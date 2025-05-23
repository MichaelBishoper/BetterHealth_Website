<?php session_start(); 
include 'db.php';
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
      <title>BetterHealth Baby!!!</title>
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
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="banner_taital">
                              <h1 class="outstanding_text">BetterHealth</h1>
                              <h1 class="coffee_text">Simply Fit</h1>
                              <p class="there_text">This fitness website consists of information curated from the highest echelons of internet health and fitness knowledge. It is designed to help you and guide you throughout your fitness journey, ensuring you get the most benefits from your diets, workouts, etc. This website can act as a guideline to overall health and wellbeing, keeping you healthy, whilst doing most of the scheduling and planning. </p>
                              <div class="learnmore_bt"><a href="#">Learn More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="banner_taital">
                              <h1 class="outstanding_text">BetterHealth </h1>
                              <h1 class="coffee_text">Simply Fit</h1>
                              <p class="there_text">This fitness website consists of information curated from the highest echelons of internet health and fitness knowledge. It is designed to help you and guide you throughout your fitness journey, ensuring you get the most benefits from your diets, workouts, etc. This website can act as a guideline to overall health and wellbeing, keeping you healthy, whilst doing most of the scheduling and planning. </p>
                              <div class="learnmore_bt"><a href="#">Learn More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- about section start -->
      <div class="about_section layout_padding" id="about_us">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <div class="about_taital">About Us</div>
                     <p class="about_text">This fitness website consists of information curated from the highest echelons of internet health and fitness knowledge. It is designed to help you and guide you throughout your fitness journey, ensuring you get the most benefits from your diets, workouts, etc. This website can act as a guideline to overall health and wellbeing, keeping you healthy, whilst doing most of the scheduling and planning.</p>
                     <p class="about_text"></p>
                     <div class="read_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img"><img src="images/fruit.jpg"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
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
    $counter = 0;

    if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
         if (++$counter > 3) break;
      
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
                     <a href="article_template.php?id=<?= htmlspecialchars($row['id']) ?>">
                           <i class="fa fa-search" aria-hidden="true"></i>
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
            echo "<p>No articles found.</p>";
        endif;
    ?>
                  </div>
               </div>
            </div>

            <!-- JANGAN DIHAPUS: PHP logic for see more button -->
            <div class="seemore_bt">
            <a href="<?php echo isset($_SESSION['user_id']) ? 'guides.php' : 'signup.php'; ?>"> See More </a>
            </div>

         </div>
      </div>
      <!-- GUIDES section end -->
      <!-- TUTORS section start -->
      <div class="services_section layout_padding" id="service">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="services_taital">Tutors</h1>
                  <p class="services_text">Our tutors can help you streamline your fitness journey and get you from zero to hero in no time. </p>

                  <section id="tutors" class="tutor-section">

                  <div class="tutor-card">
                  <img src="images/tutor_1.jpg" alt="Tutor 1">
                  <h3 class="services_taital">Kevin Magnussen</h3>
                  <p>Mircobiologist</p>
                  </div>

                  <div class="tutor-card">
                  <img src="images/tutor_2.jpg" alt="Tutor 2">
                  <h3 class="services_taital">Brennan Hook</h3>
                  <p>Gooning Expert</p>
                  </div>

                  <div class="tutor-card">
                  <img src="images/tutor_3.jpg" alt="Tutor 3">
                  <h3 class="services_taital">Charli YxY </h3>
                  <p>Powerlifter</p>
                  </div>

                  </section>
                     <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="seemore_bt tutor_btn">
                           <a href="tutors.php">See More</a>
                        </div>

                        <?php if (isset($_SESSION['is_tutor']) && $_SESSION['is_tutor'] == 0): ?>
                           <div class="seemore_bt tutor_btn">
                                 <a href="tutorregistration.php">Register as a Tutor</a>
                           </div>
                        <?php endif; ?>
                     <?php else: ?>
                        <!-- Optional: show nothing, or show link to sign up -->
                        <!-- <div class="seemore_bt tutor_btn">
                           <a href="signup.php">Sign up to see more</a>
                        </div> -->
                     <?php endif; ?>

               </div>
            </div>
         </div>
         </div>
            
           

      
      <!-- Tutors section end -->
      <!-- testimonial section start -->
      <div class="client_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="client_taital">Client Reviews</h1>
                  <p class="client_text">Since our soft launch back in march 2025, our clients have sent a plethora of meaningful reviews about our services</p>
               </div>
            </div>
         </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_section_2">
                <div class="container">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="testimonial_section_2">
                            <h4 class="client_name_text">Prof. Akram H.T <span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                            <p class="customer_text">Alhamdulillah, finally some educated youngsters decide to use their geeky coding skills to improve people's wellbeing instead of creating AI slop. Ever since I heard of their website, I cross check what I'm eating by searching the food content from this website.</p>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_section_2">
                <div class="container">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="testimonial_section_2">
                            <h4 class="client_name_text">Dr. Simon Pretrikov <span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                            <p class="customer_text">This is a brilliant service, my daughter loves it! She's been growing so distant from me but ever since I signed her up to BetterHealth, she now takes care of herself regularly. That's a nice thing.</p>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_section_2">
                <div class="container">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="testimonial_section_2">
                            <h4 class="client_name_text">John Doe<span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                            <p class="customer_text">The ability to speak fast and loud does not make one intelligent.</p>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
          </div>
        </div>
      </div>
     </div>
      <!-- testimonial section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_text" id="contact">Contact Us</h1>
         </div>
      </div>
      <div class="contact_section_2 layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 padding_0">
                  <div class="mail_section">
                     <div class="email_text">
                        <div class="form-group">
                           <input type="text" class="email-bt" placeholder="Name" name="Email">
                        </div>
                        <div class="form-group">
                           <input type="text" class="email-bt" placeholder="Email" name="Email">
                        </div>
                        <div class="form-group">
                           <input type="text" class="email-bt" placeholder="Phone Number" name="Email">
                        </div>
                        <div class="form-group">
                           <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="Massage"></textarea>
                        </div>
                        <div class="send_btn">
                           <div type="text" class="main_bt"><a href="#">SEND</a></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 padding_0">
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.9504567604404!2d106.6554462!3d-6.2250867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fbdc1d759ed1%3A0x60869415b1989a57!2sThe%20Prominence%20Office%20Tower!5e1!3m2!1sen!2sid!4v1743687655722!5m2!1sen!2sid" width="760" height="509.5" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
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
   </body>
</html>