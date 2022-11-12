<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

require_once('../connect.php'); 



if($_POST) {
    $username = $_POST['username'];

    $sql = "SELECT * FROM ADMIN WHERE username='$username'";
    $exec = mysqli_query($connection, $sql);

    $result_array = mysqli_fetch_assoc($exec);
    if($result_array) {
        echo json_encode(array(
            "user" => array(
                "_id" => $result_array['_id'],
                "username" => $result_array['username'],
                "password" => $result_array['hashed_password'],
                "email" => $result_array['email'],
                "isAdmin" => true
            ),
            "success" => true,
            "message" => "User(admin) already exists"
        ));
        return;
    }

    else {
        $sql = "SELECT * FROM CUSTOMER WHERE username='$username'";
        $exec = mysqli_query($connection, $sql);

        $result_array = mysqli_fetch_assoc($exec);

        if($result_array) {
            echo json_encode(array(
                "user" => array(
                    "_id" => $result_array['_id'],
                    "username" => $result_array['username'],
                    "password" => $result_array['hashed_password'],
                    "email" => $result_array['email'],
                    "isAdmin" => false
                ),
                "success" => true,
                "message" => "User(customer) already exists"
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


// echo "<h1>Hello</h1>";

?>