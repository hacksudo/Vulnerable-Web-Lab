<?php include 'auth_check.php'; ?>

<?php
$flag = "flag{open_redirect_success}";
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '';

$isRedirect = false;
$showFlag = false;

if ($redirect) {
    // Simulate open redirect vulnerability
    if (preg_match('/^https?:\/\//i', $redirect)) {
        $isRedirect = true;
        $showFlag = true;
    } else {
        header("Location: $redirect");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 7 - Open Redirect</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        body { text-align: center; }
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
        input[type=text] {
            padding: 10px;
            width: 80%;
            margin: 10px;
            font-size: 16px;
        }
        input[type=submit] {
            padding: 10px 20px;
            font-size: 16px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        a { color: red; text-decoration: none; }
    </style>
</head>
<body>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_web.php">🏠 Web Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
<h1>🚨 Lab 7: Open Redirect</h1>

<div class="form-box">
    <p>Click below to simulate login and redirect to provided site.</p>
    <form method="GET">
        <input type="text" name="redirect" placeholder="https://evil.com or /profile" required>
        <br>
        <input type="submit" value="Login & Redirect">
    </form>

    <?php if ($redirect): ?>
        <p><strong>🧭 Redirecting to: <?= htmlspecialchars($redirect) ?></strong></p>
    <?php endif; ?>

    <?php if ($showFlag): ?>
        <p style="color: #0f0;"><strong>✅ Flag: <?= $flag ?></strong></p>
    <?php endif; ?>
</div>

<div style="margin-top:30px;">
    <a href="/hacksudo_ctf/index.php">← Back to Home</a>
</div>

<footer style="margin-top: 40px; color: gray;">
    <p>References:</p>
    <ul>
        <li><a href="https://portswigger.net/web-security/open-redirection" target="_blank">PortSwigger - Open Redirect</a></li>
        <li><a href="https://owasp.org/www-community/attacks/Unvalidated_Redirects_and_Forwards_Cheat_Sheet" target="_blank">OWASP Guide</a></li>
    </ul>
</footer>

</body>
</html>
