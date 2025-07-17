<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Challenges – Hacksudo CTF</title>
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

    <h1>🔐 API Vulnerability Challenges</h1>

    <div class="container">
        <div class="box">
            <h3>Lab 1: BOLA</h3>
            <p>Broken Object Level Authorization</p>
            <a href="labs/api/lab1_bola.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 2: Broken Auth</h3>
            <p>Broken Authentication in API endpoint</p>
            <a href="labs/api/lab2_broken_auth.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 3: BOPLA</h3>
            <p>Broken Object Property Level Authorization</p>
            <a href="labs/api/lab3_bopla.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 4: Unrestricted Resources</h3>
            <p>Abuse resource usage with no limits</p>
            <a href="labs/api/lab4_resource_exhaustion.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 5: Broken Function Level Auth</h3>
            <p>Access unauthorized functions via API</p>
            <a href="labs/api/lab5_bfla.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 6: Access to Sensitive Flows</h3>
            <p>Abuse critical functions in APIs</p>
            <a href="labs/api/lab6_sensitive_flow.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 7: Unsafe API Consumption</h3>
            <p>Client-side API misuse vulnerability</p>
            <a href="labs/api/lab7_unsafe_api_consumption.php">Start Lab</a>
        </div>
        <div class="box">
            <h3>Lab 8: JWT Tampering</h3>
            <p>Modify JWT tokens to escalate privileges</p>
            <a href="labs/api/lab8_jwt_tampering.php">Start Lab</a>
        </div>
    </div>

    <footer>
        <p>© 2025 Hacksudo | Created by Aparna & Vishal</p>
        <p><a href="https://portswigger.net/web-security" target="_blank">Learn more on PortSwigger</a></p>
    </footer>

</body>
</html>
