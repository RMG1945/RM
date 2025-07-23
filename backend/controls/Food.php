<?php
    include './controls/db.php';
    

    // ดึงข้อมูลผู้ใช้งานจาก databse
    $sql = "SELECT `id`, `product_name`, `description`, `price`, `created_at`, `profile_image` FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>