<?php
require_once "function.php";

// Cek login
if (isset($_POST["login"])) {
    // Ambil data dari form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Cek data dengan database
    $cekdb = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($cekdb) > 0) {
        $_SESSION['login'] = 'True';
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
}

if (!isset($_SESSION["login"])) {
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gudang Barang - Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="inputEmail" class="form-label">Email address</label>
                                            <input type="email" class="form-control py-2" name="email" id="inputEmail" placeholder="Enter email address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control py-2" name="password" id="inputPassword" placeholder="Enter password">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>