<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

require_once('../connect.php'); 



if($_POST) {
    $_id = $_POST['_id'];

    $sql = "SELECT * FROM ADMIN WHERE _id='$_id'";
    $exec = mysqli_query($connection, $sql);

    $result_array = mysqli_fetch_assoc($exec);
    if($result_array) {
        $password = $result_array['hashed_password'];
        unset($result_array['hashed_password']);
        $user_array = array_merge($result_array,array(
            "password" => $password,
            "isAdmin" => true
        ));
        echo json_encode(array(
            "user" => $user_array,
            "success" => true,
            "message" => "User(admin) exists"
        ));
        return;
    }

    else {
        $sql = "SELECT * FROM CUSTOMER WHERE _id='$_id'";
        $exec = mysqli_query($connection, $sql);

        $result_array = mysqli_fetch_assoc($exec);

        if($result_array) {
            $password = $result_array['hashed_password'];
            unset($result_array['hashed_password']);
            $user_array = array_merge($result_array,array(
                "password" => $password,
                "isAdmin" => false
            ));
            echo json_encode(array(
                "user" => $user_array,
                "success" => true,
                "message" => "User(customer) exists"
            ));
            return;
        }
        else {
            echo json_encode(array(
                "success" => false,
                "message" => "User does not exist"
            ));
        }
    }
    
   

}


?>