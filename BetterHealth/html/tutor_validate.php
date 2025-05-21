<?php
function tutor_validate() {
    global $conn;
    $errors = [];

    $full_name = trim($_POST['full_name'] ?? '');
    $bio = trim($_POST['bio'] ?? '');
    $file = $_FILES['upload_file'] ?? null;

    if (empty($full_name) || empty($bio) || !$file || $file['error'] !== 0) {
        $errors[] = "All fields are required!";
    }

    $stmt = $conn->prepare("SELECT id FROM tutors WHERE full_name = ?");
    $stmt->bind_param("s", $full_name);
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
    // insert into tutors table and await admin approval
    $stmt = $conn->prepare("INSERT INTO tutors (full_name, bio, pfp_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $bio, $targetPath);
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['old'], $_SESSION['error']);
    echo "Success!";
}