<?php
session_start();

// Get old inputs or set defaults (so u dont have to fill in whats already right again)
$username = $_SESSION['old']['username'] ?? '';
$email = $_SESSION['old']['email'] ?? '';
$errors = $_SESSION['errors'] ?? [];

// Clear old data after showing it
unset($_SESSION['old'], $_SESSION['errors']);
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

  <title>Signup</title>
  <style>
    form {
  display: flex;
  flex-direction: column;
  gap: 7px;
  width: 400px;
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
  height: 115vh;
  }

  input[type=text], input[type=password], input[type=email] {
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
  
<!-- displays the error message in red text-->
  <?php if (!empty($errors)): ?>
    <ul style="color: red;">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <div class="container">
    <div class="form_container">
      <form action="action.php" method="post">
      <img src="images/BetterHealth_Banner.png">
        <input type="hidden" name="action" value="signup">  <!--This is the key that will let action now which case to use -->

        <label for="username">Enter Your Username:</label>
        <input name="username" type="text" id="username" required value="<?= htmlspecialchars($username) ?>">

        <label for="password">Enter a Password:</label>
        <input name="password" type="password" id="password" required minlength="8">
        
        <small style="color: gray;">Password must be at least 8 characters long.</small>
    

        <label for="email">Email:</label>
        <input name="email" type="email" id="email" required value="<?= htmlspecialchars($email) ?>">

        <button type="submit" id="submit" value="Submit">Register</button>  
        <button type="button" onclick="window.location.href='login.php'">Go to Login</button>
        <button type="button" class="cancelbtn" onclick="window.location.href='index.php'">Cancel</button>
      </form>
    </div>
  </div>
  
</body>
</html>

