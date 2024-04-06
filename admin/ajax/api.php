<?php
$type = $_GET['type'];
$parentId = $_GET['parentId'] ?? '';
$apiUrl = "https://member.lazada.vn/locationtree/api/getSubAddressList?countryCode=VN?";

if ($type == 'district' || $type == 'ward') {
    $apiUrl .= "&addressId={$parentId}";
}

$response = file_get_contents($apiUrl);
$locations = json_decode($response, true)['module'];
echo json_encode($locations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>