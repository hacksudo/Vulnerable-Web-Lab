<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About | Hacksudo Labs</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: black;
      color: #0f0;
      font-family: 'Courier New', monospace;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px;
    }

    h1 {
      color: red;
      font-size: 40px;
      animation: flicker 2s infinite;
      margin-bottom: 10px;
    }

    h2 {
      color: #0f0;
      font-size: 22px;
      margin-bottom: 30px;
    }

    p {
      width: 80%;
      text-align: center;
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 30px;
    }

    a {
      color: #0f0;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      color: red;
    }

    .links {
      margin-top: 20px;
      text-align: center;
    }

    .links a {
      display: block;
      margin: 10px 0;
      font-size: 18px;
    }

    footer {
      margin-top: 40px;
      color: gray;
      font-size: 13px;
    }

    .btn {
      background-color: red;
      padding: 10px 20px;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      margin-top: 20px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn:hover {
      background-color: darkred;
    }

    @keyframes flicker {
      0%, 18%, 22%, 25%, 53%, 57%, 100% {
        opacity: 1;
      }
      20%, 24%, 55% {
        opacity: 0.4;
      }
    }
  </style>
</head>
<body>

  <h1>💻 Hacksudo</h1>
  <h2>Vulnerable Lab & Cybersecurity Challenge Platform</h2>

  <p>
    This platform is designed to help learners explore and exploit common web, API, and JWT vulnerabilities.
    It includes real-world style vulnerable labs with interactive UIs, flags, and learning resources.
    Challenges range from beginner to elite hacker level, and CTF events will be hosted with timed competitive labs.
  </p>

  <p>We built this to promote practical, hands-on cybersecurity learning.</p>

  <div class="links">
    <a href="https://github.com/hacksudo" target="_blank">🐱 GitHub: hacksudo</a>
    <a href="https://instagram.com/hacksudo" target="_blank">📷 Instagram: hacksudo</a>
    <a href="https://youtube.com/hackshala" target="_blank">🎥 YouTube: Hackshala</a>
    <a href="https://linkedin.com/in/realvilu" target="_blank">👔 LinkedIn: Vishal</a>
    <a href="https://linkedin.com/in/aparna-a-570392220" target="_blank">👔 LinkedIn: Aparna </a>
    <a href="https://hacksudo.com" target="_blank">🌐 Website: hacksudo.com</a>
  </div>

  <a class="btn" href="index1.php">⬅ Back to Home</a>

  <footer>
    © 2025 Hacksudo Labs | Built by Vishal Waghmare  & Aparna Ambllathar
  </footer>

</body>
</html>
