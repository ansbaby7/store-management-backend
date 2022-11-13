<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 



if($_POST) {
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    
    $sql = "INSERT INTO PRODUCT(product_name, price, stock, brand, category, image, description) values ('$product_name', '$price', '$stock', '$brand', '$category', '$image', '$description')";
    $exec = mysqli_query($connection, $sql);
    $_id = mysqli_insert_id($connection);
    $result = array_merge($_POST,array("_id" => $_id));

    echo json_encode(array(
        "success" => true,
        "product" => $result,
        "message" => "Product added successfully",
    ));
    
    

    


}



?>