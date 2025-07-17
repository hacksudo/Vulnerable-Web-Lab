<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Hacksudo Vulnerable Web Application Learning Platform</title>
  <style>
    body {
      background-color: black;
      color: #0f0;
      font-family: 'Courier New', monospace;
      text-align: center;
      margin: 0;
      padding: 0;
    }
    h1.main-title {
      color: #0f0;
      font-size: 36px;
      margin-top: 20px;
      text-shadow: 0 0 10px red;
    }
    h2 {
      color: red;
      font-size: 24px;
      margin-top: 10px;
    }
    .navbar {
      background-color: #111;
      padding: 12px 0;
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
    .container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 40px;
    }
    .box {
      background-color: #111;
      border: 2px solid #0f0;
      color: #0f0;
      padding: 30px 20px;
      margin: 20px;
      width: 280px;
      border-radius: 10px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .box:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px red;
    }
    .box h3 {
      color: red;
      margin-bottom: 10px;
    }
    .box p {
      font-size: 14px;
      margin-bottom: 20px;
    }
    .box a {
      background-color: red;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }
    .box a:hover {
      background-color: darkred;
    }
    footer {
      margin-top: 60px;
      color: gray;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <a href="index.php">🏠 Home</a>
    <a href="ctf_events.php">🚩 CTF Events</a>
    <a href="about.php">📖 About</a>
    <a href="logout.php">📖 Logout</a>
  </div>

  <h1 class="main-title">🔰 Hacksudo Vulnerable Web</h1>
  <h2>Welcome to Hacksudo Vulnerable Web Application Learning Platform</h2>

  <div class="container">
    <div class="box">
      <h3>🔐 JWT Labs</h3>
      <p>Learn about real-world JWT token vulnerabilities and privilege escalation.</p>
      <a href="challenges_jwt.php">Explore JWT Labs</a>
    </div>

    <div class="box">
      <h3>🌐 Web OWASP Labs</h3>
      <p>Hands-on practice for XSS, SQLi, SSRF, CSRF, LFI, RFI, and more.</p>
      <a href="challenges_web.php">Explore Web Labs</a>
    </div>

    <div class="box">
      <h3>🔌 API Labs</h3>
      <p>Test your API security skills with OWASP API Top 10 style challenges.</p>
      <a href="challenges_api.php">Explore API Labs</a>
    </div>
  </div>

  <footer>
    <p>© 2025 Hacksudo | Created by Aparna & Vishal</p>
    <p><a href="https://hacksudo.com" style="color:#0f0;" target="_blank">Visit hacksudo.com</a></p>
  </footer>

</body>
</html>
