<?php include 'auth_check.php'; ?>

<?php
$flag = "flag{unsafe_api_consumption_exploit_lab7}";

function fetch_data($url) {
    // Insecure curl-based fetch (no allowlist, no validation!)
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'] ?? '';
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $result = fetch_data($url);
        if (strpos($result, 'hack-the-lab') !== false) {
            echo "<div style='color:yellow;background:black;padding:10px;margin-top:10px'>✅ Flag: $flag</div>";
        } else {
            echo "<div style='color:red;'>Fetched content (no flag found):</div><pre>" . htmlentities($result) . "</pre>";
        }
    } else {
        echo "<div style='color:red;'>Invalid URL</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Lab 7 - Unsafe API Consumption</title>
    <style>
        body { background: black; color: #0f0; font-family: monospace; text-align: center; padding: 20px; }
        h1 { color: red; }
        input[type=text] { width: 60%; padding: 8px; font-size: 16px; background: #222; border: 1px solid #0f0; color: #0f0; }
        button { padding: 10px 20px; background: red; color: white; font-weight: bold; border: none; cursor: pointer; }
        button:hover { background: darkred; }
        .box { background: #111; padding: 20px; border-radius: 10px; border: 1px solid #0f0; width: 80%; margin: auto; }
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
    
<h1>⚠️ API Lab 7 - Unsafe Consumption of APIs</h1>
<p>The API backend fetches external data without validating the input URL.</p>

<div class="box">
    <form method="POST">
        <p>Enter any URL to fetch data from:</p>
        <input type="text" name="url" placeholder="http://example.com/data.json" required>
        <br><br>
        <button type="submit">Fetch URL</button>
    </form>
</div>

<div style="margin-top: 30px;" class="nav">
    <a href="https://portswigger.net/web-security/ssrf" target="_blank">PortSwigger SSRF</a>
    <a href="https://owasp.org/API-Security/editions/2023/en/0xa7-unsafe-consumption-of-apis/" target="_blank">OWASP API A7</a>
</div>

</body>
</html>
