<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BeautyGarden</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="../src/css/style.css" rel="stylesheet">

    <!-- Tắt tăng giảm trong thẻ input -->
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>

</head>

<body>

    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="" class="logo d-flex align-items-center w-auto">
                                    <img src="../src/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Đô thị thông minh</span>
                                </a>
                            </div>
                            <!-- End Logo -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Tạo tài khoản</h5>
                                        <p class="text-center small">Nhập thông tin cá nhân của bạn để tạo tài khoản</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" action="../function_user.php">
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Họ tên</label>
                                            <input type="text" name="fullname" class="form-control" id="" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Tên đăng nhập</label>
                                            <input type="text" name="txtun" class="form-control" id="" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPass" class="form-label">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control" id="" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPhone" class="form-label">Số điện thoại</label>
                                            <input type="number" name="phone" class="form-control" id="" required>
                                        </div>
                                        
                                        <div class="col-12">
                                            <input class="btn btn-primary w-100" type="submit" name="register_btn" value="Tạo tài khoản">

                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">
                                                Bạn đã có tài khoản? <a href="../index.php" style="font-style: italic;">Đăng nhập</a>
                                            </p>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="../src/js/main.js"></script>

</body>

</html>