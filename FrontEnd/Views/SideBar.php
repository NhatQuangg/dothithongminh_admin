<?php
if (isset($_SESSION['USER_LOGED'])) {
	$user = $_SESSION["USER_LOGED"];
	if ($user['level'] == '0') {
?>
		<aside id="sidebar" class="sidebar">
			<ul class="sidebar-nav" id="sidebar-nav">

				<li class="nav-item">
					<a class="nav-link collapsed" href="home">
						<i class="bi bi-circle"></i>
						<span>Quản lý phản ánh</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="category">
						<i class="bi bi-circle"></i>
						<span>Quản lý danh mục</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="user">
						<i class="bi bi-circle"></i>
						<span>Quản lý tài khoản</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" href="user">
						<i class="bi bi-circle"></i>
						<span>Thống kê</span>
					</a>
				</li>
			</ul>
		</aside>
	<?php
	} else
	if ($user['level'] == '1' || $user['level'] == '2') {
	?>
		<aside id="sidebar" class="sidebar">
			<ul class="sidebar-nav" id="sidebar-nav">

				<li class="nav-item">
					<a class="nav-link collapsed" href="home">
						<i class="bi bi-circle"></i>
						<span>Quản lý phản ánh</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="category">
						<i class="bi bi-circle"></i>
						<span>Quản lý danh mục</span>
					</a>
				</li>
			</ul>
		</aside>
<?php
	}
}
?>