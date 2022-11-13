<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");



require_once('../connect.php'); 



    
$date = date("Y");
$sql = "SELECT month(date) as month, sum(total) as sales from ORDERS WHERE year(date)='$date' group by month(date) order by month(date)";
$exec = mysqli_query($connection, $sql);
$monthlySales = [];
while($result = mysqli_fetch_assoc($exec)) {
    $sale = array("month" => $result['month'], "sales" => $result['sales']);
    array_push($monthlySales, $sale);
}

echo json_encode(array(
    "monthlySales" => $monthlySales
));





?>