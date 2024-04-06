<?php
require_once('../inc/db_config.php');

$response = array();

$facilities = selectAll('facilities');
if ($facilities) {
    $response['status'] = 'success';
    $response['facilities'] = $facilities;
} else {
    $response['status'] = 'error';
}

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

?>