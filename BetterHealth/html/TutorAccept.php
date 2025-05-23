<?php
require_once 'db.php';
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
            <strong><?= htmlspecialchars($row['tutor_name']) ?></strong><br>
            <em><?= htmlspecialchars($row['bio']) ?></em><br>
            <form method="post"action="action.php" style="margin-top:5px;">
                <input type="hidden" name="tutor_id" value="<?= $row['id'] ?>">
                <button name="action" value="accept">Accept</button>
                <button name="action" value="reject">Reject</button>
            </form>
        </div>
    <?php endwhile; ?>
</body>
</html>