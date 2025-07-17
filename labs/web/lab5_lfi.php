<?php include 'auth_check.php'; ?>
<?php
$flag = "flag{lfi_executed_successfully}";
$base_dir = __DIR__ . '/files/';
$file = isset($_GET['file']) ? $_GET['file'] : 'welcome.txt';
$content = '';
$error = '';

$file_path = realpath($base_dir . $file);

// Prevent directory traversal
if ($file_path && strpos($file_path, $base_dir) === 0 && file_exists($file_path)) {
    $content = file_get_contents($file_path);
} else {
    $error = "File not found or access denied.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 5 - Local File Inclusion</title>
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
            max-height: 250px;
            overflow-y: auto;
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
    
    <h1>📂 Lab 5: Local File Inclusion (LFI)</h1>

    <div class="form-box">
        <p>View a file by entering its name (e.g., <code>welcome.txt</code>)</p>
        <form method="get">
            <input type="text" name="file" placeholder="Enter filename..." required>
            <br>
            <input type="submit" value="View File">
        </form>

        <?php if ($error): ?>
            <p style="color: yellow;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($content): ?>
            <h3>File Content:</h3>
            <pre><?= htmlspecialchars($content) ?></pre>

            <?php if (strpos($content, 'Congratulations') !== false): ?>
                <p><strong>✅ Flag: <?= $flag ?></strong></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div style="margin-top:30px;">
        <a href="/hacksudo_ctf/index.php">← Back to Home</a>
    </div>

    <footer style="margin-top: 40px; color: gray;">
        <p>References:</p>
        <ul>
            <li><a href="https://portswigger.net/web-security/file-path-traversal" target="_blank">PortSwigger - File Inclusion</a></li>
            <li><a href="https://owasp.org/www-community/attacks/Path_Traversal" target="_blank">OWASP LFI Reference</a></li>
        </ul>
    </footer>

</body>
</html>
