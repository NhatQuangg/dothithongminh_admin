<?php include ('../includes/layout.php') ?>

<?php define("PAGE_TITLE", "Index Page"); ?>

<?php template_header(); ?>

    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
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
                                        <h5 class="card-title text-center pb-0">Đăng nhập</h5>
                                        <p class="text-center small">Nhập tên đăng nhập và mật khẩu của bạn</p>
                                    </div>
                                    <form class="row g-3 needs-validation" method="post" action="./function_user.php">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Tên đăng nhập</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="txtun" class="form-control" id="username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Mật khẩu</label>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="login_btn" value="Đăng nhập">Đăng nhập</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">
                                                Bạn chưa có tài khoản? <a href="register_page.php" style="font-style: italic;">Đăng kí</a>
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

<?php template_footer(); ?>