<?php
session_start();

// เพิ่มจำนวนสินค้า
if (isset($_POST['action']) && $_POST['action'] == 'increase' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId) {
            $_SESSION['cart'][$key]['quantity'] += 1;
            break;
        }
    }
}

// ลดจำนวนสินค้า
if (isset($_POST['action']) && $_POST['action'] == 'decrease' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId) {
            $_SESSION['cart'][$key]['quantity'] -= 1;
            // กันค่าติดลบ
            if ($_SESSION['cart'][$key]['quantity'] <= 0) {
                unset($_SESSION['cart'][$key]);
            }
            break;
        }
    }
}

// ลบสินค้าออกจากตะกร้า
if (isset($_POST['action']) && $_POST['action'] == 'remove' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['productId'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include './components/header.php'; ?>

    <section id="cart_product" class="flex-grow-1 py-5">
        <div class="container">
            <h2 class="mb-4">Your Cart</h2>
            <div class="container mt-5">
                <div class="row">
                    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <?php $totalPrice = 0; ?>
                        <ul class="list-group">
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <?php 
                                    $subtotal = $item['productPrice'] * $item['quantity'];
                                    $totalPrice += $subtotal;
                                ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex w-100">
                                        <img src="./assets/imgs/<?= htmlspecialchars($item['productImage']); ?>" 
                                            alt="Product Image" class="img-thumbnail" 
                                            style="height: 80px; width: 80px; object-fit: cover;">
                                        <div class="ms-3 w-100">
                                            <h5 class="mb-1"><?= htmlspecialchars($item['productName']); ?></h5>
                                            <p class="mb-1"><strong>Price:</strong> <?= number_format($item['productPrice'], 2); ?> Bath</p>
                                            <p class="mb-1"><strong>Quantity:</strong> <?= htmlspecialchars($item['quantity']); ?></p>
                                            <p class="mb-0"><strong>Subtotal:</strong> <?= number_format($subtotal, 2); ?> Bath</p>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="increase">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="bi bi-plus-circle-fill"></i>
                                            </button>
                                        </form>
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="decrease">
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="bi bi-dash-circle-fill"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeleteCart('<?= htmlspecialchars($item['productId']); ?>')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                        <form id="deleteCartForm-<?= htmlspecialchars($item['productId']); ?>" method="post" style="display:none;">
                                            <input type="hidden" name="productId" value="<?= htmlspecialchars($item['productId']); ?>">
                                            <input type="hidden" name="action" value="remove">
                                        </form>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- แสดงราคารวม -->
                        <div class="mt-4 text-end">
                            <h4>Total : <?= number_format($totalPrice, 2); ?> Bath</h4>
                        </div>
                    <?php else: ?>
                        <p class="text-center col-12">No items in cart</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php include './components/footer.php'; ?>

    <script>
        function confirmDeleteCart(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to delete this item?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                background: 'linear-gradient(180deg, #FFC1DA 0%, #FF90BB 100%)',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteCartForm-' + productId).submit();
                }
            });
        }
    </script>
</body>
</html>
 