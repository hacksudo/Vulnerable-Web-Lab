<?php include 'auth_check.php'; ?>

<?php
require_once __DIR__ . '/../../jwt.php';

$flag = "flag{none_algo_bypass_success}";
$token = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $payload = ["user" => $username, "isadmin" => false];
    $token = generate_jwt_none($payload);
}

if (isset($_POST['token_submit'])) {
    $submitted_token = $_POST['token'];
    $decoded = verify_jwt_none($submitted_token);
    if ($decoded && isset($decoded['isadmin']) && $decoded['isadmin'] === true) {
        $message = "<p style='color:lightgreen'>✅ Welcome Admin!<br><strong>$flag</strong></p>";
    } else {
        $message = "<p style='color:red'>❌ Invalid token or not admin.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🚫 Lab 2 – None Algorithm</title>
    <style>
        body { background: black; color: #0f0; font-family: monospace; text-align: center; padding: 20px; }
        .navbar { background: #111; padding: 10px; text-align: left; }
        .navbar a { color: #0f0; text-decoration: none; margin-right: 20px; font-weight: bold; }
        .navbar a:hover { color: red; }
        h1 { color: red; animation: flicker 1.5s infinite; }
        .btn { background: red; color: white; padding: 10px 20px; border: none; cursor: pointer; font-weight: bold; }
        input, textarea { background: #000; color: #0f0; border: 1px solid #0f0; padding: 10px; width: 70%; }
        .form-box { background: #111; border: 1px solid #0f0; border-radius: 10px; padding: 20px; margin: 20px auto; width: 80%; }
        .footer { margin-top: 40px; color: gray; }
        a { color: #0f0; }
        a:hover { color: red; }
        @keyframes flicker {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_jwt.php">🏠 JWT Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
<h1>🚫 Lab 2 – 'None' Algorithm Bypass</h1>
<p>This lab lets you forge JWTs using <code>alg: none</code> and bypass signature checks.</p>

<div class="form-box">
    <form method="POST">
        <label>Enter Username (non-admin):</label><br><br>
        <input type="text" name="username" required><br><br>
        <button class="btn" type="submit">🎟️ Get JWT Token</button>
    </form>
</div>

<?php if (!empty($token)): ?>
    <div class="form-box">
        <h3>🎫 Your Token:</h3>
        <textarea rows="4" readonly><?= htmlspecialchars($token) ?></textarea>
    </div>
<?php endif; ?>

<div class="form-box">
    <form method="POST">
        <h3>🛠️ Submit Modified Token:</h3>
        <textarea name="token" rows="4" required></textarea><br><br>
        <button class="btn" name="token_submit" type="submit">🚀 Submit Token</button>
    </form>
</div>

<?php if (!empty($message)): ?>
    <div class="form-box"><?= $message ?></div>
<?php endif; ?>

<div class="footer">
    <p><strong>Learn More:</strong></p>
    <ul>
        <li><a href="https://portswigger.net/web-security/jwt/lab-jwt-alg-none" target="_blank">PortSwigger – None Algorithm</a></li>
        <li><a href="https://jwt.io" target="_blank">JWT.io Debugger</a></li>
    </ul>
</div>

</body>
</html>
