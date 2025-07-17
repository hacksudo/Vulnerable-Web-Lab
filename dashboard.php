<?php include 'auth_check.php'; ?>
<?php
// dashboard.php

// Route labs via GET
if (isset($_GET['lab'])) {
    $lab = $_GET['lab'];
    switch ($lab) {
        case '1': require 'labs/jwt/lab1_weak_secret.php'; break;
        case '2': require 'labs/jwt/lab2_none_algo.php'; break;
        case '3': require 'labs/jwt/lab3_rs256_confusion.php'; break;
        case '4': require 'labs/jwt/lab4_hardcoded_secret.php'; break;
        case '5': require 'labs/jwt/lab5_kid_header.php'; break;
        case '6': require 'labs/jwt/lab6_weak_key.php'; break;
        case '7': require 'labs/jwt/lab7_jwk_kid_confusion.php'; break;
        default: echo 'Invalid lab number.';
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hacksudo CTF Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: black;
            color: #00ff00;
            font-family: monospace;
            text-align: center;
        }
        h1, h2 {
            color: red;
            text-shadow: 1px 1px 4px #0f0;
        }
        .lab-box {
            background-color: #111;
            border: 1px solid #0f0;
            padding: 20px;
            margin: 15px auto;
            width: 60%;
            border-radius: 8px;
            color: #0f0;
        }
        .lab-box a {
            color: red;
            font-size: 20px;
            text-decoration: none;
        }
        .lab-box a:hover {
            color: #00ff00;
        }
        footer {
            margin-top: 40px;
            font-size: 14px;
            color: gray;
        }
    </style>
</head>
<body>

<h1>💀 Hacksudo CTF Dashboard</h1>
<p>Welcome to the vulnerable lab platform</p>

<h2>🔐 JWT Vulnerability Labs</h2>

<?php
for ($i = 1; $i <= 7; $i++) {
    echo "<div class='lab-box'>
            <a href='dashboard.php?lab=$i'>Lab $i</a>
            <p>JWT Vulnerability Lab $i</p>
          </div>";
}
?>

<h2 style="color: #00ffff;">🌐 Web Vulnerability Labs</h2>

<div class="lab-box">
    <a href="web/labs/lab1_sql_injection.php">Lab 1: SQL Injection</a>
    <p>Test classic login-based SQLi using single quote `'` or `' OR 1=1 --`</p>
</div>

<div class="lab-box">
    <a href="web/labs/lab2_xss.php">Lab 2: Reflected XSS</a>
    <p>Exploit the search box to reflect a script and trigger XSS</p>
</div>

<footer>
    <p>© 2025 All Rights Reserved — Created by Aparna & Vishal</p>
    <p><a href="https://portswigger.net/web-security" target="_blank">📖 Learn at PortSwigger</a></p>
</footer>

</body>
</html>
