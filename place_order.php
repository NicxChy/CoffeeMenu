<?php
session_start();
include("DataBase.php");

if (!isset($_SESSION['email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

$email = $_SESSION['email'];
$order = $input['order'];
$total = $input['total'];

$order_string = '';
foreach ($order as $item) {
    $order_string .= $item['title'] . ' x ' . $item['amount'] . ', ';
}
$order_string = rtrim($order_string, ', ');


try {
    $query = "INSERT INTO ordered (Email, Order, Total) VALUES ('$email', '$order_string', $total)";
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to insert order into database.']);
    }
} catch (mysqli_sql_exception $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>