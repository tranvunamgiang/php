<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Chi tiết đơn hàng</h2>
    <?php
    require_once("./functions/db.php");
    $order_id = $_GET['order_id']; // Nhận order_id từ URL
    
    // Câu truy vấn lấy thông tin đơn hàng và chi tiết đơn hàng
    $sql = "SELECT o.id AS order_id, o.order_date, o.total_price, u.customer_name, u.email,
            oi.product_id, p.product_name, oi.quantity, oi.price
            FROM orders o
            JOIN users u ON o.customer_id = u.id
            JOIN order_items oi ON o.id = oi.order_id
            JOIN products p ON oi.product_id = p.id
            WHERE o.id = $order_id";
    
    // Sử dụng hàm findById để lấy dữ liệu đơn hàng
    $order = findById($sql);
    
    if ($order) {
        echo "<h1>Chi tiết đơn hàng</h1>";
        echo "<p>Mã đơn hàng: " . $order["order_id"] . "</p>";
        echo "<p>Ngày đặt hàng: " . $order["order_date"] . "</p>";
        echo "<p>Tổng giá trị: " . $order["total_price"] . "</p>";
        echo "<p>Khách hàng: " . $order["customer_name"] . " (Email: " . $order["email"] . ")</p>";
        echo "<p>Sản phẩm: " . $order["product_name"] . " - Số lượng: " . $order["quantity"] . " - Giá: " . $order["price"] . "</p>";
    } else {
        echo "Không tìm thấy đơn hàng.";
    }
    ?>
    
    
</div>
</body>
</html>
