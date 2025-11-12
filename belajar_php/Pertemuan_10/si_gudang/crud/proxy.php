<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$token = 'MASUKKAN_TOKEN_DI_SINI';
$base = 'https://learn.sistempolsub.id';
$url = $base . '/webservice/rest/server.php'
     . '?wstoken=' . urlencode($token)
     . '&wsfunction=core_webservice_get_site_info'
     . '&moodlewsrestformat=json';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

echo $error ? json_encode(['error' => $error]) : $response;
