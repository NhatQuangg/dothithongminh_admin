<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<link rel="stylesheet" href="./FrontEnd/assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

<?php

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$urlParts = parse_url($requestUri);
$path = $urlParts['path'];

session_start();
switch ($path) {
  case '/dothithongminh_admin/':
    if (isset($_SESSION['USER_LOGED']))
      header("Location: /dothithongminh_admin/home");
    else
      include __DIR__ . '/FrontEnd/Views/Homes/index.php';
    break;
  case '/dothithongminh_admin/home':
    include __DIR__ . '/BackEnd/Controllers/HomeController.php';
    break;
  case '/dothithongminh_admin/user':
    include __DIR__ . '/BackEnd/Controllers/UserController.php';
    break;
  case '/dothithongminh_admin/category':
    include __DIR__ . '/BackEnd/Controllers/CategoryController.php';
    break;
  case '/dothithongminh_admin/statistic':
    include __DIR__ . '/BackEnd/Controllers/StatisticController.php';
    break;
  case '/dothithongminh_admin/detailreflect':
    include __DIR__ . '/BackEnd/Controllers/ReflectController.php';
    break;
  case '/dothithongminh_admin/profile':
    include __DIR__ . '/BackEnd/Controllers/ProfileController.php';
    break;
  default:
    include 'pages/404.php';
    break;
}

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="./FrontEnd/assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>