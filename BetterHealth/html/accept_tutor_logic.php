<?php 
function accept_logic() {
    global $conn;
    if (!isset($_POST['tutor_id'])) {
        $_SESSION['errors'][] = "Missing tutor id.";
        var_dump($_SESSION['errors']);
        header("Location: TutorAccept.php");
        exit;
    }

    $tutor_id = $_POST['tutor_id'];
    
    $stmt1 = $conn->prepare("UPDATE tutors SET status = 'accepted' WHERE id = ?");
    $stmt1->bind_param("s", $tutor_id);
    $stmt1->execute();
    $stmt1->close();

    header("Location: TutorAccept.php");
    exit;
}
?>