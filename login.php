<?php
session_start();
$flag = "flag{login_successful}";

// Vulnerable login logic (intentional SQLi or hardcoded)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Vulnerable static check or mimic SQLi for challenge
    if ($user === 'admin' && $pass === 'password') {
        $_SESSION['auth'] = 'valid';
        setcookie("auth", "valid", time() + 3600, "/");
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hacksudo Login Challenge</title>
    <style>
        body {
            background-color: black;
            color: #00ff00;
            font-family: monospace;
        }
        .login-box {
            margin: 100px auto;
            width: 300px;
            border: 1px solid red;
            padding: 20px;
        }
        input {
            width: 100%;
            padding: 5px;
            background-color: black;
            color: white;
            border: 1px solid green;
        }
        button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>🔐 Login Challenge</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required /><br><br>
        <input type="password" name="password" placeholder="Password" required /><br><br>
        <button type="submit">Login</button>
    </form>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
</body>
</html>
