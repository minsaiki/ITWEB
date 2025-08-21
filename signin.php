<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign In</title>

  <!-- Google Font: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background-color: #000;
      color: #ffffff;
      min-height: 100vh;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      background-color: #FFC1DA;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      max-width: 900px;
      width: 100%;
      overflow: hidden;
    }

    .card-body {
      padding: 2rem;
    }

    h2 {
      color: #ffffff;
      margin-bottom: 1.5rem;
      font-weight: 700;
    }

    label {
      color: #ffffff;
      font-weight: 600;
    }

    .form-control {
      background-color: #FF90BB;
      border: 1px solid #ffffff;
      color: #ffffff;
    }

    .form-control::placeholder {
      color: #fce4ef;
    }

    .form-control:focus {
      background-color: #FF90BB;
      color: #ffffff;
      box-shadow: 0 0 8px #ffffff;
      border: 1px solid #ffffff;
      outline: none;
    }

    .btn-primary {
      background-color: #FF90BB;
      border: none;
      font-weight: 600;
      color: #ffffff;
      font-family: 'Montserrat', sans-serif;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ffffff;
      color: #FF90BB;
    }

    .text-center span {
      color: #ffffff;
    }

    .text-center a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 600;
    }

    .text-center a:hover {
      text-decoration: underline;
      color: #FF90BB;
    }

    .img-fluid {
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-start align-items-center" style="height: 100vh; max-width: 900px;">
    <div class="card shadow">
      <div class="row g-0">
        <div class="col-md-6 d-none d-md-block">
          <img src="assets/imgs/s.jpg" alt="Building" class="img-fluid" />
        </div>
        <!-- Left form -->
        <div class="col-md-6 py-5 px-3">
          <div class="card-body">
            <h2 class="text-center">Sign In</h2>
            <form method="POST" action="./controls/signinUsers.php">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required placeholder="Enter email" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="password" required placeholder="Enter password" />
              </div>
              <button type="submit" class="btn btn-primary w-100">Sign In</button>
            </form>
            <div class="text-center mt-3">
              <span>Don't have an account? </span>
              <a href="signup.php">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Invalid email or password',
        footer: 'Please try again.'
      });
    <?php endif; ?>
  </script>
</body>

</html>
