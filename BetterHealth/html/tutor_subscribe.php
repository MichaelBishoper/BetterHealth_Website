<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$tutor_id = intval($_POST['tutor_id']); // Always sanitize input

if (!isset($_POST['tutor_id'])) {
    echo "No tutor ID provided.";
    exit;
}

// sanitize get input



if (!isset($_SESSION['user_id']) || !isset($_POST['tutor_id'])) {
    // header("Location: index.php");
    var_dump($tutor_id);
    exit;
}

var_dump($tutor_id);


// Checking if already subbed
$stmt = $conn->prepare("SELECT * FROM tutor_subscribe WHERE user_id = ? AND tutor_id = ?");
$stmt->bind_param("ii", $user_id, $tutor_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // if not Yet sucsribed, subscribe
    $stmt = $conn->prepare("INSERT INTO tutor_subscribe (user_id, tutor_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $tutor_id);
    $stmt->execute();
} else {
    // Toggle between subscribed and unsubscribe
    $stmt = $conn->prepare("DELETE FROM tutor_subscribe WHERE user_id = ? AND tutor_id = ?");
    $stmt->bind_param("ii", $user_id, $tutor_id);
    $stmt->execute();
}

$stmt->close();
header("Location: tutor_profile.php?id=" . $tutor_id);
exit;

