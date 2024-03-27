<!-- =============== Main ============== -->
<main id="main" class="main" style="min-height: 625px;">
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">---</h5>
						<form method="POST" action="user">
							<div class="row mb-3">
								<div class="col-sm-6">
									<label for="" class="col-form-label">Mã tài khoản</label>
									<input type="text" class="form-control" id="txtmtk" name="txtmtk" value="" readonly>
								</div>
								<div class="col-sm-6">
									<label for="" class="col-form-label">Tên đăng nhập</label>
									<input type="text" class="form-control" id="txttdn" name="txttdn" value="" readonly>

								</div>
								<div class="col-sm-6">
									<label for="" class="col-form-label">Họ tên</label>
									<input type="text" class="form-control" id="txthoten" name="txthoten" value="">
								</div>
								<div class="col-sm-6">
									<label for="" class="col-form-label">Mật khẩu</label>
									<input type="text" class="form-control" id="txtmk" name="txtmk" value="" readonly>
								</div>
								<div class="col-sm-6">
									<label for="" class="col-form-label">Số điện thoại</label>
									<input type="number" class="form-control" id="txtphone" name="txtphone" value="">
								</div>
								<div class="col-sm-6">
									<label for="" class="col-form-label">Quyền</label>
									<select class="form-select" aria-label="" name="txtlevel" id="txtlevel">
										<option selected value="0">Admin</option>
										<option value="1">Employee</option>
										<option value="2">Customer</option>
									</select>
								</div>
							</div>
							<?php
							if (isset($_SESSION["UPDATE_SUCCESS"])) {
								unset($_SESSION["UPDATE_SUCCESS"]);
							?>
								<div class="text-center mb-2">
									<p class="small mb-0 text-center text-success" style="font-style: italic;">
										Cập nhật thành công !
									</p>
								</div>
							<?php } else 							
							if (isset($_SESSION["UPDATE_FAIL"])) {
								unset($_SESSION["UPDATE_FAIL"]);
							?>
								<div class="text-center mb-2">
									<p class="small mb-0 text-center text-danger" style="font-style: italic;">
										Cập nhật thất bại !
									</p>
								</div>
							<?php } ?>

							<div class="text-center">
								<button type="submit" class="btn btn-primary" value="create_btn" name="create_btn" disabled>Thêm</button>
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
						<table class="table table-bordered table-hover">
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
											<a href="javascript:void(0)" class="select-btn" data-id="<?= $userId ?>" data-email="<?= $userData['email'] ?>" data-fullname="<?= $userData['fullname'] ?>" data-password="<?= $userData['password'] ?>" data-phone="<?= $userData['phone'] ?>" data-level="<?= $userData['level'] ?>">
												Chọn
											</a>
										</td>
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

<script>
	document.querySelectorAll('.select-btn').forEach(button => {
		button.addEventListener('click', function() {
			const userId = this.getAttribute('data-id');
			const email = this.getAttribute('data-email');
			const fullname = this.getAttribute('data-fullname');
			const password = this.getAttribute('data-password');
			const phone = this.getAttribute('data-phone');
			const level = this.getAttribute('data-level');
			// Cập nhật giá trị cho các trường input trong form
			document.getElementById('txtmtk').value = userId;
			document.getElementById('txttdn').value = email;
			document.getElementById('txthoten').value = fullname;
			document.getElementById('txtmk').value = password;
			document.getElementById('txtphone').value = phone;
			document.getElementById('txtlevel').value = level;
		});
	});
</script>