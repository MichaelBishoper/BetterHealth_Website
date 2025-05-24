<?php
session_start();
require 'db.php'; 

if (!isset($_SESSION['user_id'])) { // if not logined redirect to login page
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT status FROM tutors WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($status);

$statusMessage = "No tutor application found.";


if ($stmt->fetch()) {
    $statusMessage = "Your tutor application status is: <strong>$status</strong>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Waiting List</title>
</head>
<body>
    <h2><?php echo $statusMessage; ?></h2>
</body>
</html>

