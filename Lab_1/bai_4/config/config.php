<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "l1_bai4";

try {
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Đặt chế độ lỗi để báo cáo lỗi khi có
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    die();
}
?>
