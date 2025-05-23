<?php 
include 'db.php';
function accept_logic($conn) {

    if (!isset($_POST['tutor_name'])) {
        $_SESSION['errors'][] = "Missing tutor name.";
        header("Location: tutor_approval_page.php");
        exit;
    }

    $tutor_name = $_POST['tutor_name'];

    // Update tutors table
    $stmt1 = $conn->prepare("UPDATE tutors SET status = 'accepted' WHERE tutor_name = ?");
    $stmt1->bind_param("s", $tutor_name);
    $stmt1->execute();

    // Update users table
    $stmt2 = $conn->prepare("UPDATE users SET is_tutor = 1 WHERE username = ?");
    $stmt2->bind_param("s", $tutor_name);
    $stmt2->execute();

    $stmt1->close();
    $stmt2->close();
    $conn->close();

    $_SESSION['success'] = "Tutor approved successfully.";
    header("Location: tutor_approval_page.php");
    exit;
}
?>