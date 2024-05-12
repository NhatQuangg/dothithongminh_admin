<main id="main" class="main" style="min-height: 625px;">

    <div class="pagetitle" style="margin-top: 30px;"></div>
    <!-- End Page Title -->

    <?php if (isset($_SESSION['USER_LOGED'])) {
        $user = $_SESSION["USER_LOGED"];

        $userData = $user['userData'];
        $userId = $user['userId'];
    ?>
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="Profile" class="rounded-circle">
                            <h2><?= $profileUser['fullname'] ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button name="profileOverview" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-overview">Hồ sơ</button>
                                </li>

                                <li class="nav-item">
                                    <button name="profileEdit" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Sửa hồ sơ</button>
                                </li>

                                <li class="nav-item">
                                    <button name="profileChangePassword" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Đổi mật khẩu</button>
                                </li>
                            </ul>

                            <div class="tab-content pt-4">

                                <div name="profileOverview" class="tab-pane fade show profile-overview" id="profile-overview">

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Họ tên</div>
                                        <div class="col-lg-9 col-md-8"><?= $profileUser['fullname'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tên đăng nhập</div>
                                        <div class="col-lg-9 col-md-8"><?= $profileUser['email'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                        <div class="col-lg-9 col-md-8"><?= $profileUser['phone'] ?></div>
                                    </div>

                                </div>

                                <div name="profileEdit" class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="post" action="profile">
                                        <div class="row mb-3">
                                            <input type="hidden" id="user_id" name="user_id" value="<?= $userId ?>">

                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ tên</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtfn" type="text" class="form-control" value="<?= $profileUser['fullname'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtphone" type="number" class="form-control" value="<?= $profileUser['phone'] ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center mt-3 ">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->
                                </div>

                                <div name="profileChangePassword" class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="post" action="profile">
                                        <input type="hidden" id="email" name="email" value="<?= $profileUser['email'] ?>">
                                        <input type="hidden" id="uid" name="uid" value="<?= $uid ?>">
                                        <input type="hidden" id="pass" name="pass" value="<?= $profileUser['password'] ?>">
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $userId ?>">


                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtpass" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtnewpass" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="txtrenewpass" type="password" class="form-control">
                                            </div>
                                            <div class="row mb-3 text-center mt-3 ">
                                                <?php if (isset($_SESSION['update_success'])) {
                                                    unset($_SESSION['update_success'])
                                                ?>
                                                    <p class="text-success" style="font-style: italic;">Đổi mật khẩu thành công</p>
                                                <?php
                                                }
                                                if (isset($_SESSION['update_fail'])) {
                                                    unset($_SESSION['update_fail'])
                                                ?>
                                                    <p class="text-danger" style="font-style: italic;">Đổi mật khẩu thất bại. Vui lòng thử lại !</p>
                                                <?php
                                                }
                                                if (isset($_SESSION['npw_not_rnpw'])) {
                                                    unset($_SESSION['npw_not_rnpw'])
                                                ?>
                                                    <p class="text-danger" style="font-style: italic;">Mật khẩu nhập lại không đúng. Vui lòng thử lại !</p>
                                                <?php
                                                }
                                                if (isset($_SESSION['pw_not_pass'])) {
                                                    unset($_SESSION['pw_not_pass'])
                                                ?>
                                                    <p class="text-danger" style="font-style: italic;">Mật khẩu hiện tại không đúng. Vui lòng thử lại !</p>
                                                <?php
                                                }
                                                if (isset($_SESSION['rule_password'])) {
                                                    unset($_SESSION['rule_password'])
                                                ?>
                                                    <p class="text-danger" style="font-style: italic;">Mật khẩu quá yếu. Vui lòng thử lại !</p>
                                                <?php } ?>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" value="change_pass_btn" name="change_pass_btn">Cập nhật</button>
                                            </div>
                                    </form>
                                    <!-- End Change Password Form -->
                                </div>

                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>


            </div>
            <!-- </div> -->
        </section>
    <?php } ?>

</main>

<script>
    const TAB_ACTIVE_KEY = 'tab-active';
    const defaultActive = 'profileOverview';
    const tabActive = JSON.parse(localStorage.getItem(TAB_ACTIVE_KEY)) ?? defaultActive;
    console.log('tab active storage:', tabActive)


    const buttonBars = document.querySelectorAll('.card .nav-item .nav-link');
    const tabPanes = document.querySelectorAll('.tab-content .tab-pane');

    (() => {
        tabPanes.forEach(tab => {
            const tabId = tab.getAttribute('name');
            if (tabId === tabActive)
                tab.classList.add('active', 'show');
            else tab.classList.remove('active', 'show');
        })

        buttonBars.forEach(btn => {
            if (btn.getAttribute('name') === tabActive)
                btn.classList.add('active');
            else btn.classList.remove('active');
        })
    })()

    buttonBars.forEach(btn => {
        btn.addEventListener('click', () => {
            const btnName = btn.getAttribute('name');

            tabPanes.forEach(tab => {
                const tabId = tab.getAttribute('name');
                // console.log({tabId});
                if (tabId === btnName) {
                    tab.classList.add('active', 'show');
                    localStorage.setItem(TAB_ACTIVE_KEY, JSON.stringify(tabId));
                } else tab.classList.remove('active', 'show');

            })
        })
    })
</script>