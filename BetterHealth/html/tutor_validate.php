<?php
function tutor_validate() {
    global $conn;
    $errors = [];

    $tutor_name = trim($_POST['tutor_name'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $file = $_FILES['upload_file'] ?? null;

    if (empty($tutor_name) || empty($bio) || !$file || $file['error'] !== 0) {
        $errors[] = "All fields are required!";
    }

    $stmt = $conn->prepare("SELECT id FROM tutors WHERE tutor_name = ?");
    $stmt->bind_param("s", $tutor_name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $errors[] = "A tutor with this name already exists!";
    }
    $stmt->close();

    //check if file is uploaded succesfully
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $filename = uniqid() . "_" . basename($file['name']);
    $targetPath = "uploads/" . $filename;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        $errors[] = "No image uploaded or failed!";
    }

    if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: TutorRegistration.php");
    exit;
    }

        // Get current logged-in user's ID from session
    if (!isset($_SESSION['user_id'])) {
        $errors[] = "You must be logged in to register as a tutor.";
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: TutorRegistration.php");
        exit;
    }
    $user_id = $_SESSION['user_id'];

    // insert into tutors table and await admin approval
    $stmt = $conn->prepare("INSERT INTO tutors (tutor_name, bio, pfp_url, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $tutor_name, $bio, $targetPath, $user_id); //assign id of user to the tutor request
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['old'], $_SESSION['error']);
    header("Location: WaitingList.php");
}