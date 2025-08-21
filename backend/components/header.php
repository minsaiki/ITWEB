    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

<style>
  nav {
    background: linear-gradient(180deg,#ea74a1ff);
    color: white;
    font-family: 'Montserrat', sans-serif; /* ตัวอย่างฟอนต์ภาษาอังกฤษ */
  }
  nav a.nav-link {
    color: white;
  }
  nav a.nav-link:hover {
    color: #ffe6f0; /* สีเวลาชี้เมาส์ (optional) */
  }
</style>

<nav class="p-3 h-auto d-flex flex-column">
    <h4 class="text-center mb-4">Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="/mao/backend/index.php" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="/mao/backend/user.php" class="nav-link">User</a></li>
        <li class="nav-item"><a href="/mao/backend/product.php" class="nav-link">Product</a></li>
        <li class="nav-item"><a href="/mao/" class="nav-link">Go back</a></li>
    </ul>
</nav>