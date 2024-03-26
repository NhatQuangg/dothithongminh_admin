	<!-- ======= Sidebar ======= -->
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

		</ul>
	</aside>
	<!-- End Sidebar-->

	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 625px;">
		<section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">---</h5>
							<form method="POST" action="category">
								<div class="row mb-3">
									<label for="" class="col-sm-3 col-form-label">Tên loại</label>
									<div class="col-sm-9">
										<input type="hidden" id="selectedCategoryId" name="selectedCategoryId">
										<input type="text" class="form-control" id="txtcategory" name="txtcategory" value="">
										<?php
										// if (isset($_SESSION['create_success'])) {
										// 	echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_success'] . "</em></p>";
										// 	unset($_SESSION['create_success']);
										// }
										// if (isset($_SESSION['create_fail'])) {
										// 	echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_fail'] . "</em></p>";
										// 	unset($_SESSION['create_fail']);
										// }
										// if (isset($_SESSION['update_success'])) {
										// 	echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_success'] . "</em></p>";
										// 	unset($_SESSION['update_success']);
										// }
										// if (isset($_SESSION['update_fail'])) {
										// 	echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_fail'] . "</em></p>";
										// 	unset($_SESSION['update_fail']);
										// }
										?>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary" value="create_btn" name="create_btn">Thêm</button>
									<button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
								</div>
							</form>
							<!-- End Horizontal Form -->
						</div>
					</div>
				</div> 

				<div class="col-lg-12">

					<div class="card">
						<div class="card-body" style="max-height: 630px; overflow-y: auto;">
							<div class="row">
								<div class="col">
									<h5 class="card-title">Danh sách</h5>
								</div>
								<div class="col">
									<!-- <h5 class="" style="padding: 20px 0 15px 0;" >haha</h5> -->
									<em class="font-italic text-success" style="padding: 20px 0 15px 0;">
										<?php
										if (isset($_SESSION['delete_success'])) {
											$alert = $_SESSION['delete_success'];
											echo $alert;
											unset($_SESSION['delete_success']);
										}
										?>
									</em>
								</div>
							</div>
							<?php

							if (isset($_SESSION['delete_fail'])) {
								echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['delete_fail'] . "</em></p>";
								unset($_SESSION['delete_fail']);
							}
							?>
							<!-- Table with stripped rows -->
							<table class="table table-bordered table-hover ">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã tài khoản</th>
										<th scope="col">Tên đăng nhập</th>
										<th scope="col">Họ tên</th>
										<th scope="col">Mật khẩu</th>
										<th scope="col">Số điện thoại</th>
										<th scope="col">Quyền</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($allUsers as $userId => $userData) {
									?>
										<tr style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $userId ?></td>
											<td style="text-align: center;"><?= $userData['email'] ?></td>
											<td style="text-align: center;"><?= $userData['fullname'] ?></td>
											<td style="text-align: center;"><?= $userData['password'] ?></td>
											<td style="text-align: center;"><?= $userData['phone'] ?></td>
											<td style="text-align: center;"><?= $userData['level'] ?></td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="delete-btn" data-id="<?= $userId ?>">Xóa</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<form id="deleteForm" method="POST" action="user">
								<input type="hidden" name="userId" id="userIdInput">
								<input type="hidden" name="delete_btn">
							</form>
							<script>
								// Lắng nghe sự kiện click trên nút Xóa
								document.querySelectorAll('.delete-btn').forEach(button => {
									button.addEventListener('click', function() {
										// Lấy id từ thuộc tính data-id
										const userId = this.getAttribute('data-id');
										// Hiển thị confirm dialog
										if (confirm("Bạn có muốn xóa tài khoản này không?")) {
											// Nếu người dùng chọn OK, gán categoryId vào input của form và submit form
											document.getElementById('userIdInput').value = userId;
											// Đặt giá trị cho nút để xác định hành động là delete_btn
											document.getElementById('deleteForm').submit();
										}
									});
								});
							</script>
							<!-- End Table with stripped rows -->
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>