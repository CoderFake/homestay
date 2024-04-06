<?php
require_once('../inc/db_config.php');

if (isset($userData)) {
    echo "Tên: " . $userData['name'] . "<br>";
    // Làm gì đó với $userData
}

if(isset($_POST['get_users'])){
    $res = selectAll('users');
    $i = 1;


    $data = "";
    while($row = mysqli_fetch_assoc($res)){
        $del_btn = "</button>
        <button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm' >
        XÓA     
        </button>";
        $data.="

        <tr>
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[datentime]</td>
            <td>$del_btn</td>

        "
           ;
            $i++;
    }
    echo $data;


}



if(isset($_POST['remove_user'])){
    $frm_data = filteration($_POST);
    
    $res = delete("DELETE FROM `users`  WHERE  `id`=? ",[$frm_data['user_id']],'i');

    if($res){
        echo 1;
    }
    else{
        echo 0;
    }
}
if(isset($_POST['search_user'])){
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM 'users' WHERE `user_name` LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i = 1;


    $data = "";
    while($row = mysqli_fetch_assoc($res)){
        $del_btn = "</button>
        <button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm' >
        XÓA  
        </button>";
        $data.="

        <tr>
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[datentime]</td>
            <td>$del_btn</td>

        "
           ;
            $i++;
    }
    echo $data;


}
if(isset($_POST['getUsersLoggedIn'])){
    $count = getUsersLoggedIn();
    echo json_encode(['count' => $count]);
    exit;
}
?>