<?php include 'includes/layout.php' ?>

<?php template_header();?>


	<div class="container">
		<?php
			session_start();
			if (isset($_SESSION["email"])) {
				echo "<br><br><h4>Xin chào: " . $_SESSION["email"] . "</h4>";
				if (isset($_SESSION["login_success"]) && $_SESSION["login_success"]) {
					echo '<div id="alert" class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" style="max-width: 250px;">
							Đăng nhập thành công!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						  </div>';
					unset($_SESSION["login_success"]); // Xóa biến session
				}

				echo '<br><a href="logout.php">Đăng xuất</a>';

			}
			else {
				echo "<br>Xin chao ban";
				echo '<br><a href="./users/login.php">Đăng nhập</a>';
				if (isset($_SESSION["login_fail"]) && $_SESSION["login_fail"]) {
					echo '<div id="alert" class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3" role="alert" style="max-width: 250px;">
							Đăng nhập thất bại!
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						  </div>';
					unset($_SESSION["login_fail"]); // Xóa biến session
				}
			}
		?>
	</div>

<?php template_footer();?>

