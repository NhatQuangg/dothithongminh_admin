	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 800px;">
		<section class="section">
			<div class="row">
				<div class="col-lg-5">

					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Danh mục</h5>

							<form method="POST" action="category">
								<div class="row mb-3">
									<label for="" class="col-sm-4 col-form-label">Tên danh mục</label>
									<div class="col-sm-8">
										<input type="hidden" id="selectedCategoryId" name="selectedCategoryId">
										<input type="text" class="form-control" id="txtcategory" name="txtcategory" value="">
										<?php
										if (isset($_SESSION['create_success'])) {
											echo '<p class="font-italic text-success mt-1"><em>' . $_SESSION['create_success'] . "</em></p>";
											unset($_SESSION['create_success']);
										}
										if (isset($_SESSION['create_fail'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_fail'] . "</em></p>";
											unset($_SESSION['create_fail']);
										}
										if (isset($_SESSION['create_empty'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['create_empty'] . "</em></p>";
											unset($_SESSION['create_empty']);
										}
										
										if (isset($_SESSION['update_success'])) {
											echo '<p class="font-italic text-success mt-1"><em>' . $_SESSION['update_success'] . "</em></p>";
											unset($_SESSION['update_success']);
										}
										if (isset($_SESSION['update_fail'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_fail'] . "</em></p>";
											unset($_SESSION['update_fail']);
										}
										if (isset($_SESSION['update_empty'])) {
											echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['update_empty'] . "</em></p>";
											unset($_SESSION['update_empty']);
										}
										?>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary" value="create_btn" name="create_btn">Thêm</button>
									<button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
								</div>
							</form><!-- End Horizontal Form -->

						</div>
					</div>

				</div>

				<div class="col-lg-7">

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
										<th scope="col">Mã danh mục</th>
										<th scope="col">Tên danh mục</th>
										<th scope="col"></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="content-table">
									<?php
									$i = 1;
									foreach ($allCategory as $categoryId => $categoryData) {
									?>
										<tr class="td-item" style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $categoryId ?></td>
											<td style="text-align: center;"><?= $categoryData['category_name'] ?></td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="select-btn" data-id="<?= $categoryId ?>" data-name="<?= $categoryData['category_name'] ?>">Chọn</a>
											</td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="delete-btn" data-id="<?= $categoryId ?>">Xóa</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<ul class="listPage"></ul>


							<form id="deleteForm" method="POST" action="category">
								<input type="hidden" name="categoryId" id="categoryIdInput">
								<input type="hidden" name="delete_btn">
							</form>
							<script>
								// Lắng nghe sự kiện click trên nút Xóa
								document.querySelectorAll('.delete-btn').forEach(button => {
									button.addEventListener('click', function() {
										// Lấy id từ thuộc tính data-id
										const categoryId = this.getAttribute('data-id');
										// Hiển thị confirm dialog
										if (confirm("Bạn có muốn xóa loại có mã " + categoryId + " không?")) {
											// Nếu người dùng chọn OK, gán categoryId vào input của form và submit form
											document.getElementById('categoryIdInput').value = categoryId;
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
		// Chờ 5 giây trước khi ẩn thẻ
		setTimeout(function() {
			// Ẩn thẻ chứa SESSION
			document.querySelector('.font-italic.text-danger').style.display = 'none';
		}, 5000); // 5000 milliseconds = 5 giây
	</script>
	
	<script>
		// Lắng nghe sự kiện click trên nút Chọn
		document.querySelectorAll('.select-btn').forEach(button => {
			button.addEventListener('click', function() {
				// Lấy id và tên loại từ thuộc tính data
				const categoryId = this.getAttribute('data-id');
				const categoryName = this.getAttribute('data-name');
				// Cập nhật giá trị cho trường input hidden và trường input text
				document.getElementById('selectedCategoryId').value = categoryId;
				document.getElementById('txtcategory').value = categoryName;
			});
		});
	</script>
