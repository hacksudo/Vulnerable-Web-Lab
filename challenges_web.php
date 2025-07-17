<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Challenges – Hacksudo CTF</title>
    <style>
        body {
            background-color: black;
            color: #0f0;
            font-family: 'Courier New', monospace;
            text-align: center;
        }
        h1 {
            color: red;
            margin-top: 30px;
            font-size: 36px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }
        .box {
            background-color: #111;
            border: 2px solid #0f0;
            color: #0f0;
            padding: 20px;
            margin: 15px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px #0f0;
            transition: transform 0.3s;
        }
        .box:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px red;
        }
        .box h3 {
            color: red;
        }
        .box p {
            font-size: 14px;
        }
        .box a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
        .box a:hover {
            background-color: #c00;
        }
        .navbar {
            background-color: #111;
            padding: 10px 0;
            border-bottom: 2px solid red;
        }
        .navbar a {
            color: #0f0;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        .navbar a:hover {
            color: red;
        }
        footer {
            margin-top: 40px;
            color: gray;
        }
    </style>
</head>
<body>

      <div class="navbar">
        <a href="index.php">🏠 Home</a>
        <a href="ctf_events.php">🚩 CTF Events</a>
        <a href="about.php">📖 About</a>
        <a href="index1.php">🚩Main Lab</a>
	<a href="logout.php">📖 Logout</a>
    </div>

    <h1>🌐 Web Vulnerability Challenges</h1>

    <div class="container">
        <div class="box">
            <h3>Lab 1: SQL Injection</h3>
            <p>Bypass login or extract data via SQLi</p>
            <a href="labs/web/lab1_sql_injection.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 2: Cross-Site Scripting (XSS)</h3>
            <p>Inject JavaScript in user input</p>
            <a href="labs/web/lab2_xss.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 3: CSRF</h3>
            <p>Exploit trusted user via CSRF token</p>
            <a href="labs/web/lab3_csrf.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 4: SSRF</h3>
            <p>Access internal resources via crafted input</p>
            <a href="labs/web/lab4_ssrf.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 5: LFI</h3>
            <p>Read server files through parameter</p>
            <a href="labs/web/lab5_lfi.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 6: RFI</h3>
            <p>Execute code from remote source</p>
            <a href="labs/web/lab6_rfi.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 7: Open Redirect</h3>
            <p>Redirect user to untrusted domain</p>
            <a href="labs/web/lab7_open_redirect.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 8: OS Command Injection</h3>
            <p>Execute system commands from input</p>
            <a href="labs/web/lab8_os_command_injection.php">Start Lab</a>
        </div>
    </div>

    <footer>
        <p>© 2025 Hacksudo | Created by Aparna & Vishal</p>
        <p><a href="https://portswigger.net/web-security" target="_blank">Learn more on PortSwigger</a></p>
    </footer>

</body>
</html>
