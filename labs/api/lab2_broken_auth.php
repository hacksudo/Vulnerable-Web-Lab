<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{broken_api_auth_bypass_002}";

// Dummy user database
$users = [
    'admin' => 'supersecure123',
    'tempuser' => 'password'
];

// Bypass vulnerable check
function vulnerable_login($username, $password) {
    global $users;
    return isset($users[$username]); // ❌ password is NOT checked
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (vulnerable_login($username, $password)) {
        $message = "<div class='flag'>🎉 Welcome $username! Flag: <strong>$flag</strong></div>";
    } else {
        $message = "<p style='color:red;'>❌ Login failed. Try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>API Lab 2 - Broken Authentication</title>
  <style>
    body { background-color: black; color: #0f0; font-family: monospace; text-align: center; padding: 30px; }
    h1 { color: red; }
    form { background: #111; padding: 20px; width: 300px; margin: auto; border: 1px solid #0f0; border-radius: 8px; }
    input[type="text"], input[type="password"] {
        width: 90%;
        padding: 8px;
        margin: 10px 0;
        background: #000;
        color: #0f0;
        border: 1px solid #0f0;
    }
    input[type="submit"] {
        background: red;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
    .nav {
        background-color: #111;
        padding: 10px;
        margin-bottom: 30px;
        border-bottom: 2px solid red;
    }
    .nav a {
        color: #0f0;
        margin: 0 15px;
        text-decoration: none;
        font-weight: bold;
    }
    .nav a:hover {
        color: red;
    }
    .flag {
        margin-top: 20px;
        color: yellow;
        font-size: 18px;
        background: #222;
        padding: 10px;
        border-radius: 5px;
    }
    .links {
        margin-top: 30px;
        font-size: 14px;
    }
    .links a {
        color: #0f0;
        text-decoration: underline;
    }
  </style>
</head>
<body>
 <div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_api.php">🏠 API Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
<h1>🔐 API Lab 2 - Broken Authentication</h1>

<p>💡 <i>Try to login as <b>admin</b> with any password</i></p>

<form method="post">
    <input type="text" name="username" placeholder="Username (e.g., admin)" required><br>
    <input type="password" name="password" placeholder="Password (try anything)" required><br>
    <input type="submit" value="Login">
</form>

<?= $message ?>

<a href="../../index.php" class="nav">⬅️ Back to Home</a>

<div class="links">
    <p>📚 References:</p>
    <a href="https://portswigger.net/web-security/authentication" target="_blank">PortSwigger: Authentication</a><br>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa2-broken-authentication/" target="_blank">OWASP API Top 10: Broken Auth</a>
</div>

</body>
</html>
