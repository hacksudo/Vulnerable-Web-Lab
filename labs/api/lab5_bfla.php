<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{api_function_level_bypass_005}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = $data['username'] ?? '';
    $role = $data['role'] ?? 'user'; // Default to low-privilege

    if ($role === 'admin') {
        echo json_encode([
            "status" => "admin-access-granted",
            "message" => "Welcome, Admin!",
            "flag" => $flag
        ]);
    } else {
        echo json_encode([
            "status" => "user",
            "message" => "You are a normal user. This function is not for you."
        ]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Lab 5 - Broken Function Level Authorization</title>
    <style>
        body { background: black; color: #0f0; font-family: monospace; text-align: center; padding: 20px; }
        h1 { color: red; }
        .box { background: #111; padding: 20px; border-radius: 10px; border: 1px solid #0f0; width: 80%; margin: auto; }
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
    

<h1>🔓 API Lab 5 - Broken Function Level Authorization</h1>
<p>Can you access an admin-only function by modifying the role?</p>

<div class="box">
    <p><b>Endpoint:</b> <code>/hacksudo_ctf/labs/api/lab5_bfla.php</code></p>

    <p><b>Example Request:</b></p>
    <pre>
curl -X POST http://127.0.0.1/hacksudo_ctf/labs/api/lab5_bfla.php \
 -H "Content-Type: application/json" \
 -d '{"username":"bob","role":"admin"}'
    </pre>

    <p>Hint: Try changing <code>"role"</code> to <code>"admin"</code> manually in Burp Suite or curl!</p>
</div>

<div class="nav" style="margin-top: 30px;">
    <a href="https://portswigger.net/web-security/access-control/lab-user-impersonation-via-idor" target="_blank">PortSwigger Reference</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa5-broken-function-level-authorization/" target="_blank">OWASP API A5</a>
</div>

</body>
</html>
