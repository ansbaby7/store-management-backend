<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// $rest_json = file_get_contents("php://input");
// $_POST = json_decode($rest_json, true);

require_once('../connect.php'); 

$sql = "SELECT * FROM PRODUCT";
$exec = mysqli_query($connection, $sql);

$result_array = [];

while($result = mysqli_fetch_assoc($exec)) {
    $data['_id'] = $result['product_id'];
    $data['name'] = $result['product_name'];
    $data['price'] = $result['price'];
    $data['brand'] = $result['brand'];
    $data['category'] = $result['category'];
    $data['image'] = $result['image'];
    $data['description'] = $result['description'];
    $data['stock'] = $result['stock'];
    array_push($result_array, $data);
}

echo json_encode(array(
    "success" => true,
    "products" => $result_array,
    "message" => "Reading products successful" 
));


?>