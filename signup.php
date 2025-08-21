<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign Up</title>

  <!-- Google Font: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

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
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
      margin: 0;
    }

    .card {
      background: #FFC1DA;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(255, 144, 187, 0.6);
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
      text-align: center;
    }

    label {
      color: #ffffff;
      font-weight: 600;
    }

    .form-control {
      background-color: #FF90BB;
      border: 1px solid #ffb4d1;
      color: #ffffff;
    }

    .form-control::placeholder {
      color: #ffe6f1;
    }

    .form-control:focus {
      background-color: #ff9ec7;
      color: #ffffff;
      box-shadow: 0 0 8px #fff;
      border: 1px solid #ffffff;
      outline: none;
    }

    .btn-primary {
      background-color: #FF90BB;
      border: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
      color: #ffffff;
    }

    .btn-primary:hover {
      background-color: #ffffff;
      color: #FF90BB;
    }

    .text-center span,
    .text-center a {
      color: #ffffff;
    }

    .text-center a:hover {
      text-decoration: underline;
      color: #ffe6f1;
    }

    .img-fluid {
      height: 100%;
      object-fit: cover;
    }

    .row.g-0 > .col-md-6:first-child {
      padding: 3rem;
    }

    @media (max-width: 768px) {
      .row.g-0 > .col-md-6:first-child {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
    <div class="card shadow">
      <div class="row g-0">
        <!-- Left form -->
        <div class="col-md-6">
          <div class="card-body">
            <h2>Sign Up</h2>
            <form method="POST" action="controls/createUsers.php">
              <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="firstname" placeholder="Enter first name" required />
              </div>
              <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="lastname" placeholder="Enter last name" required />
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter address" required></textarea>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required />
              </div>
              <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <div class="text-center mt-3">
              <span>Already have an account? </span>
              <a href="index.php">Sign In</a>
            </div>
          </div>
        </div>

        <!-- Right image -->
        <div class="col-md-6 d-none d-md-block">
          <img src="assets/imgs/sss.jpg" alt="Ocean" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</body>

</html>
