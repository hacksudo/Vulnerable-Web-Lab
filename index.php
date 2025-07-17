<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Hacksudo Labs</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: black;
      color: #0f0;
      font-family: 'Courier New', monospace;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      animation: shake 0.4s infinite;
    }

    h1 {
      font-size: 60px;
      color: red;
      animation: flicker 2s infinite;
      text-shadow: 0 0 20px red, 0 0 40px red;
    }

    h2 {
      font-size: 24px;
      color: #0f0;
      margin-bottom: 50px;
      animation: blink 1.2s infinite;
    }

    .enter-button {
      padding: 15px 40px;
      font-size: 20px;
      background-color: red;
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 0 0 10px red;
      transition: transform 0.3s ease;
    }

    .enter-button:hover {
      background: darkred;
      transform: scale(1.05);
    }

    footer {
      position: absolute;
      bottom: 10px;
      color: gray;
      font-size: 14px;
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
      50% { opacity: 0.3; }
      100% { opacity: 1; }
    }

    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      10% { transform: translate(-1px, -2px) rotate(-1deg); }
      20% { transform: translate(-3px, 0px) rotate(1deg); }
      30% { transform: translate(3px, 2px) rotate(0deg); }
      40% { transform: translate(1px, -1px) rotate(1deg); }
      50% { transform: translate(-1px, 2px) rotate(-1deg); }
      60% { transform: translate(-3px, 1px) rotate(0deg); }
      70% { transform: translate(3px, 1px) rotate(-1deg); }
      80% { transform: translate(-1px, -1px) rotate(1deg); }
      90% { transform: translate(1px, 2px) rotate(0deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
    }

    .trail-dot {
      position: absolute;
      width: 6px;
      height: 6px;
      background-color: lime;
      border-radius: 50%;
      pointer-events: none;
      opacity: 0.6;
      z-index: 999;
    }
  </style>
</head>
<body>

  <h1>🔥 Hacksudo 🔥</h1>
  <h2>Welcome to Web Vulnerable Labs</h2>

  <a href="index1.php"><button class="enter-button">🚀 Enter Labs</button></a>

  <footer>
    © 2025 Hacksudo Labs | Built by Vishal & Aparna
  </footer>

  <script>
    // Mouse Tracking Hacker Trail
    document.addEventListener("mousemove", function(e) {
      let dot = document.createElement("div");
      dot.className = "trail-dot";
      dot.style.left = e.pageX + "px";
      dot.style.top = e.pageY + "px";
      document.body.appendChild(dot);
      setTimeout(() => {
        dot.remove();
      }, 300);
    });
  </script>

</body>
</html>
