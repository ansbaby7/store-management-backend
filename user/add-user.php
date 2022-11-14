<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 



if($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $hashed_password = $_POST['hashed_password'];
    $is_admin = $_POST['isAdmin'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    
    $sql = "INSERT INTO CUSTOMER(username, email, hashed_password, fname, lname, mobile, city, state, pincode) values ('$username', '$email', '$hashed_password', '$fname', '$lname', '$mobile', '$city', '$state', '$pincode' )";
    $exec = mysqli_query($connection, $sql);
    if($exec) {
        $_id = mysqli_insert_id($connection);
        $result = array_merge($_POST,array("_id" => $_id));
        // $result = mysqli_fetch_assoc($exec);
        echo json_encode(array(
            "user" => $result,
            // "isAdmin" => $is_admin,
            "message" => "Customer added successfully"
        ));
    }
    else {
        echo json_encode(array(
            // "isAdmin" => $is_admin,
            "message" => "Customer insertion failed"
        ));
    }
    


}



?>