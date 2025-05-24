<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['article_id'])) {
    header("Location: articles.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$article_id = $_POST['article_id'];

// Checking if Guide is liked already
$stmt = $conn->prepare("SELECT * FROM article_likes WHERE user_id = ? AND article_id = ?");
$stmt->bind_param("ii", $user_id, $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Kalau belum di like, kasih like
    $stmt = $conn->prepare("INSERT INTO article_likes (user_id, article_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $article_id);
    $stmt->execute();
} else {
    // Toggle between unlike and like
    $stmt = $conn->prepare("DELETE FROM article_likes WHERE user_id = ? AND article_id = ?");
    $stmt->bind_param("ii", $user_id, $article_id);
    $stmt->execute();
}

$stmt->close();
header("Location: guides.php"); 
exit;
