<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /mao/index.php");
    exit;
}
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
        /* optional: add transparency to improve readability */
        border-radius: 10px;
      }

      /* Button style */
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
          body {
      background-color: #ffffff; /* ดำพื้นหลัง */
      color: #fff; /* ตัวอักษรหลักสีขาว */
    }
    .card {
      background-color: #ffc1da !important;
      color: #ffffff !important;
    }
    .card .card-title,
    .card .card-text {
      color: #ffffff !important;
    }
    .btn-primary {
      background-color: #ff9dd3ff !important;
      border-color: #ffbce1ff !important;
      color: #000 !important;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #f387c1ff !important;
      border-color: #f387c1ff !important;
      color: #000 !important;
    }
    main h2 {
      color: #000000ff;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>Welcome</h2>
            <p></p>
            <div class="row mt-4 gap-4">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">Total number of users</p>
                            <a href="users.php" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text">Total number of products</p>
                            <a href="product.php" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">Total number of orders</p>
                            <a href="orders.php" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
