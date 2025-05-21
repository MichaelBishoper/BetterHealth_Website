<?php
function tutor_validate() {
    $_SESSION['old'] = $_POST;

    $full_name = trim($_POST['full_name'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $file = $_FILES['upload_file'] ?? null;

    if (empty($full_name) || empty($bio) || !$file || $file['error'] !== 0) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: TutorRegistration.php");
        exit;
    }

    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $filename = uniqid() . "_" . basename($file['name']);
    $targetPath = "uploads/" . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        $_SESSION['error'] = "Upload failed!";
        header("Location: TutorRegistration.php");
        exit;
    }

    global $conn;
    $stmt = $conn->prepare("INSERT INTO tutors (full_name, bio, pfp_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $bio, $targetPath);
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['old'], $_SESSION['error']);
    echo "Success!";
}