<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JWT Challenges – Hacksudo CTF</title>
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

    <h1>🔐 JWT Vulnerability Challenges</h1>

    <div class="container">
        <div class="box">
            <h3>Lab 1: Weak Secret Key</h3>
            <p>Guessable key like "secret123"</p>
            <a href="dashboard.php?lab=1">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 2: None Algorithm</h3>
            <p>JWT signed with alg=none</p>
            <a href="dashboard.php?lab=2">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 3: RS256 → HS256 Confusion</h3>
            <p>Use public key as HMAC secret</p>
            <a href="dashboard.php?lab=3">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 4: Hardcoded Secret in Code</h3>
            <p>Secret found via source code</p>
            <a href="dashboard.php?lab=4">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 5: KID Header Injection</h3>
            <p>Abuse KID to point to custom file</p>
            <a href="dashboard.php?lab=5">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 6: Weak Key Dictionary Attack</h3>
            <p>Break signature via common keys</p>
            <a href="dashboard.php?lab=6">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 7: JWK KID Confusion</h3>
            <p>Inject public key via JWK to KID</p>
            <a href="dashboard.php?lab=7">Start Lab</a>
        </div>
    </div>

    <footer>
        <p>© 2025 Hacksudo | Created by Aparna & Vishal</p>
        <p><a href="https://portswigger.net/web-security/jwt" target="_blank">Learn JWT on PortSwigger</a></p>
    </footer>

</body>
</html>
