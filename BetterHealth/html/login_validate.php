<?php
session_start();
require_once 'db.php';

function login_validate() {
    $conn = $GLOBALS['conn'];
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $errors = [];

    if (empty($username)) $errors[] = "Username is required.";
    if (empty($password)) $errors[] = "Password is required.";

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: login.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE username = ?");
    if (!$stmt) {
        $_SESSION['errors'] = ["Database error: " . $conn->error];
        header("Location: login.php");
        exit;
    }

    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        $_SESSION['errors'] = ["Database error: " . $stmt->error];
        header("Location: login.php");
        exit;
    }

    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            // Debug session
            error_log("Login successful for: ".$user['username']);
            
            // Set all session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];
            
            // Verify session before redirect
            if (isset($_SESSION['user_id'])) {
                if ($_SESSION['is_admin'] == 1) {
                    header("Location: create_article.php");
                } else {
                    header("Location: dashboard.php");
                }
                exit;
            } else {
                error_log("Session not set properly!");
                $_SESSION['errors'] = ["Session error"];
                header("Location: login.php");
                exit;
            }
        } else {
            $errors[] = "Invalid password.";
        }
    } else {
        $errors[] = "Username not found.";
    }
    

    $stmt->close();
    $conn->close();

    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit;
}


?>