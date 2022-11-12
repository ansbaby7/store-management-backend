<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 



if($_POST) {
    $product_id = $_POST['_id'];
    $product_name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    
    $sql = "UPDATE PRODUCT SET product_name = '$product_name', price = '$price', stock = '$stock', brand = '$brand', category = '$category', image = '$image', description = '$description' WHERE product_id = '$product_id'";
    $exec = mysqli_query($connection, $sql);
    

    echo json_encode(array(
        "success" => true,
        "product" => $_POST,
        "message" => "Product updated successfully",
    ));
    
    

    


}


// echo "<h1>Hello</h1>";

?>