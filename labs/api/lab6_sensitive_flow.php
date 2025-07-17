<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{abused_sensitive_business_logic_flow_lab6}";

// Simulated DB
$users = [
    "bob" => ["role" => "user"],
    "admin" => ["role" => "admin"]
];

// Simulate API Endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = $data['username'] ?? '';
    $action = $data['action'] ?? '';

    if (!isset($users[$username])) {
        echo json_encode(["error" => "Invalid user"]);
        exit;
    }

    if ($action === 'promote') {
        // ❌ No permission check here!
        $users[$username]['role'] = 'admin';

        echo json_encode([
            "status" => "promoted",
            "message" => "$username is now admin!",
            "flag" => $flag
        ]);
    } else {
        echo json_encode([
            "status" => "normal",
            "message" => "$username remains user"
        ]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Lab 6 - Sensitive Flow Abuse</title>
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
    

<h1>🚨 API Lab 6 - Access to Sensitive Business Flows</h1>
<p>Abuse a critical flow like promotion by directly calling an unprotected API endpoint.</p>

<div class="box">
    <p><b>Endpoint:</b> <code>/hacksudo_ctf/labs/api/lab6_sensitive_flow.php</code></p>

    <p><b>Example:</b></p>
    <pre>
curl -X POST http://127.0.0.1/hacksudo_ctf/labs/api/lab6_sensitive_flow.php \
 -H "Content-Type: application/json" \
 -d '{"username":"bob", "action":"promote"}'
    </pre>

    <p>Hint: No auth check. Just promote yourself!</p>
</div>

<div class="nav" style="margin-top: 30px;">
    <a href="https://portswigger.net/web-security/logic-flaws/examples/lab-logic-flaws-accessing-sensitive-business-flows" target="_blank">PortSwigger Reference</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa6-unrestricted-access-to-sensitive-business-flows/" target="_blank">OWASP API A6</a>
</div>

</body>
</html>
