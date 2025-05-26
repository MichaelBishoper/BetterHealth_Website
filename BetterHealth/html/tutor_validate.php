<?php
session_start();
function tutor_validate() {
    global $conn;
    $errors = [];
    
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        header("Location: index.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT status FROM tutors WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($status);
    $stmt->fetch();
    $stmt->close();

    if ($status === 'rejected') {
        // Delete the old rejected request
        $delete = $conn->prepare("DELETE FROM tutors WHERE user_id = ?");
        $delete->bind_param("i", $user_id);
        $delete->execute();
        $delete->close();
    } elseif ($status === 'pending' || $status === 'accepted') {
        header("Location: index.php");
        exit;
    }

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

    // Create folder called uploads and stores images there
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
    $stmt = $conn->prepare("INSERT INTO tutors (tutor_name, bio, pfp_url, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $tutor_name, $bio, $targetPath, $user_id); //assign id of user to the tutor request
    $stmt->execute();
    $stmt->close();

    unset($_SESSION['old'], $_SESSION['error']);
    header("Location: WaitingList.php");
}