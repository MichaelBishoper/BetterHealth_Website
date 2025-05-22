<?php
session_start();
require_once 'signup_validate.php';
require_once 'login_validate.php';
require_once 'tutor_validate.php';
require_once 'db.php';
require_once 'accept_tutor_logic.php';
require_once 'reject_tutor_logic.php';

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'signup':
        signup_validate();
        break;

    case 'login':
        login_validate();
        break;

    case 'tutor':
        tutor_validate();
        break;
    
    case 'accept':
        header("Location: accept_tutor_logic.php");
        accept_logic($conn);
        break;

    case 'reject':
        reject_logic();
        break;
    default:
        $_SESSION['errors'] = ["No valid action provided."];
        header("Location: signup.php");
        exit;
}
$conn->close(); 
?>
