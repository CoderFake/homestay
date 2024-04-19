<?php
session_start();
require_once ('admin/inc/db_config.php');
require_once ('admin/inc/essentials.php');
$data_homestay = readConfig();
$user_id = $_SESSION['user_id']; 
global $con;
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$pms = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require ('inc/links.php'); ?>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <?php require ('inc/header.php'); ?>
    <?php require ('users.php'); ?>
    <?php require ('inc/footer.php'); ?>
    <script src="js/script.js"></script>
</body>

</html>