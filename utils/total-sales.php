<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");


require_once('../connect.php'); 

$sql = "SELECT SUM(total) as orders_total FROM ORDERS";
$exec = mysqli_query($connection, $sql);
$orders_total = 0;

if($exec) {
    $row = mysqli_fetch_assoc($exec);
    $orders_total = $row['orders_total'];
}



echo json_encode(array(
    "success" => true,
    "ordersPrice" => $orders_total,
    "message" => "Reading total sales successful" 
));


?>