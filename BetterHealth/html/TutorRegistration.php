<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); 
}
require_once 'check_existing_tutor.php'; // kicks if user is already a tutor or pending 

$old_name = $_SESSION['old']['tutor_name'] ?? '';
$old_bio = $_SESSION['old']['bio'] ?? '';
$errors = $_SESSION['errors'] ?? '';
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
      <title>Tutor registration</title>
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
        form {
            display: flex;
            flex-direction: column;
            gap: 7px;
            width: 400px;
            text-align: center;
            border: 2px solid whitesmoke;
            align-items: center;
            background-color: whitesmoke;
            padding: 9.5px; /* Changes the thickness of the form box */
            border-radius: 2.5%;
            }

            .form_container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }

            input[type=text], input[type=password], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            text-decoration: solid;
            }

            input[type=file] {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            }

            input[type=file]:hover {
            background-color:rgb(197, 202, 200);
            color: black;
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

        .file-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }

        .custom-file-btn {
            background-color:rgb(26, 104, 75);
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .custom-file-btn:hover {
            opacity: 0.8;
            color: lightgreen;
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
            background-color:rgb(43, 110, 22);
            }

            .container {
            padding: 0px;
            }

            body {
                background-image: url("images/cum.jpg");
                background-size: cover;       /* or 'contain', or exact size like '300px 200px' */
                /* background-repeat: no-repeat; avoids tiling
                background-position: center;  centers the image */
                background-color: black;
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

            button.home-tutors {
                background-color: #04AA6D;
            }
      </style>
</head>
<body>  
    <div class="container">
        <div class="form_container">
            <form action="action.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="tutor">
            
            <!-- with sticky fields -->
            <label for="tutor_name">Type your full name: </label>
            <input type="text" id="tutor_name" name="tutor_name" value="<?= htmlspecialchars($old_name) ?>"><br>
            <label for="bio">Tell us a bit about yourself, why do you want to be a tutor? </label><br>
            <textarea id="bio" name="bio" rows="4" cols="55"><?= htmlspecialchars($old_bio) ?></textarea><br>

            <div class="file-wrapper">
                <input type="file" id="upload_file" name="upload_file"><br>
                <div class="custom-file-btn"> Upload Profile Picture </div>
            </div>
            <div class="home-tutors">
            <button type="submit" id="submit" value="Submit">Register as a Tutor</button>  
            <button class="cancelbtn" type="button" onclick="window.location.href='tutors.php'">Back</button>
            <button class="cancelbtn" type="button" onclick="window.location.href='index.php'">Home</button>
            </div>

            <?php if (!empty($errors)): ?>
                <ul style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
                </ul>
                <?php unset($_SESSION['errors'], $_SESSION['old']);?>
            <?php endif; ?>

            </form>
        </div>
    </div>
    

</body>
</html>

