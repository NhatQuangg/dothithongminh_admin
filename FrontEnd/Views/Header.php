<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Phản ánh đô thị</title>

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <style>
    .carousel-custom {
      max-width: 500px;
      margin: auto;
    }

    .carousel-item img,
    .carousel-item video {
      width: 100%;
      /* Đảm bảo rằng ảnh sẽ lấp đầy container */
      height: 250px;
      /* Thiết lập chiều cao cố định cho tất cả các hình ảnh */
      object-fit: cover;
    }

    .media-item {
      width: 100%;
      /* Đảm bảo rằng ảnh sẽ lấp đầy container */
      height: 250px;
      /* Thiết lập chiều cao cố định cho tất cả các hình ảnh */
      object-fit: cover;
    }
  </style>

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Đô thị thông minh</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <?php
        if (isset($_SESSION['USER_LOGED'])) {
          $user = $_SESSION["USER_LOGED"];

        ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="../src/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">Tài khoản</span>
          </a>
          <!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Nhật Quang</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <!-- Đăng xuất -->
            <li>
              <a class="dropdown-item d-flex align-items-center" href="user?logout">
                <i class="bi bi-box-arrow-right"></i> <span>Đăng xuất</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

      </ul>
    <?php } ?>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- End Header -->