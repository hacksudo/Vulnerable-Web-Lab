<?php include 'auth_check.php'; ?>

<?php
$flag = "flag{os_command_injection_success}";
$showFlag = false;
$output = "";

if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];

    // 🚨 Vulnerable system() usage (no input sanitization)
    $cmd = "ping -c 1 " . $ip;
    $output = shell_exec($cmd);

    // If user injects and successfully runs `; echo FLAG`, display flag
    if (strpos($output, "flag{") !== false) {
        $showFlag = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 8 - OS Command Injection</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        .lab-container {
            background-color: #111;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #0f0;
            width: 60%;
            margin: 30px auto;
            color: #0f0;
            font-family: monospace;
        }
        input[type=text] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type=submit] {
            background-color: red;
            color: white;
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            margin-top: 10px;
            cursor: pointer;
        }
        a { color: red; text-decoration: none; }
        pre { background: #000; padding: 10px; color: #0f0; }
    </style>
</head>
<body><center>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_web.php">🏠 Web Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
    <h1 style="text-align:center; color:red;">🚨 Lab 8: OS Command Injection</h1>

    <div class="lab-container">
        <p>Ping any IP address. Try injecting OS commands like <code>; echo <?php echo $flag; ?></code></p>
        <form method="POST">
            <input type="text" name="ip" placeholder="127.0.0.1 or 127.0.0.1; echo flag{...}">
            <br>
            <input type="submit" value="Ping IP">
        </form>

        <?php if ($output): ?>
            <h3>🔍 Output:</h3>
            <pre><?= htmlspecialchars($output) ?></pre>
        <?php endif; ?>

        <?php if ($showFlag): ?>
            <p style="color:#0f0; margin-top:20px;">✅ Flag: <strong><?= $flag ?></strong></p>
        <?php endif; ?>
    </div>

    <div style="text-align:center;">
        <a href="/hacksudo_ctf/index.php">← Back to Home</a>
    </div>

    <footer style="text-align:center; margin-top:40px; color:gray;">
        <p>References:</p>
        <ul style="list-style:none;">
            <li><a href="https://portswigger.net/web-security/os-command-injection" target="_blank">PortSwigger - OS Command Injection</a></li>
            <li><a href="https://owasp.org/www-community/attacks/Command_Injection" target="_blank">OWASP - Command Injection</a></li>
        </ul>
    </footer>
</center></body>
</html>
