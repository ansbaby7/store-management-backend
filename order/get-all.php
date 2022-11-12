<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 


// $customer_id = $_POST['user_id'];
// $order_id = $_POST['_id'];
$sql = "SELECT * FROM ORDERS";
$exec1 = mysqli_query($connection, $sql);

$orders = [];

while($order_result = mysqli_fetch_assoc($exec1)) {
    $order_id = $order_result['_id'];
    $user_id = $order_result['customer_id'];

    $sql = "SELECT * FROM CUSTOMER WHERE _id = '$user_id'";
    $exec = mysqli_query($connection, $sql);
    $user_result = mysqli_fetch_assoc($exec);


    $sql = "SELECT * FROM ORDERS WHERE _id = '$order_id'";
    $exec1 = mysqli_query($connection, $sql);
    $result1 = mysqli_fetch_assoc($exec1);

    $sql = "SELECT * FROM SHIPPING_DETAIL WHERE order_id = '$order_id'";
    $exec2 = mysqli_query($connection, $sql);
    $shipping_detail_result = mysqli_fetch_assoc($exec2);

    $sql = "SELECT * FROM ORDER_ITEM WHERE order_id = '$order_id'";
    $exec3 = mysqli_query($connection, $sql);
    $order_items = [];
    // $order_item = []
    while($result2 = mysqli_fetch_assoc($exec3)) {
        $product_id = $result2['product_id'];
        $sql = "SELECT * FROM PRODUCT WHERE product_id = '$product_id'";
        $exec4 = mysqli_query($connection, $sql);
        $product = mysqli_fetch_assoc($exec4);
        $order_item = array(
            "_id" => $result2['product_id'],
            "quantity" => $result2['product_quantity'],
            "price" => $product['price'],
            "image" => $product['image'],
            "name" => $product['product_name']
        );
        array_push($order_items, $order_item);
    }

    $order = array_merge(array(
        "_id" => $result1['_id'],
        "user_id" => $result1['customer_id'],
        "username" => $user_result['username'],
        'total' => $result1['total'],
        "date" => $result1['date'],
        "time" => $result1['time'],
    ), array(
        "orderItems" => $order_items,
        "shippingAddress" => $shipping_detail_result,
    ));
    array_push($orders, $order);

}


echo json_encode(array(
    "success" => true,
    "message" => "Reading all orders successful",
    "orders" => $orders
));


?>