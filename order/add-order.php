<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


require_once('../connect.php'); 
date_default_timezone_set('Asia/Kolkata');



if($_POST) {

    $orderItems = $_POST['orderList'];
    $total = $_POST['total'];
    $shipping_address = $_POST['shippingAddress'];
    $customer_id = $_POST['user_id'];

    $date = date('Y-m-d');
    $time = date('H:i:s');

    $sql = "INSERT INTO ORDERS(customer_id, total, date, time) values ('$customer_id', '$total', '$date', '$time')";
    $exec1 = mysqli_query($connection, $sql);

    $order_id = mysqli_insert_id($connection);

    $full_name = $shipping_address['fullName'];
    $street = $shipping_address['street'];
    $city = $shipping_address['city'];
    $state = $shipping_address['state'];
    $pincode = $shipping_address['pinCode'];

    $sql = "INSERT INTO SHIPPING_DETAIL(order_id, full_name, street, city, state, pincode) values ('$order_id', '$full_name', '$street', '$city', '$state', '$pincode')";
    $exec2 = mysqli_query($connection, $sql);

    $shipping_id = mysqli_insert_id($connection);

    foreach($orderItems as $orderItem) {
        $product_id = $orderItem['product_id'];
        $product_quantity = $orderItem['quantity'];
        $sql = "INSERT INTO ORDER_ITEM(order_id, product_id, product_quantity) values ('$order_id', '$product_id', '$product_quantity')";
        $exec3 = mysqli_query($connection, $sql);
    }

    if($exec1) {

        $order = array_merge($_POST, array(
            "_id" => $order_id,
            "shipping_id" => $shipping_id,
            "date" => $date,
            "time" => $time,
        ));

        echo json_encode(array(
            "success" => true,
            "message" => "Order insertion successful",
            "order" => $order
        ));
    }    


}


?>