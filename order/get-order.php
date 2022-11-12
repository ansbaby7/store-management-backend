<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 

if($_POST) {
    $order_id = $_POST['_id'];
    $sql = "SELECT * FROM ORDERS WHERE _id = '$order_id'";
    $exec1 = mysqli_query($connection, $sql);
    $order_result = mysqli_fetch_assoc($exec1);

    $sql = "SELECT * FROM SHIPPING_DETAIL WHERE order_id = '$order_id'";
    $exec2 = mysqli_query($connection, $sql);
    $shipping_detail_result = mysqli_fetch_assoc($exec2);

    $sql = "SELECT * FROM ORDER_ITEM WHERE order_id = '$order_id'";
    $exec3 = mysqli_query($connection, $sql);
    $order_items = [];
    // $order_item = []
    while($result = mysqli_fetch_assoc($exec3)) {
        $product_id = $result['product_id'];
        $sql = "SELECT * FROM PRODUCT WHERE product_id = '$product_id'";
        $exec4 = mysqli_query($connection, $sql);
        $product = mysqli_fetch_assoc($exec4);
        $order_item = array(
            "_id" => $result['product_id'],
            "quantity" => $result['product_quantity'],
            "price" => $product['price'],
            "image" => $product['image'],
            "name" => $product['product_name']
        );
        array_push($order_items, $order_item);
    }


    echo json_encode(array(
        "success" => true,
        "message" => "Reading order successful",
        "order" => array_merge(array(
            "_id" => $order_result['_id'],
            "user_id" => $order_result['customer_id'],
            'total' => $order_result['total'],
            "date" => $order_result['date'],
            "time" => $order_result['time'],
        ), array(
            "orderItems" => $order_items,
            "shippingAddress" => $shipping_detail_result,
        ))
    ));
}

?>