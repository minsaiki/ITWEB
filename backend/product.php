<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /mao/index.php");
    exit;
}

include 'controls/fetchProduct.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/itweb/assets/css/style.css" />
        <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

<style>
  body {
    color: #000;
        font-family: 'Montserrat', sans-serif;
    min-height: 100vh;
  }

  main {
    border-radius: 10px;
  }

  .btn-primary {
    background-color: #ff90bb;
    border-color: #ff90bb;
    color: white;
  }
  .btn-primary:hover {
    background-color: #ffc1da;
    border-color: #ffc1da;
    color: white;
  }
</style>

</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>Manage Products</h2>
            <a href="addproduct.php" class="btn btn-primary mb-3">Add Product</a>
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No.</th>
                        <!-- <th>ID</th> -->
                        <th>Images</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <!-- <td class="text-center"><?= htmlspecialchars($row['id']); ?></td> -->
                            <td>
                                <img src="../assets/imgs/<?= htmlspecialchars($row['image']); ?>" alt="" style="width: 100px;" />
                            </td>
                            <td><?= htmlspecialchars($row['name']); ?></td>
                            <td><?= htmlspecialchars($row['description']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['price']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                            <td class="text-center">
                                <a href="editproduct.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDeleteP(<?= $row['id'] ?>)" title="Delete">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <script>
                                    function confirmDeleteP(productId) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "Do you want to delete this product?",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Yes, delete it!',
                                            cancelButtonText: 'Cancel'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `controls/deleteProduct.php?id=${productId}`;
                                            }
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>

    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $_SESSION['success']; ?>',
                confirmButtonText: 'OK'
            });
        </script>
    <?php unset($_SESSION['success']);
    endif; ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= $_SESSION['error']; ?>',
                confirmButtonText: 'OK'
            });
        </script>
    <?php unset($_SESSION['error']);
    endif; ?>
</body>

</html>
