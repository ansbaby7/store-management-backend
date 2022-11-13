<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 



if($_POST) {
    $table_name = $_POST['tableName']; 

    
    $sql = "SELECT COUNT(*) as count_value FROM $table_name";
    $exec = mysqli_query($connection, $sql);
    $count = 0;
    if($exec) {
        $row = mysqli_fetch_assoc($exec);
        $count = $row['count_value'];
    }




    echo json_encode(array(
        "success" => true,
        "count" => $count,
        "message" => "Records counted successfully",
    ));
    
}



?>