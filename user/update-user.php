<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 



if($_POST) {
    $_id = $_POST['_id'];
    $is_admin = $POST['isAdmin'];
    // $email = $_POST['email'];
    $hashed_password = $_POST['hashed_password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    
    $sql = "UPDATE CUSTOMER SET fname = '$fname', lname = '$lname', hashed_password = '$hashed_password', mobile = '$mobile', city = '$city', state = '$state', pincode = '$pincode' WHERE _id = '$_id'";
    $exec = mysqli_query($connection, $sql);

    if($exec) {
    
        $sql = "UPDATE ADMIN SET fname = '$fname', lname = '$lname', hashed_password = '$hashed_password', mobile = '$mobile', city = '$city', state = '$state', pincode = '$pincode' WHERE _id = '$_id'";
        $exec1 = mysqli_query($connection, $sql); 
    }

    if($exec && $exec1) {
        echo json_encode(array(
            "success" => true,
            "message" => "User updated successfully",
        ));
    }
    else {
        echo json_encode(array(
            "success" => false,
            "message" => "User update failed",
        ));
    }
    
    

    


}


?>