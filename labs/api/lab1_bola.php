<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{broken_object_level_auth_001}";
$user_data = [
    101 => ["name" => "Alice", "email" => "alice@hacksudo.com"],
    102 => ["name" => "Bob", "email" => "bob@hacksudo.com"],
    103 => ["name" => "Charlie", "email" => "charlie@hacksudo.com"]
];

// Simulate authenticated user with ID 101
$logged_in_user_id = 101;

// API logic
if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);
    $user = $user_data[$user_id] ?? null;
    if ($user) {
        $is_own_data = ($user_id === $logged_in_user_id);
        $unauthorized_access = !$is_own_data;
    } else {
        $error = "User not found.";
    }
} else {
    $user = null;
    $error = "Missing user_id parameter.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>API Lab 1 - BOLA</title>
  <style>
    body { background-color: black; color: #0f0; font-family: monospace; padding: 30px; text-align: center; }
    h1 { color: red; }
    .box {
        border: 2px solid #0f0;
        padding: 20px;
        width: 50%;
        margin: 20px auto;
        background: #111;
        border-radius: 10px;
    }
    .back {
        display: inline-block;
        margin-top: 20px;
        padding: 8px 20px;
        background: red;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    .flag {
        margin-top: 20px;
        color: yellow;
        font-size: 18px;
        background: #222;
        padding: 10px;
        border-radius: 5px;
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
    
<h1>🧪 API Lab 1 - Broken Object Level Authorization</h1>

<div class="box">
    <p><b>Scenario:</b> Authenticated user can fetch their profile using:</p>
    <code>/lab1_bola.php?user_id=101</code><br><br>
    <p>Try to access another user's profile like <code>?user_id=102</code></p>
</div>

<?php if (isset($error)): ?>
    <div class="box" style="color: red;"><?php echo htmlentities($error); ?></div>
<?php elseif ($user): ?>
    <div class="box">
        <p><b>Name:</b> <?php echo htmlentities($user['name']); ?></p>
        <p><b>Email:</b> <?php echo htmlentities($user['email']); ?></p>
        <?php if (isset($unauthorized_access) && $unauthorized_access): ?>
            <div class="flag">🎉 Congrats! You found the flag: <strong><?php echo $flag; ?></strong></div>
        <?php else: ?>
            <p>✅ You are viewing your own profile.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<a href="../../index1.php" class="back">⬅️ Back to Home</a>

<div class="links">
    <p>📚 References:</p>
    <a href="https://portswigger.net/web-security/access-control/idor" target="_blank">PortSwigger: IDOR (BOLA)</a><br>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa1-broken-object-level-authorization/" target="_blank">OWASP API Top 10: BOLA</a>
</div>

</body>
</html>
