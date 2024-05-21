<!-- =============== Main ============== -->
<main id="main" class="main" style="min-height: 625px;">
	<div class="mb-2 d-flex justify-content-end">
		<div class="col-md-2">
			<select class="form-select float-end" id="subjectFilter">
				<option value="all">Tất cả</option>
				<option value="category">Danh mục</option>
				<option value="account">Tài khoản</option>
			</select>
		</div>
	</div>
	<section class="section">
		<div class="row">
			<div class="col-lg-12" id="categoryTable" style="display: block;">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="card-title">Thông kê danh mục</h5>
							</div>
						</div>
						<div class="data_table">
							<!-- Table with stripped rows -->
							<table class="table table-bordered table-hover" id="table1">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã danh mục</th>
										<th scope="col">Tên danh mục</th>
										<th scope="col">Số lượng bài đăng</th>
										<!-- <th scope="col">Mật khẩu</th> -->
										<!-- <th scope="col">Số điện thoại</th> -->
										<!-- <th scope="col">Quyền</th> -->
									</tr>
								</thead>
								<tbody class="content-table-statistics-1">
									<?php
									$i = 1;
									foreach ($categoryReflectCounts as $categoryReflectCount) {
									?>
										<tr class="td-item" style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $categoryReflectCount['id_category'] ?></td>
											<td style="text-align: center;"><?= $categoryReflectCount['category_name'] ?></td>
											<td style="text-align: center;"><?= $categoryReflectCount['reflect_count'] ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<ul class="listPage-statistics-1"></ul>

							<!-- End Table with stripped rows -->
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-12" id="accountTable" style="display: block;">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="card-title">Thống kê tài khoản</h5>
							</div>
						</div>
						<div class="data_table">
						<table class="table table-bordered table-hover" id="table2">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã tài khoản</th>
										<th scope="col">Tên đăng nhập</th>
										<th scope="col">Tên tài khoản</th>
										<th scope="col">Số lượng bài đăng</th>
										<th scope="col">Đã xử lý</th>
										<th scope="col">Đang xử lý</th>
									</tr>
								</thead>
								<tbody class="content-table-statistics-2">
									<?php
									$i = 1;
									foreach ($usersWithReflectCounts  as $userWithReflectCount) {
									?>
										<tr class = "td-item" style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $userWithReflectCount['id_user'] ?></td>
											<td style="text-align: center;"><?= $userWithReflectCount['email'] ?></td>
											<td style="text-align: center;"><?= $userWithReflectCount['fullname'] ?></td>
											<td style="text-align: center;"><?= $userWithReflectCount['total_reflects'] ?></td>
											<td style="text-align: center;"><?= $userWithReflectCount['processed_reflects'] ?></td>
											<td style="text-align: center;"><?= $userWithReflectCount['processing_reflects'] ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<ul class="listPage-statistics-2"></ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		const subjectFilter = document.getElementById("subjectFilter");
		const categoryTable = document.getElementById("categoryTable");
		const accountTable = document.getElementById("accountTable");

		subjectFilter.addEventListener("change", function() {
			const selectedSubject = subjectFilter.value;

			if (selectedSubject === "all") {
				categoryTable.style.display = "block";
				accountTable.style.display = "block";
			} else if (selectedSubject === "category") {
				categoryTable.style.display = "block";
				accountTable.style.display = "none";
			} else if (selectedSubject === "account") {
				categoryTable.style.display = "none";
				accountTable.style.display = "block";
			}
		});
	});
</script>
