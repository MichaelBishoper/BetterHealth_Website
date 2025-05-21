<!-- Barebones -->

<?php
session_start();
$old_name = $_SESSION['old']['full_name'] ?? '';
$old_bio = $_SESSION['old']['bio'] ?? '';
$error = $_SESSION['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Register</title>
</head>
<body>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="tutor">
        <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>        
        <?php endif; ?>        
        
        <!-- with sticky fields -->
        <label for="full_name">Type your full name: </label>
        <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($old_name) ?>"><br>
        <label for="bio">Tell us a bit about yourself, why do you want to be a tutor? </label><br>
        <textarea id="bio" name="bio" rows="20" cols="40"><?= htmlspecialchars($old_bio) ?></textarea><br>
        <label for="upload_file">Upload your pfp here: </label><br>
        <input type="file" id="upload_file" name="upload_file"><br>
        <button type="submit" id="submit" value="Submit">Register</button>  

    </form>
</body>
</html>

