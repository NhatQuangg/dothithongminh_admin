<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Beauty Garden</title>
    <link href="" rel="stylesheet">
    <!-- Google Fonts -->
</head>

<body>

    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="" class="logo d-flex align-items-center w-auto">
                                    <img src="./FrontEnd/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Đô thị thông minh</span>
                                </a>
                            </div>
                            <!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0">Đăng nhập</h5>
                                        <p class="text-center small">Nhập tên đăng nhập và mật khẩu của bạn</p>
                                    </div>
                                    <form class="row g-3 needs-validation" method="post" action="user">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Tên đăng nhập</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control" id="username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                        </div>
                                        <?php
                                        if (isset($_SESSION["LOGIN_FAIL"])) {
                                            unset($_SESSION['LOGIN_FAIL']);
                                        ?>
                                            <div class="col-12">
                                                <p class="small mb-0 text-center text-danger" style="font-style: italic;">
                                                    Đăng nhập sai. Vui lòng thử lại !
                                                </p>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="login_btn" value="Đăng nhập">Đăng nhập</button>
                                        </div>
                                        <!-- <div class="col-12">
                                            <p class="small mb-0">
                                                Bạn chưa có tài khoản? <a href="register_page.php" style="font-style: italic;">Đăng kí</a>
                                            </p>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- ======== Script ========  -->


</body>

</html>