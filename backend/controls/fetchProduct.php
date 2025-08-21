<?php
    include 'db.php';

    // ดึงข้อมูลผู้ใช้งานจาก databse
    $sql = "SELECT * FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>