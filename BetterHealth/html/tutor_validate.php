<?php
function tutor_validate() {
    // Save input data so form fields can be pre-filled after redirect
    $_SESSION['old'] = $_POST;

    $full_name = trim($_POST['full_name'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $file = $_FILES['upload_file'] ?? null;

    if (empty($full_name) || empty($bio) || !$file || $file['error'] !== 0) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: TutorRegistration.php");
        exit;
    }

    // If valid, save to DB or do the next step
    // ...
    // Clear old inputs after successful submission
    unset($_SESSION['old'], $_SESSION['error']);

    // Redirect or show success
    echo "Success!";
}
