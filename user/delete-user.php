<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

require_once('../connect.php'); 



if($_POST) {
    $_id = $_POST['_id'];

    $sql = "DELETE FROM CUSTOMER WHERE _id='$_id'";
    $exec = mysqli_query($connection, $sql);

    if($exec) {
        echo json_encode(array(
            "success" => true,
            "message" => "User deletion successful"
        ));
        return;
    }

}



?>