<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['tutor_id'] ?? 0;
    $action = $_POST['action'] ?? '';

    if ($id && in_array($action, ['accept', 'reject'])) {
        $status = $action === 'accept' ? 'accepted' : 'rejected';
        $stmt = $conn->prepare("UPDATE tutors SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        $stmt->close();
    }
}

$result = $conn->query("SELECT * FROM tutors WHERE status = 'pending'");
?>
<!DOCTYPE html>
<html>
<head><title>Approve Tutors</title></head>
<body>
    <h1>Pending Tutor Applications</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div style="border:1px solid black; margin:10px; padding:10px;">
            <img src="<?= htmlspecialchars($row['pfp_url']) ?>" width="80"><br>
            <strong><?= htmlspecialchars($row['full_name']) ?></strong><br>
            <em><?= htmlspecialchars($row['bio']) ?></em><br>
            <form method="post" style="margin-top:5px;">
                <input type="hidden" name="tutor_id" value="<?= $row['id'] ?>">
                <button name="action" value="accept">Accept</button>
                <button name="action" value="reject">Reject</button>
            </form>
        </div>
    <?php endwhile; ?>
</body>
</html>