<!-- Barebones NO MORE!! -->

<?php // display succes message after signup, will not display otherwise
session_start();
$success = $_SESSION['success'] ?? '';
unset($_SESSION['success']);
?>

<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<?php if (!empty($errors)): ?>
  <ul style="color: red;">
    <?php foreach ($errors as $error): ?>
      <li><?= htmlspecialchars($error) ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>


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

  <title>Login</title>
  <style> 
  form {
  display: flex;
  flex-direction: column;
  gap: 7px;
  max-width: 300px;
  text-align: center;
  border: 2px solid whitesmoke;
  align-items: center;
  background-color: whitesmoke;
  padding: 3.5px;
  }

  .form_container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 90vh;
  }

  input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  text-decoration: solid;
  }

  button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  }


  button:hover {
  opacity: 0.8;
  color: lightgreen;
  }

  .cancelbtn:hover {
  opacity: 0.8;
  color: pink;
  }


  .cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  }

  .container {
  padding: 0px;
  }

  body {
    background-image: url("images/cum.jpg");
    background-size: cover;       /* or 'contain', or exact size like '300px 200px' */
    /* background-repeat: no-repeat; avoids tiling
    background-position: center;  centers the image */
  }

  @media screen and (max-width: 300px) {
  /* span.psw {
    display: block;
    float: none;
  } */
  .cancelbtn {
    width: 100%;
  }
  }

      
  </style>

</head>



<body>

<?php if (!empty($success)): ?>
  <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>


  <div class="container">
    <div class="form_container">
      <form method="post" action="action.php">
      <img src="images/BetterHealth_Banner.png">
        <input type="hidden" name="action" value="login">
        <label for="username"> Username </label>
        <input name="username" id="username" type="text" required>

        <label for="password"> Password </label>
        <input name="password" id="password" type="password" required>
            
        <button type="submit" value="Submit">Login</button>
    
        <button type="button" onclick="window.location.href='signup.php'">Register</button>
        <button class="cancelbtn" type="button" onclick="window.location.href='index.php'">Cancel</button>
      </form>
    </div>
  </div>


  <!-- <div class="container" style="background-color:#f1f1f1">
    
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div> -->


</body>
</html>