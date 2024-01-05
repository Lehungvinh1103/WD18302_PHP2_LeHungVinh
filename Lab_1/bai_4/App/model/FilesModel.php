<?php

function get_list_files(){
    include './config/config.php';
    $sql = "SELECT * FROM files";
    $stmt = $conn->query($sql);

    // Lấy kết quả
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        return $result;
    }
}