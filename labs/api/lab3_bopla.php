<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{bopla_api_property_hijack_003}";
$result = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_input = file_get_contents('php://input');
    $data = json_decode($json_input, true);

    if (!$data || !isset($data['username'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    $username = htmlspecialchars($data['username']);
    $isAdmin = isset($data['isAdmin']) ? $data['isAdmin'] : false;

    if ($isAdmin === true || $isAdmin === "true") {
        $result = "✅ Welcome <b>$username</b> (Admin)!<br><br>🏁 Flag: <b>$flag</b>";
    } else {
        $result = "👤 Hello $username! You are a normal user. Try harder!";
    }

    echo json_encode(['message' => $result]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Lab 3 - Broken Object Property Level Authorization</title>
    <style>
        body { background: black; color: #0f0; font-family: monospace; text-align: center; padding: 20px; }
        h1 { color: red; }
        .container { width: 80%; margin: auto; background: #111; padding: 20px; border-radius: 10px; border: 1px solid #0f0; }
        textarea { width: 90%; height: 120px; background: #000; color: #0f0; border: 1px solid #0f0; padding: 10px; margin-top: 10px; }
        button { background: red; color: white; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px; font-weight: bold; }
        pre { background: #222; padding: 10px; margin-top: 20px; color: yellow; }
        .nav a { color: #0f0; margin: 0 10px; text-decoration: none; }
        .nav a:hover { color: red; }
    </style>
</head>
<body>

<div class="navbar">
        <a href="../../index.php">🏠 Home</a>
        <a href="../../index1.php">🏠 Challanges</a>
	<a href="../../challenges_api.php">🏠 API Lab</a>
	<a href="../../logout.php">📖 Logout</a>
    </div>
    

<h1>🧩 API Lab 3 - BOPLA</h1>
<p>Try to become an admin by injecting extra object properties in the API request.</p>

<div class="container">
    <p><b>POST JSON to this endpoint:</b></p>
    <code>/hacksudo_ctf/labs/api/lab3_bopla.php</code>

    <p><b>Example using curl:</b></p>
    <pre>
curl -X POST http://127.0.0.1/hacksudo_ctf/labs/api/lab3_bopla.php \
  -H "Content-Type: application/json" \
  -d '{"username": "tempuser", "isAdmin": true}'
    </pre>

    <p><b>Expected:</b> Flag appears only when `isAdmin=true` is added!</p>
</div>

<div class="nav" style="margin-top: 30px;">
    <a href="https://portswigger.net/web-security/access-control/lab-user-role-can-be-modified" target="_blank">PortSwigger Ref 1</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa5-broken-function-level-authorization/" target="_blank">OWASP API A5</a>
</div>

</body>
</html>
