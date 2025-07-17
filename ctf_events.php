<?php include 'auth_check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CTF Event - Coming Soon | Hacksudo</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: black;
      font-family: 'Courier New', monospace;
      color: #0f0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    h1 {
      color: red;
      font-size: 48px;
      text-shadow: 0 0 10px red;
      margin-bottom: 10px;
      animation: flicker 2s infinite;
    }

    h2 {
      color: #0f0;
      font-size: 28px;
      animation: blink 1.2s infinite;
    }

    .soon-box {
      border: 2px solid red;
      padding: 30px;
      border-radius: 10px;
      background-color: #111;
      text-align: center;
      box-shadow: 0 0 15px red;
    }

    a.button {
      margin-top: 30px;
      display: inline-block;
      padding: 12px 30px;
      background-color: red;
      color: white;
      text-decoration: none;
      font-size: 18px;
      border-radius: 5px;
      box-shadow: 0 0 10px red;
      transition: background 0.3s ease;
    }

    a.button:hover {
      background-color: darkred;
    }

    footer {
      position: absolute;
      bottom: 10px;
      color: gray;
      font-size: 13px;
    }

    @keyframes flicker {
      0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
        opacity: 1;
      }
      20%, 24%, 55% {
        opacity: 0;
      }
    }

    @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0.2; }
      100% { opacity: 1; }
    }
  </style>
</head>
<body>

  <div class="soon-box">
    <h1>🚩 CTF Events</h1>
    <h2>Coming Soon... Stay Tuned!</h2>

    <a class="button" href="index1.php">← Back to Dashboard</a>
  </div>

  <footer>
    © 2025 Hacksudo | CTF Engine by Vishal & Aparna
  </footer>

</body>
</html>
