<?php
if(!empty($_FILES['file'])){
    $targetDir = 'uploads/';
    $filename = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir.$filename;
}
?>