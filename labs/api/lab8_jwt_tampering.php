<?php include 'auth_check.php'; ?>

<?php
require_once "../../jwt.php";
$flag = "flag{api_jwt_tampering_with_password_secret}";

$secret = "password"; // updated secret key

function create_jwt_token($username) {
    global $secret;
    $payload = [
        "user" => $username,
        "is_admin" => false,
        "iat" => time()
    ];
    return generate_jwt($payload, $secret);
}

// Token Generation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $token = create_jwt_token($username);
    echo "<div style='margin-top:20px;color:#0f0;'>🎫 Your JWT Token:<br><textarea rows='4' cols='80'>$token</textarea></div>";
    echo "<div style='margin-top:20px;'><form method='POST'><input type='hidden' name='tokencheck' value='1'><input type='text' name='jwt' placeholder='Paste your token here' style='width:60%;padding:8px;background:#222;color:#0f0;border:1px solid green;'> <button type='submit'>🔐 Submit Token</button></form></div>";
}

// Token Validation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tokencheck']) && isset($_POST['jwt'])) {
    $jwt = $_POST['jwt'];
    $data = verify_jwt_hs256($jwt, $secret);
    if ($data && isset($data['is_admin']) && $data['is_admin'] == true) {
        echo "<div style='color:yellow;background:black;padding:10px;margin-top:10px'>✅ Admin Access Granted!<br>🎯 Flag: $flag</div>";
    } else {
        echo "<div style='color:red;margin-top:10px'>❌ Invalid or insufficient privileges in token.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>API Lab 8 - JWT Tampering</title>
    <style>
        body { background: black; color: #0f0; font-family: monospace; text-align: center; padding: 20px; }
        h1 { color: red; }
        input[type=text], textarea { padding: 8px; font-size: 16px; background: #222; border: 1px solid #0f0; color: #0f0; width: 60%; }
        button { padding: 10px 20px; background: red; color: white; font-weight: bold; border: none; cursor: pointer; }
        button:hover { background: darkred; }
        .box { background: #111; padding: 20px; border-radius: 10px; border: 1px solid #0f0; width: 80%; margin: auto; }
        .nav a { color: #0f0; margin: 0 10px; text-decoration: none; }
        .nav a:hover { color: red; }
    </style>
</head>
<body>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_api.php">🏠 API Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
<h1>🔐 API Lab 8 - JWT Tampering</h1>
<p>Generate a token as a regular user and try to tamper it to gain admin privileges.</p>

<div class="box">
    <form method="POST">
        <input type="text" name="username" placeholder="Enter your username" required><br><br>
        <button type="submit">🎫 Get JWT</button>
    </form>
</div>

<div style="margin-top: 30px;" class="nav">
    <a href="https://portswigger.net/web-security/jwt" target="_blank">JWT PortSwigger</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa2-broken-authentication/" target="_blank">OWASP API A2</a>
</div>

</body>
</html>
