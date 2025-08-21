<header>
    <nav class="navbar navbar-expand-lg" style="background-color:  #ea74a1ff ;">
        <div class="container">
            <a class="navbar-brand text-white" href="../index.php">maomao</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="product.php" class="nav-link text-white">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link text-white">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi! <?php echo htmlspecialchars($_SESSION['name']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background-color: #FFC1DA;">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                                <li><a href="/mao/backend/index.php" class="dropdown-item text-white">Setting</a></li>
                            <?php endif; ?>
                            <li><a href="#" class="dropdown-item text-white">Profile</a></li>
                            <li class="nav-item"><a href="/mao/" class="dropdown-item text-white">Go back</a></li>
                            <li><a href="./controls/signout.php" class="dropdown-item text-white">Signout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
