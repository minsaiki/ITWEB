<?php
include './controls/fetchProduct.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Products</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
      body {
        background: linear-gradient(180deg, #ffffffff 0%rgba(255, 255, 255, 1)BB 100%);
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        font-family: 'Montserrat', sans-serif;
        min-height: 100vh;
      }

      .card {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
      }
        h3, p {
            color: #000000ff;
        }

        h1 ,h2{
            color: #ffffffff;
        }
      .card .btn-primary {
        background-color: #ff90bb;
        border-color: #ff90bb;
        color: white;
      }

      .card .btn-primary:hover {
        background-color: #ffc1da;
        border-color: #ffc1da;
        color: white;
      }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include './components/header.php'; ?>

    <section id="fetch_product" class="py-5 flex-grow-1">
        <div class="container">
            <h3 class="mb-4">Show Products</h3>
            <?php if ($stmt->rowCount() > 0) : ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <img src="./assets/imgs/<?= htmlspecialchars($row['image']); ?>"
                                        class="card-img-top" alt="<?= htmlspecialchars($row['name']); ?>"
                                        style="object-fit:cover; height:200px;" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($row['name']); ?></h5>
                                        <h7 class="card-text"><?= htmlspecialchars($row['description']); ?></h7><br>
                                        <h7 class="card-text"><strong>Price :  <?= htmlspecialchars($row['price']); ?> Baht</strong></h7>
                                        <div class="text-center"><br>
                                            <button class="btn btn-primary" id="add-to-cart"
                                                data-id="<?= htmlspecialchars($row['id']); ?>"
                                                data-name="<?= htmlspecialchars($row['name']); ?>"
                                                data-price="<?= htmlspecialchars($row['price']); ?>"
                                                data-image="<?= htmlspecialchars($row['image']); ?>">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php else : ?>
                <p class="text-center">No products available</p>
            <?php endif ?>
        </div>
    </section>

    <?php include './components/footer.php'; ?>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('#add-to-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');

                fetch('./controls/addToCart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        productId: productId,
                        productName: productName,
                        productPrice: productPrice,
                        productImage: productImage
                    })
                })
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Success',
                        text: `${productName} has been added to your cart!`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        background: 'linear-gradient(180deg, #FFC1DA 0%, #FF90BB 100%)',
                        color: 'white'
                    });
                }).catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: `Failed to add product: ${error.message}. Please try again.`,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        background: 'linear-gradient(180deg, #FFC1DA 0%, #FF90BB 100%)',
                        color: 'white'
                    });
                });
            });
        });
    });
</script>
