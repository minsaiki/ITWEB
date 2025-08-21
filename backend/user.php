<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;
}

include 'controls/fetchUser.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/itweb/assets/css/style.css">
    <style>
  body {
    background-color: #ffffffff;
    color: #ffffff;
  }

  main h2 {
    color: #ffffffff;
  }

  .table {
    background-color: #FF90BB;
    color: #ffffff;
  }

  .table thead {
    background-color: #FF90BB !important;
    color: #ffffff !important;
  }

  .table tbody tr {
    background-color: #FF90BB;
  }

  .table tbody tr:nth-child(even) {
    background-color: #ff82b2ff;
  }

  .table tbody tr:hover {
    background-color: #ffadccff;
    color: #ffffffff;
  }

  /* Button style */
  .btn-warning {
    background-color: #FF90BB;
    border-color: #FF90BB;
    color: #ffffffff;
    font-weight: 600;
  }
  .btn-warning:hover {
    background-color: #FF90BB;
    color: #ffffffff;
  }

  .btn-danger {
    background-color: #FF90BB;
    border-color: #FF90BB;
    color: #fff;
    font-weight: 600;
  }
  .btn-danger:hover {
    background-color: #FF90BB;
    color: #fff;
  }

  /* White icons */
  .bi {
    color: inherit;
  }
</style>

</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>Manage Users</h2>
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No.</th>
                        <!-- <th>ID</th> -->
                        <th>Image</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Phone Number</th>
                        <th>Created Date</th>
                        <th>Role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <!-- <td class="text-center"><?= htmlspecialchars($row['id']); ?></td> -->
                            <td><img src="../assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" alt="" style="width: 100px;"></td>
                            <td><?= htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['phone']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['role']); ?></td>
                            <td class="text-center">
                                <a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "Do you really want to delete this user?",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Yes, delete it!',
                                            cancelButtonText: 'Cancel'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `controls/deleteUser.php?id=${id}`;
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
