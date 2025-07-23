<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}
include '../backend/controls/Food.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food/Product Management</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>จัดการผู้ใช้งาน</h2>
            <a href="addproduct.php" class="btn btn-primary mb-3">เพิ่มสินค้า</a>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        
                        <td class="text-center"><?= htmlspecialchars($row['id']); ?></td>
                        <td>
                            <img src="../assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" alt="Profile Image" style="width: 100px;">
                        </td>
                        <td><?= htmlspecialchars($row['product_name']); ?></td>
                        <td><?= htmlspecialchars($row['description']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['price']); ?></td>
                        <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                        <td class="text-center">
                            <a href="editproducts.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="deleteproduct.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <script>
                                function confirmDelete(id) {
                                    Swal.fire({
                                        title: 'คุณแน่ใจหรือไม่?',
                                        text: "คุณต้องการลบผู้ใช้งานนี้หรือไม่?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'ใช่, ลบเลย!',
                                        cancelButtonText: 'ยกเลิก'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `../backend/controls/deleteUser.php?id=${id}`;
                                        }
                                    });
                                }
                            </script>
            </table>
        </main>
    </div>
</body>
<?php if (isset($_SESSION['success'])) : ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: '<?= $_SESSION['success']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['success']); ?>

<?php elseif (isset($_SESSION['error'])) : ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'เกิดข้อผิดพลาด',
        text: '<?= $_SESSION['error']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>
</html>
