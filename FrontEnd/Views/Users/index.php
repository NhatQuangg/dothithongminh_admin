<!-- =============== Main ============== -->
<main id="main" class="main" style="min-height: 625px;">
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Tài khoản</h5>
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button name="profileEdit" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Sửa tài khoản</button>
							</li>

							<li class="nav-item">
								<button name="profileCreate" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-create">Tạo tài khoản</button>
							</li>
						</ul>

						<div class="tab-content pt-4">

							<div name="profileEdit" class="tab-pane fade profile-edit pt-3" id="profile-edit">

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
											<input type="password" class="form-control" id="txtmk" name="txtmk" value="">
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
									<?php }
									if (isset($_SESSION["UPDATE_FAIL"])) {
										unset($_SESSION["UPDATE_FAIL"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Cập nhật thất bại !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["UPDATE_ERROR"])) {
										unset($_SESSION["UPDATE_ERROR"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Không có dữ liệu nào !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["UPDATE_FAIL_LEVEL"])) {
										unset($_SESSION["UPDATE_FAIL_LEVEL"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Quyền không hợp lệ !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["UPDATE_FAIL_NOT_GMAIL"])) {
										unset($_SESSION["UPDATE_FAIL_NOT_GMAIL"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Cập nhật thất bại !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["UPDATE_FAIL_PASSWORD"])) {
										unset($_SESSION["UPDATE_FAIL_PASSWORD"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Mật khẩu quá yếu
											</p>
										</div>
									<?php }
									if (isset($_SESSION["DELETE_SUCCESS"])) {
										unset($_SESSION["DELETE_SUCCESS"]);
									?>
										<div id="deleteSuccessMessage" class="text-center mb-2">
											<p class="small mb-0 text-center text-success" style="font-style: italic;">
												Xóa tài khoản thành công !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["DELETE_FAIL"])) {
										unset($_SESSION["DELETE_FAIL"]);
									?>
										<div id="deleteFailMessage" class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Xóa tài khoản thất bại !
											</p>
										</div>
									<?php } ?>
									<p id="roleUser" type="button" class="text-decoration-underline text-danger col-sm-1" data-toggle="modal" data-target="#exampleModalLong">
										Chú thích
									</P>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
									</div>
								</form>
							</div>
							<div name="profileCreate" class="tab-pane fade show profile-create" id="profile-create">

								<form method="POST" action="user">
									<div class="row mb-3">
										<div class="col-sm-6">
											<label for="" class="col-form-label">Tên đăng nhập</label>
											<input type="text" class="form-control" id="newun" name="newun" value="">
										</div>
										<div class="col-sm-6">
											<label for="" class="col-form-label">Họ tên</label>
											<input type="text" class="form-control" id="newfn" name="newfn" value="">
										</div>
										<div class="col-sm-6">
											<label for="" class="col-form-label">Mật khẩu</label>
											<input type="password" class="form-control" id="newpass" name="newpass" value="">
										</div>
										<div class="col-sm-6">
											<label for="" class="col-form-label">Số điện thoại</label>
											<input type="number" class="form-control" id="newphone" name="newphone" value="">
										</div>
										<div class="col-sm-6">
											<label for="" class="col-form-label">Quyền</label>
											<select class="form-select" aria-label="" name="newlevel" id="newlevel">
												<option selected value="0">Admin</option>
												<option value="1">Employee</option>
												<option value="2">Customer</option>
											</select>
										</div>
									</div>
									<?php
									if (isset($_SESSION["CREATE_SUCCESSFUL"])) {
										unset($_SESSION["CREATE_SUCCESSFUL"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-success" style="font-style: italic;">
												Tạo tài khoản thành công !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["DELETE_SUCCESS"])) {
										unset($_SESSION["DELETE_SUCCESS"]);
									?>
										<div id="deleteSuccessMessage" class="text-center mb-2">
											<p class="small mb-0 text-center text-success" style="font-style: italic;">
												Xóa tài khoản thành công !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["CREATE_ERROR_<6"])) {
										unset($_SESSION["CREATE_ERROR_<6"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Mật khẩu quá yếu !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["CREATE_ERROR_SPACE"])) {
										unset($_SESSION["CREATE_ERROR_SPACE"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Tên đăng nhập không được có khoảng trắng !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["CREATE_ERROR_EMPTY"])) {
										unset($_SESSION["CREATE_ERROR_EMPTY"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Không được để trống !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["CREATE_ERROR_EXIST"])) {
										unset($_SESSION["CREATE_ERROR_EXIST"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Tên đăng nhập đã tồn tại
											</p>
										</div>
									<?php }
									if (isset($_SESSION["CREATE_ERROR_LEVEL"])) {
										unset($_SESSION["CREATE_ERROR_LEVEL"]);
									?>
										<div class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Quyền không hợp lệ !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["DELETE_SUCCESS"])) {
										unset($_SESSION["DELETE_SUCCESS"]);
									?>
										<div id="deleteSuccessMessage" class="text-center mb-2">
											<p class="small mb-0 text-center text-success" style="font-style: italic;">
												Xóa tài khoản thành công !
											</p>
										</div>
									<?php }
									if (isset($_SESSION["DELETE_FAIL"])) {
										unset($_SESSION["DELETE_FAIL"]);
									?>
										<div id="deleteFailMessage" class="text-center mb-2">
											<p class="small mb-0 text-center text-danger" style="font-style: italic;">
												Xóa tài khoản thất bại !
											</p>
										</div>
									<?php } ?>
									<p id="roleUser2" type="button" class="text-decoration-underline text-danger col-sm-1" data-toggle="modal" data-target="#exampleModalLong">
										Chú thích
									</P>
									<div class="text-center">
										<button type="submit" class="btn btn-primary" value="create_btn" name="create_btn">Tạo</button>
									</div>
								</form>

							</div>
						</div>

						<div class="modal fade" id="roleText" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<form id="saveForm" method="post" action="detailreflect">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Chú thích</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<ul>
												<li>Phải điền đầy đủ các thông tin: <strong>Tên đăng nhập, Mật khẩu, Quyền</strong></li>
												<li>Mật khẩu phải có độ dài lớn hơn hoặc bằng <strong> 6 </strong></li>
												<li>Nếu tên đăng nhập có đuôi là:
													<ul>
														<li><strong>@gmail.com:</strong> được sử dụng các quyền <strong> Admin, Employee, Customer </strong></li>
														<li><strong> Không </strong> phải là đuôi @gmail.com: Chỉ được sử dụng các quyền <strong> Admin, Employee </strong></li>
													</ul>
												</li>
											</ul>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
											</div>
									</form>
								</div>
							</div>
						</div>
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
										<td style="text-align: center;" ><?= $userData['password'] ?></td>

										<td style="text-align: center;"><?= $userData['phone'] ?></td>
										<td style="text-align: center;"><?php
																		if ($userData['level'] == 0) {
																			echo 'Admin';
																		}
																		if ($userData['level'] == 1) {
																			echo "Employee";
																		}
																		if ($userData['level'] == 2) {
																			echo "Customer";
																		}
																		?></td>
										<td style="text-align: center;">
											<a href="javascript:void(0)" class="select-btn" data-id="<?= $userId ?>" data-email="<?= $userData['email'] ?>" data-fullname="<?= $userData['fullname'] ?>" data-password="<?= $userData['password'] ?>" data-phone="<?= $userData['phone'] ?>" data-level="<?= $userData['level'] ?>">
												Chọn
											</a>
										</td>
										<td style="text-align: center;">
											<a href="javascript:void(0)" class="delete-btn" data-id="<?= $userId ?>" data-email="<?= $userData['email'] ?>">Xóa</a>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<form id="deleteForm" method="POST" action="user">
							<input type="hidden" name="userId" id="userIdInput">
							<input type="hidden" name="email" id="emailInput">
							<input type="hidden" name="delete_btn">
						</form>
						<script>
							// Lắng nghe sự kiện click trên nút Xóa
							document.querySelectorAll('.delete-btn').forEach(button => {
								button.addEventListener('click', function() {
									// Lấy id từ thuộc tính data-id
									const userId = this.getAttribute('data-id');
									const email = this.getAttribute('data-email');
									// Hiển thị confirm dialog
									if (confirm("Bạn có muốn xóa tài khoản này không?")) {
										// Nếu người dùng chọn OK, gán userId vào input của form và submit form
										document.getElementById('userIdInput').value = userId;
										document.getElementById('emailInput').value = email;
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

	document.querySelector('button[name="update_btn"]').addEventListener('click', function(event) {
		// Lấy giá trị của các trường input
		const mtkValue = document.getElementById('txtmtk').value.trim();
		const tdnValue = document.getElementById('txttdn').value.trim();
		const mkValue = document.getElementById('txtmk').value.trim();

		// Kiểm tra xem các trường có dữ liệu không
		if (mtkValue === '' || tdnValue === '' || mkValue === '') {
			// Không hiển thị thông báo nếu có trường nào đó rỗng
			return;
		}
		// Hiển thị confirm dialog
		if (!confirm("Bạn có chắc chắn muốn cập nhật không?")) {
			// Nếu người dùng chọn Cancel, ngăn chặn việc submit form bằng cách ngăn chặn mặc định hành vi của nút
			event.preventDefault();
		}
	});


	const TAB_ACTIVE_KEY = 'tab-active';
	const defaultActive = 'profileEdit';
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

	setTimeout(function() {
		var deleteSuccessMessage = document.getElementById('deleteSuccessMessage');
		var deleteFailMessage = document.getElementById('deleteFailMessage');
		if (deleteSuccessMessage) {
			deleteSuccessMessage.style.display = 'none';
		}
		if (deleteFailMessage) {
			deleteFailMessage.style.display = 'none';
		}
	}, 5000);

	document.getElementById('roleUser').addEventListener('click', function() {
		var myModal = new bootstrap.Modal(document.getElementById('roleText'));
		myModal.show();

	});
	document.getElementById('roleUser2').addEventListener('click', function() {
		var myModal = new bootstrap.Modal(document.getElementById('roleText'));
		myModal.show();
	});
</script>