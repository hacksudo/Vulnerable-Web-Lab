<?php

if (!function_exists('base64url_encode')) {
    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

if (!function_exists('base64url_decode')) {
    function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}

if (!function_exists('generate_jwt')) {
    function generate_jwt($payload, $secret) {
        $header = ['typ' => 'JWT', 'alg' => 'HS256'];
        $segments = [
            base64url_encode(json_encode($header)),
            base64url_encode(json_encode($payload))
        ];
        $signing_input = implode('.', $segments);
        $signature = hash_hmac('sha256', $signing_input, $secret, true);
        $segments[] = base64url_encode($signature);
        return implode('.', $segments);
    }
}

if (!function_exists('generate_jwt_none')) {
    function generate_jwt_none($payload) {
        $header = ['typ' => 'JWT', 'alg' => 'none'];
        return base64url_encode(json_encode($header)) . '.' .
               base64url_encode(json_encode($payload)) . '.';
    }
}

if (!function_exists('generate_jwt_rs256')) {
    function generate_jwt_rs256($payload, $privateKeyPath) {
        $header = ['typ' => 'JWT', 'alg' => 'RS256'];
        $segments = [
            base64url_encode(json_encode($header)),
            base64url_encode(json_encode($payload))
        ];
        $signing_input = implode('.', $segments);
        $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyPath));
        openssl_sign($signing_input, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $segments[] = base64url_encode($signature);
        return implode('.', $segments);
    }
}

if (!function_exists('verify_jwt_hs256')) {
    function verify_jwt_hs256($jwt, $secret) {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) return false;
        $signature = base64url_decode($parts[2]);
        $valid_signature = hash_hmac('sha256', "$parts[0].$parts[1]", $secret, true);
        return hash_equals($valid_signature, $signature)
            ? json_decode(base64url_decode($parts[1]), true) : false;
    }
}

if (!function_exists('verify_jwt_none')) {
    function verify_jwt_none($jwt) {
        $parts = explode('.', $jwt);
        return ($parts[2] === '') ? json_decode(base64url_decode($parts[1]), true) : false;
    }
}

if (!function_exists('verify_jwt_rs256')) {
    function verify_jwt_rs256($jwt, $publicKeyPath) {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) return false;
        $signature = base64url_decode($parts[2]);
        $publicKey = openssl_pkey_get_public(file_get_contents($publicKeyPath));
        $valid = openssl_verify("$parts[0].$parts[1]", $signature, $publicKey, OPENSSL_ALGO_SHA256);
        return $valid === 1 ? json_decode(base64url_decode($parts[1]), true) : false;
    }
}

if (!function_exists('verify_jwt_kid_header')) {
    function verify_jwt_kid_header($jwt) {
        $parts = explode('.', $jwt);
        $header = json_decode(base64url_decode($parts[0]), true);
        $payload = json_decode(base64url_decode($parts[1]), true);
        if (!isset($header['kid'])) return false;
        $kid = basename($header['kid']);
        $key_path = __DIR__ . "/keys/" . $kid;
        if (!file_exists($key_path)) return false;
        $secret = trim(file_get_contents($key_path));
        $signature_provided = base64url_decode($parts[2]);
        $signing_input = $parts[0] . '.' . $parts[1];
        $valid_signature = hash_hmac('sha256', $signing_input, $secret, true);
        return hash_equals($valid_signature, $signature_provided) ? $payload : false;
    }
}
