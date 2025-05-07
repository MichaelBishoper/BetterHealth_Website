<?php
session_start();
require_once 'db.php';
$conn = $GLOBALS['conn'];

// Only allow admin users to delete
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php");
    exit;
}

// Check if ID is passed and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Optional: prevent deleting self or other admins
    if ($userId == $_SESSION['user_id']) {
        $_SESSION['errors'][] = "You cannot delete your own account.";
        header("Location: user_list.php");
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();
}

header("Location: user_list.php");
exit;