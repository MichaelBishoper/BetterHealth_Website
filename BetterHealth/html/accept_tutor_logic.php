<?php 
function accept_logic() {
    global $conn;
    if (!isset($_POST['tutor_id'])) {
        $_SESSION['errors'][] = "Missing tutor id.";
        var_dump($_SESSION['errors']);
        header("Location: TutorAccept.php");
        exit;
    }

    // local varibale for tutor_id
    $tutor_id = $_POST['tutor_id'];
    
    // Updates status to accepted
    $stmt1 = $conn->prepare("UPDATE tutors SET status = 'accepted' WHERE id = ?");
    $stmt1->bind_param("s", $tutor_id);
    $stmt1->execute();
    $stmt1->close();

    // Gets the user_id from the users table for this tutor_id 
    $stmt2 = $conn->prepare("SELECT user_id FROM tutors WHERE id = ?");
    $stmt2->bind_param("i", $tutor_id);
    $stmt2->execute();
    $stmt2->bind_result($user_id);
    $stmt2->fetch();
    $stmt2->close();

    // Updates is_tutor based on User ID
    if ($user_id) {
        $stmt3 = $conn->prepare("UPDATE users SET is_tutor = 1 WHERE id = ?");
        $stmt3->bind_param("i", $user_id);
        $stmt3->execute();
        // updates is_tutor to 1 for session conditional stuff
        var_dump($_SESSION['is_tutor']);
        $_SESSION['is_tutor'] = 1;
        $stmt3->close();
    } else {
        $_SESSION['errors'][] = "User ID not found for this tutor.";
    }
    
    

    header("Location: TutorAccept.php");
    exit;
}
?>