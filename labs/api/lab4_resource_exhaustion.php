<?php include 'auth_check.php'; ?>

<?php
session_start();
$flag = "flag{api_resource_abuse_excessive_004}";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $count = isset($data['count']) ? (int)$data['count'] : 10;

    if ($count > 1000) {
        echo json_encode([
            "status" => "success",
            "message" => "Excessive resource consumption detected.",
            "flag" => $flag
        ]);
    } else {
        $items = [];
        for ($i = 1; $i <= $count; $i++) {
            $items[] = "Item $i";
        }
        echo json_encode([
            "status" => "normal",
            "items" => $items,
            "message" => "Try increasing the count to abuse resource usage."
        ]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Lab 4 - Unrestricted Resource Consumption</title>
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
    
<h1>🧨 API Lab 4 - Unrestricted Resource Consumption</h1>
<p>Try to abuse the API by requesting an excessive amount of data with no limits.</p>

<div class="box">
    <p><b>Endpoint:</b> <code>/hacksudo_ctf/labs/api/lab4_resource_exhaustion.php</code></p>

    <p><b>Example Request:</b></p>
    <pre>
curl -X POST http://127.0.0.1/hacksudo_ctf/labs/api/lab4_resource_exhaustion.php \
 -H "Content-Type: application/json" \
 -d '{"count": 1500}'
    </pre>

    <p>If count exceeds 1000, the server gives you the flag.</p>
</div>

<div class="nav" style="margin-top: 30px;">
    <a href="https://portswigger.net/web-security/denial-of-service" target="_blank">PortSwigger DoS</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa4-unrestricted-resource-consumption/" target="_blank">OWASP API A4</a>
</div>

</body>
</html>
