<?php
session_start();
require '../inc/essentials.php';
adminLogin();
require_once '../inc/db_config.php';
// Kiểm tra xem yêu cầu có phải là AJAX không và có phải phương thức POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'update_role':
                updateRole();
                break;
            case 'delete_users':
                deleteUsers();
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Hành động không xác định'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
    
    if(isset($_POST['getUsersLoggedIn'])){
        $count = getUsersLoggedIn();
        echo json_encode(['count' => $count]);
        exit;
    }
}

?>