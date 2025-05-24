<?php
require_once 'db.php';
global $conn;

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
//check
$stmt = $conn->prepare("SELECT status FROM tutors WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($status);
$stmt->fetch();
$stmt->close();
//kick
if ($status === 'pending' || $status === 'accepted') {
    header("Location: index.php");
    exit;
}

$conn->close();
?>
