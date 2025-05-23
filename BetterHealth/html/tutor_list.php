<?php
require_once 'db.php';
$result = $conn->query("SELECT * FROM tutors");
?>
<!DOCTYPE html>
<html>
<head><title>Tutor List</title></head>
<body>
    <h1>OurTutors</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <img src="<?= htmlspecialchars($row['pfp_url']) ?>" alt="PFP" width="50">
                <strong><?= htmlspecialchars($row['tutor_name']) ?></strong> - <?= htmlspecialchars($row['status']) ?><br>
                <em><?= htmlspecialchars($row['bio']) ?></em>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>