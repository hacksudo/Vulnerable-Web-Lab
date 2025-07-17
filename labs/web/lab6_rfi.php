<?php include 'auth_check.php'; ?>

<?php
$flag = "flag{rfi_executed_successfully}";
$showFlag = false;

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Simulate RFI vulnerability
    if (filter_var($page, FILTER_VALIDATE_URL)) {
        try {
            include($page);
            $showFlag = true;
        } catch (Exception $e) {
            echo "<p>Error including file.</p>";
        }
    } else {
        echo "<p style='color:red;'>❌ Only remote URLs allowed.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 6 - Remote File Inclusion</title>
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
            width: 80%;
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
    </style>
</head>
<body><center>
<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_web.php">🏠 Web Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    
    <h1 style="text-align:center; color:red;">🔥 Lab 6: Remote File Inclusion</h1>

    <div class="lab-container">
        <p>Use the <code>?page=</code> parameter to include a remote PHP file.</p>
        <form method="GET">
            <input type="text" name="page" placeholder="http://evil.com/shell.txt">
            <br>
            <input type="submit" value="Include File">
        </form>

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
            <li><a href="https://portswigger.net/web-security/file-path-traversal/exploiting/lfi-rfi" target="_blank">PortSwigger - RFI</a></li>
            <li><a href="https://owasp.org/www-community/vulnerabilities/Remote_File_Inclusion" target="_blank">OWASP - RFI Overview</a></li>
        </ul>
    </footer>
</center></body>
</html>
