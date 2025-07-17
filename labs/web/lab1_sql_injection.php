<?php include 'auth_check.php'; ?>
<?php
session_start();
$flag = "flag{classic_sql_injection_login_bypass}";
$solved = false;
$flag_submitted = false;
$correct_flag = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simulated vulnerable SQL logic (do not use in production!)
    if ($username === "admin' -- " || $username === "' OR 1=1 -- ") {
        $solved = true;
    }

    if (isset($_POST['flag_submit'])) {
        $flag_submitted = true;
        $user_flag = trim($_POST['flag_value'] ?? '');
        if ($user_flag === $flag) {
            $correct_flag = true;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Lab 1 – SQL Injection</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        body {
            background: black;
            color: #00ff00;
            font-family: monospace;
            text-align: center;
        }

        .lab-container {
            background-color: #111;
            border: 1px solid #0f0;
            width: 500px;
            padding: 20px;
            margin: 40px auto;
            border-radius: 10px;
        }

        input, textarea {
            background: #000;
            color: #0f0;
            border: 1px solid #0f0;
            padding: 8px;
            width: 90%;
            margin: 5px auto;
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

        a {
            color: #0f0;
        }

        .references {
            margin-top: 30px;
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
    
<h1 style="color:red;">🛡️ Web Lab 1: SQL Injection</h1>

<div class="lab-container">
    <p><strong>Challenge:</strong> Bypass login by exploiting SQL injection.<br>Try to login as <code>admin</code>.</p>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <input class="btn" type="submit" value="Login">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $solved): ?>
        <p class="success">✅ SQL Injection successful! You are admin!</p>
        <p class="success">🏁 Your flag is: <code><?= $flag ?></code></p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p class="error">❌ Login failed. Try SQL injection...</p>
    <?php endif; ?>
</div>

<?php if ($solved): ?>
    <div class="lab-container">
        <form method="POST">
            <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
            <input type="hidden" name="password" value="<?= htmlspecialchars($password) ?>">
            <input type="text" name="flag_value" placeholder="Enter flag to mark lab as solved" required><br>
            <input class="btn" type="submit" name="flag_submit" value="Submit Flag">
        </form>

        <?php if ($flag_submitted): ?>
            <?php if ($correct_flag): ?>
                <p class="success">🎉 Correct flag submitted! Lab marked as solved.</p>
            <?php else: ?>
                <p class="error">🚫 Incorrect flag. Try again.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="references">
    🔗 <strong>References:</strong><br>
    <a href="https://portswigger.net/web-security/sql-injection" target="_blank">PortSwigger - SQLi</a><br>
    <a href="https://owasp.org/www-community/attacks/SQL_Injection" target="_blank">OWASP - SQL Injection</a>
</div>

<br><a class="btn" href="../../dashboard.php">⬅️ Back to Dashboard</a>
</body>
</html>
