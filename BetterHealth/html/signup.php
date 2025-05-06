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
  <title>Signup</title>
  <style>
    form { display: flex; flex-direction: column; gap: 7px; max-width: 300px; }
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

  <form action="action.php" method="post">
    <input type="hidden" name="action" value="signup">  <!--This is the key that will let action now which case to use -->

    <label for="username">Enter Your Username:</label>
    <input name="username" type="text" id="username" required value="<?= htmlspecialchars($username) ?>">

    <label for="password">Enter a Password:</label>
    <input name="password" type="password" id="password" required minlength="8">
    <small style="color: gray;">Password must be at least 8 characters long.</small>

    <label for="email">Email:</label>
    <input name="email" type="email" id="email" required value="<?= htmlspecialchars($email) ?>">

    <input type="submit" id="submit" value="Submit">
  </form>
  <button type="button" onclick="window.location.href='login.php'">Go to Login</button>
  <button type="button" onclick="window.location.href='index.php'">Go to home</button>
  
</body>
</html>

