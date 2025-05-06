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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style> 
  form{
            display: flex;
            flex-direction: column;
            gap: 7px;
            max-width: 300px;
        }
  </style>

</head>



<body>

<?php if (!empty($success)): ?>
  <p style="color: green;"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

  <form method="post" action="action.php">
  <input type="hidden" name="action" value="login">
    <label for="username"> Username </label>
    <input name="username" id="username" type="text" required>

    <label for="password"> Password </label>
    <input name="password" id="password" type="password" required>
    
    <input type="submit" value="Submit">
  </form>
  <button type="button" onclick="window.location.href='login.php'">Go to Login</button>
  <button type="button" onclick="window.location.href='index.php'">Go to home</button>
</body>
</html>