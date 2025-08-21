<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maomao</title>

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

        .hero {
            background: linear-gradient(to right, #FFC1DA, #FF90BB );
            color: #ffffff;
        }

        body {
            background-color: #ffffff; /* เปลี่ยนจาก #000000ff เป็นสีขาว */
            color: #000000; /* เปลี่ยนจากสีขาวเป็นดำเพื่อให้อ่านง่าย */
            font-family: 'Montserrat', sans-serif;
            margin: 0;
        }

        #content {
            background-color: #ffffff; /* เปลี่ยนพื้นหลัง section content เป็นขาว */
            color: #000000; /* ตัวอักษรเป็นดำ */
        }
        h3, p {
            color: #000000ff;
        }

        h1 ,h2{
            color: #ffffffff;
        }

        a.btn-light {
            color: #000 !important;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 18rem;
            background-color: #FFE6F0; /* เปลี่ยนจาก #FFC1DA */
            color: black; /* เปลี่ยนจาก white เป็น black */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
            transition: transform 0.2s ease;
            margin-bottom: 170px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title, .card-text {
            color: black; /* เปลี่ยนจาก white เป็น black */
        }

        .btn-primary {
            background-color: #FFB6D1; /* เปลี่ยนจาก #FF90BB */
            border-color: #FFB6D1;
            color: black; /* ให้ปุ่มอ่านง่ายขึ้น */
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff96bc;
            border-color: #ff96bc;
            color: black;
        }

        .add-to-cart {
            width: 100%;
            max-width: 200px;
            margin: 10px auto 0;
            display: block;
        }
    </style>
</head>

<body>
    <?php include './components/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero text-white text-center py-5" style="height: 100vh;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-4">Welcome to the DIOR maomao!</h1>
            <h2 class="lead">Lips are the two fleshy, movable folds surrounding the opening of the mouth.</h2>
            <a href="#content" class="btn btn-light btn-lg mx-auto">Start with maomao NOW!</a>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">About DIOR</h3>
            <p>
                Dior (officially Christian Dior SE) is a famous French luxury fashion house founded by designer Christian Dior in 1946. It is renowned worldwide for its haute couture, ready-to-wear clothes, accessories, fragrances, and beauty products.
            </p>
            <p>
                Lips is (are) a pair of soft, flexible, and sensitive structures that form the boundary of the mouth opening.

                They consist of layers of skin, muscle (mostly the orbicularis oris muscle), and a mucous membrane on the inner side. Lips are rich in blood vessels, which gives them their characteristic reddish or pinkish color.

                Lips play a vital role in many functions including:
            </p>
        </div>
    </section>

    <!-- Cards Section -->
    <div class="card-container">
        <div class="card">
            <img src="assets/imgs/1.jpg" class="card-img-top" alt="">
            <div class="card-body"><br>
                <a href="product.php" class="btn btn-primary d-block text-center">View more</a>
            </div>
        </div>

        <div class="card">
            <img src="assets/imgs/2.jpg" class="card-img-top" alt="">
            <div class="card-body"><br>
                <a href="product.php" class="btn btn-primary d-block text-center">View more</a>
            </div>
        </div>
        </div>
    <?php include './components/footer.php'; ?>

    <script>
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                background: 'linear-gradient(180deg, #FFC1DA 0%, #FF90BB 100%)',
                text: 'You have signed in successfully!',
                footer: 'Get out'
            });
        <?php endif; ?>
    </script>
</body>

</html>
