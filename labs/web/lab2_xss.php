<?php include 'auth_check.php'; ?>

<?php
session_start();
$solved = false;
$flag = "flag{reflected_xss_vulnerability_found}";
$flag_submitted = false;
$correct_flag = false;

$search = $_GET['search'] ?? '';

if (isset($_GET['xss']) && $search !== '') {
    if (strpos($search, '<script>') !== false) {
        $solved = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flag_submit'])) {
    $flag_submitted = true;
    if (trim($_POST['flag_value']) === $flag) {
        $correct_flag = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Lab 2 – Reflected XSS</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        body {
            background-color: black;
            color: #00ff00;
            font-family: monospace;
            text-align: center;
        }

        .lab-container {
            background-color: #111;
            border: 1px solid #0f0;
            padding: 20px;
            width: 60%;
            margin: 30px auto;
            border-radius: 10px;
        }

        input {
            background: #000;
            color: #0f0;
            border: 1px solid #0f0;
            padding: 8px;
            width: 90%;
            margin: 8px auto;
        }

        .btn {
            background: red;
            color: white;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .success {
            color: #0f0;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .output {
            margin-top: 15px;
            border: 1px dashed #0f0;
            padding: 10px;
            background: #000;
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
    
<h1 style="color:red;">💉 Web Lab 2: Reflected XSS</h1>

<div class="lab-container">
    <p><strong>Challenge:</strong> Discover a reflected XSS vulnerability via the search box.</p>

    <form method="GET">
        <input type="text" name="search" placeholder="Search here..." required>
        <input type="hidden" name="xss" value="1">
        <br>
        <input class="btn" type="submit" value="Search">
    </form>

    <?php if ($search): ?>
        <div class="output">
            <p>You searched for: <?= $search ?></p>
        </div>
    <?php endif; ?>

    <?php if ($solved): ?>
        <p class="success">✅ XSS Executed Successfully!</p>
        <p class="success">🏁 Your Flag: <code><?= $flag ?></code></p>
    <?php endif; ?>
</div>

<?php if ($solved): ?>
    <div class="lab-container">
        <form method="POST">
            <input type="text" name="flag_value" placeholder="Enter flag to mark as solved" required><br>
            <input class="btn" type="submit" name="flag_submit" value="Submit Flag">
        </form>

        <?php if ($flag_submitted): ?>
            <?php if ($correct_flag): ?>
                <p class="success">🎉 Correct flag submitted! Lab marked as solved.</p>
            <?php else: ?>
                <p class="error">🚫 Incorrect flag.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="lab-container">
    <p><strong>🔗 References:</strong></p>
    <a href="https://portswigger.net/web-security/cross-site-scripting/reflected" target="_blank">PortSwigger - Reflected XSS</a><br>
    <a href="https://owasp.org/www-community/attacks/xss/" target="_blank">OWASP - XSS Overview</a>
</div>

<br><a class="btn" href="../../dashboard.php">⬅️ Back to Dashboard</a>
</body>
</html>
