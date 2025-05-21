<?php
    function signup_validate() {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
    
        $errors = [];
    
        // Validation
        if (empty($username)) $errors[] = "Username is required.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters.";
        }
    
        // Check for duplicate username or email
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $errors[] = "Username or email already exists.";
        }
        $stmt->close();
    
        // If errors, redirect back with old data
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = [
                'username' => $username,
                'email' => $email,
            ];
            header("Location: signup.php");
            exit;
        }
    
        // Hash password and insert
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
    
        if ($stmt->execute()) {
            $_SESSION['success'] = "Signup successful! You can now log in.";
        } else {
            $_SESSION['errors'] = ["Database error: " . $stmt->error];
        }
    
        $stmt->close();
        header("Location: login.php");
        exit;
    }
    


