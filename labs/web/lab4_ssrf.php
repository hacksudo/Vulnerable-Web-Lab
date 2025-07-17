<?php include 'auth_check.php'; ?>
<?php
$flag = "flag{ssrf_exploited_successfully}";
$response = "";
$error = "";

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    // Basic SSRF simulation without validation
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $response = @file_get_contents($url);
    } else {
        $error = "Invalid URL";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 4 - SSRF</title>
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
        pre {
            background: black;
            padding: 10px;
            color: lime;
            max-height: 200px;
            overflow-y: auto;
        }
        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_web.php">🏠 Web Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
   
    <h1>🛰️ Lab 4: SSRF - Server-Side Request Forgery</h1>

    <div class="form-box">
        <p>Enter a URL to fetch (Hint: try internal services like <code>http://localhost</code>)</p>
        <form method="get">
            <input type="text" name="url" placeholder="http://127.0.0.1" required>
            <br>
            <input type="submit" value="Fetch URL">
        </form>

        <?php if ($error): ?>
            <p style="color: yellow;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($response): ?>
            <h3>Response:</h3>
            <pre><?= htmlspecialchars($response) ?></pre>
            <p><strong>✅ Flag: <?= $flag ?></strong></p>
        <?php endif; ?>
    </div>

    <div style="margin-top:30px;">
        <a href="/hacksudo_ctf/index.php">← Back to Home</a>
    </div>

    <footer style="margin-top: 40px; color: gray;">
        <p>References:</p>
        <ul>
            <li><a href="https://portswigger.net/web-security/ssrf" target="_blank">PortSwigger - SSRF Guide</a></li>
            <li><a href="https://owasp.org/www-community/attacks/Server_Side_Request_Forgery" target="_blank">OWASP SSRF Reference</a></li>
        </ul>
    </footer>

</body>
</html>
