<?php include 'auth_check.php'; ?>

<?php
require_once __DIR__ . '/../../jwt.php';

$flag = "flag{jwk_kid_confusion_attack}";
$token = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $payload = ["user" => $_POST['username'], "isadmin" => false];
    $header = [
        "typ" => "JWT",
        "alg" => "RS256",
        "jwk" => [
            "kty" => "RSA",
            "n" => base64url_encode(random_bytes(64)),
            "e" => base64url_encode("\x01\x00\x01")
        ]
    ];
    $segments = [
        base64url_encode(json_encode($header)),
        base64url_encode(json_encode($payload))
    ];
    $signature = base64url_encode("signature-not-needed");
    $token = implode('.', $segments) . "." . $signature;
}

if (isset($_POST['token_submit'])) {
    $token = $_POST['token'];
    $parts = explode('.', $token);
    $header = json_decode(base64url_decode($parts[0]), true);
    $payload = json_decode(base64url_decode($parts[1]), true);

    if (isset($header['jwk']) && isset($payload['isadmin']) && $payload['isadmin'] === true) {
        $message = "✅ Admin access! Flag: <strong>$flag</strong>";
    } else {
        $message = "❌ Token rejected or not admin.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 7 – JWK kid Confusion</title>
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
<h1>🧩 Lab 7 – JWK kid Confusion</h1>
<p>Some JWT libraries allow JWK injection. Try forging a token with a crafted JWK to escalate privileges.</p>

<div class="form-box">
    <form method="POST">
        <label>Enter Username:</label><br><br>
        <input type="text" name="username" required><br><br>
        <button class="btn" type="submit">🎟️ Generate Token</button>
    </form>
</div>

<?php if (!empty($token)): ?>
    <div class="form-box">
        <h3>Your JWT Token:</h3>
        <textarea rows="4" readonly><?= htmlspecialchars($token) ?></textarea>
    </div>
<?php endif; ?>

<div class="form-box">
    <form method="POST">
        <h3>Submit Modified Token:</h3>
        <textarea name="token" rows="4" required></textarea><br><br>
        <button class="btn" name="token_submit">🚀 Submit</button>
    </form>
</div>

<?php if (!empty($message)): ?>
    <div class="form-box"><?= $message ?></div>
<?php endif; ?>

<div class="footer">
    <p>Read more:
        <a href="https://portswigger.net/web-security/jwt" target="_blank">
            PortSwigger – JWK Injection
        </a>
    </p>
</div>

</body>
</html>
