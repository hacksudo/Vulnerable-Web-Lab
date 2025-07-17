<?php include 'auth_check.php'; ?>
<?php
session_start();
$message = "";
$flag = "flag{csrf_bypass_success}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate CSRF vulnerable action (changing user email without auth)
    if (isset($_POST['email'])) {
        $message = "Email changed to: " . htmlspecialchars($_POST['email']) . "<br><strong>Flag: $flag</strong>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 - CSRF</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        .form-box {
            margin-top: 30px;
            background: #111;
            padding: 20px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #0f0;
            border-radius: 10px;
            color: #0f0;
        }
        input[type=email], input[type=submit] {
            padding: 8px;
            width: 80%;
            margin: 10px;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            color: yellow;
        }
    </style>
</head>
<body><center>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_web.php">🏠 Web Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
    <h1>🌐 Lab 3: CSRF Vulnerability</h1>
    <div class="form-box">
        <p>This lab simulates a profile email update that is vulnerable to CSRF.</p>
        <form method="POST" action="">
            <label>New Email Address:</label><br>
            <input type="email" name="email" required><br>
            <input type="submit" value="Update Email">
        </form>
        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>
    </div>

    <div style="margin-top:30px;">
        <a href="/hacksudo_ctf/index.php" style="color:red;text-decoration:none;">← Back to Home</a>
    </div>

    <footer style="margin-top: 40px; color: gray;">
        <p>References:</p>
        <ul>
            <li><a href="https://portswigger.net/web-security/csrf" target="_blank">PortSwigger - CSRF Overview</a></li>
            <li><a href="https://owasp.org/www-community/attacks/csrf" target="_blank">OWASP CSRF Guide</a></li>
        </ul>
    </footer>
</center></body>
</html>
