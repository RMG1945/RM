<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /ITWEB/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/itweb/assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>Welcome</h2>
            <div class="row mt-4 gap-4">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">จำนวนผู้ใช้งานทั้งหมด</p>
                            <a href="users.php" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text">จำนวนสินค้าทั้งหมด</p>
                            <a href="product.php" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">จำนวนคำสั่งซื้อทั้งหมด</p>
                            <a href="orders.php" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
