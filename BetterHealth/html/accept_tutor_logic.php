<?php 
include 'db.php';
function accept_logic($conn) {

    if (!isset($_POST['full_name'])) {
        $_SESSION['errors'][] = "Missing tutor name.";
        header("Location: tutor_approval_page.php");
        exit;
    }

    $full_name = $_POST['full_name'];

    // Update tutors table
    $stmt1 = $conn->prepare("UPDATE tutors SET status = 'accepted' WHERE full_name = ?");
    $stmt1->bind_param("s", $full_name);
    $stmt1->execute();

    // Update users table
    $stmt2 = $conn->prepare("UPDATE users SET is_tutor = 1 WHERE username = ?");
    $stmt2->bind_param("s", $full_name);
    $stmt2->execute();

    $stmt1->close();
    $stmt2->close();
    $conn->close();

    $_SESSION['success'] = "Tutor approved successfully.";
    header("Location: tutor_approval_page.php");
    exit;
}
?>