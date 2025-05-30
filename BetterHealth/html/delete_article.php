<?php
// Start the session to track the admin user
session_start();

// Start DB connection
require_once 'db.php';
$conn = $GLOBALS['conn'];

// Check if user is logged in as admin
if ((!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) && (!isset($_SESSION['is_tutor']) || $_SESSION['is_tutor'] !== 1)) {
    header("Location: login.php"); // Redirect to login if not admin
    exit;
}

// Check if article ID is provided in the URL
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // SQL delete query
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $articleId);
    $stmt->execute();
    $stmt->close();

    // Redirect to the article gallery page after deleting the article
    header("Location: article_gallery.php");
    exit;
}
?>