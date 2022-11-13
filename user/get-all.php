<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

require_once('../connect.php'); 



$sql = "SELECT * FROM CUSTOMER";
$exec = mysqli_query($connection, $sql);

$users = [];

while($result = mysqli_fetch_assoc($exec)) {
    $isAdmin = false;
    $sql = "SELECT * FROM ADMIN WHERE _id='$result[_id]'";
    $exec1 = mysqli_query($connection, $sql);
    $admin_result = mysqli_fetch_assoc($exec1);
    if($admin_result) {
        $isAdmin = true;
    }
    $password = $result['hashed_password'];
    unset($result['hashed_password']);
    $user = array_merge($result, array(
        "password" => $password,
        "isAdmin" => $isAdmin
    ));

    array_push($users, $user);

}


echo json_encode(array(
    "success" => true,
    "users" => $users,
    "message" => "Reading users successful" 
));


?>