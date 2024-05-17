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


    /* Ẩn các mũi tên điều chỉnh từ input số */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

    .file-preview {
      border: none;
      padding: 2px;
      margin-bottom: 10px;
      background-color: #f5f5f5;
      width: 400px;
      display: flex;
      align-items: center;
    }

    .file-name {
      color: #15c;
      font-weight: 600;
      margin-left: 5px;
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

          $userData = $user['userData'];
          $userId = $user['userId'];

        ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userData['fullname'] ?></span>
          </a>
          <!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $userData['fullname'] ?></h6>
              <!-- <span>Web Designer</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile">
                <i class="bi bi-person"></i>
                <span>Hồ sơ</span>
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