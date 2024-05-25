	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 625px;">
		<div class="mb-2 d-flex justify-content-end">
			<div class="col-md-2">
				<select class="form-select float-end" id="subjectFilter">
					<option value="allHandle">Tất cả</option>
					<option value="processed">Đã xử lý</option>
					<option value="processing">Đang xử lý</option>
				</select>
			</div>
		</div>
		<section class="section">
			<div class="row">
				<div class="col-lg-12">

					<div class="card" id="allHandle">
						<div class="card-body">
							<h5 class="card-title">Danh sách phản ánh</h5>


							<div class="row mb-3">
								<div class="col-md-4">
									<input type="text" id="searchInputReflect1" class="form-control mb-3" placeholder="Tìm kiếm phản ánh...">
								</div>
							</div>

							<table class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã phản ánh</th>
										<th scope="col">Tác giả</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Loại</th>
										<th scope="col">Ngày phản ánh</th>
										<th scope="col">Handle</th>
										<th scope="col">Duyệt</th>
										<th scope="col">Chi tiết</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="content-table-reflect-1">
									<?php
									$i = 1;
									foreach ($allReflects as $reflectId => $reflectData) {
										$timestamp = $reflectData['createdAt'];
										$date = date('d-m-Y H:i:s', $timestamp / 1000);
									?>
										<tr class="td-item" style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<?php // echo $reflectId 
											?>
											<td style="text-align: center;"><?= $reflectData["id"]; ?></td>
											<td style="text-align: center;"><?= $reflectData['email']; ?></td>
											<td style="text-align: center;"><?= $reflectData['title']; ?></td>
											<!-- == 1: Đã xử lý
												== 0: Đang xử lý
											-->
											<td style="text-align: center;"><?= $reflectData['category_name']; ?></td>
											<td style="text-align: center;"><?= $date; ?></td>
											<?php if ($reflectData['handle'] == 0) { ?>
												<td style="text-align: center;" class="text-primary">Đã xử lý</td>
											<?php } else { ?>
												<td style="text-align: center;" class="text-danger">Đang xử lý</td>
											<?php } ?>

											<?php if ($reflectData['accept']) { ?>
												<td style="text-align: center;">
													<i class="bi bi-check"></i>
												</td>
											<?php } else { ?>
												<td style="text-align: center;">
													<i class="bi bi-x"></i>
												</td>
											<?php } ?>
											<td style="text-align: center;"><a href="detailreflect?detail=<?= $reflectData["id"]; ?>">Xem</a></td>
											<td style="text-align: center;">
												<a href="javascript:void(0)" class="delete-btn" data-id="<?= $reflectData["id"]; ?>">Xóa</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>

							<div class="text-center disnone">
								<?php
								if (isset($_SESSION['delete_fail'])) {
									echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['delete_fail'] . "</em></p>";
									unset($_SESSION['delete_fail']);
								}
								if (isset($_SESSION['delete_success'])) {
									echo '<p class="font-italic text-success mt-1"><em>' . $_SESSION['delete_success'] . "</em></p>";
									unset($_SESSION['delete_success']);
								}
								?>
							</div>

							<ul class="listPage-reflect-1"></ul>

							<form id="deleteForm" method="POST" action="detailreflect">
								<input type="hidden" name="reflectId" id="reflectIdInput">
								<input type="hidden" name="delete_btn">
							</form>

						</div>
					</div>

					<div class="card" id="processedHandle" style="display: none;">
						<div class="card-body">
							<h5 class="card-title">Danh sách đã xử lý</h5>

							<div class="row mb-3">
								<div class="col-md-4">
									<input type="text" id="searchInputReflect2" class="form-control mb-3" placeholder="Tìm kiếm phản ánh...">
								</div>
							</div>

							<table class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã phản ánh</th>
										<th scope="col">Tác giả</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Loại</th>
										<th scope="col">Ngày phản ánh</th>
										<th scope="col">Handle</th>
										<th scope="col">Duyệt</th>
										<th scope="col">Chi tiết</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="content-table-reflect-2">
									<?php
									$i = 1;
									foreach ($allReflects as $reflectId => $reflectData) {
										if ($reflectData['handle'] == 0) {

											$timestamp = $reflectData['createdAt'];
											$date = date('d-m-Y H:i:s', $timestamp / 1000);
									?>
											<tr class="td-item" style="vertical-align: middle;">
												<th scope="row" style="text-align: center;"><?= $i++; ?></th>
												<td style="text-align: center;"><?= $reflectData["id"]; ?></td>
												<td style="text-align: center;"><?= $reflectData['email']; ?></td>
												<td style="text-align: center;"><?= $reflectData['title']; ?></td>
												<!-- == 1: Đã xử lý
												== 0: Đang xử lý
											-->
												<td style="text-align: center;"><?= $reflectData['category_name']; ?></td>
												<td style="text-align: center;"><?= $date; ?></td>
												<?php if ($reflectData['handle'] == 0) { ?>
													<td style="text-align: center;" class="text-primary">Đã xử lý</td>
												<?php } else { ?>
													<td style="text-align: center;" class="text-danger">Đang xử lý</td>
												<?php } ?>

												<?php if ($reflectData['accept']) { ?>
													<td style="text-align: center;">
														<i class="bi bi-check"></i>
													</td>
												<?php } else { ?>
													<td style="text-align: center;">
														<i class="bi bi-x"></i>
														<!-- <button type="button" class="btn btn-danger">Duyệt</button> -->
													</td>
												<?php } ?>
												<td style="text-align: center;"><a href="detailreflect?detail=<?= $reflectData["id"]; ?>">Xem</a></td>
												<td style="text-align: center;">
													<a href="javascript:void(0)" class="delete-btn" data-id="<?= $reflectData["id"]; ?>">Xóa</a>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>

							<div class="text-center disnone">
								<?php
								if (isset($_SESSION['delete_fail'])) {
									echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['delete_fail'] . "</em></p>";
									unset($_SESSION['delete_fail']);
								}
								if (isset($_SESSION['delete_success'])) {
									echo '<p class="font-italic text-success mt-1"><em>' . $_SESSION['delete_success'] . "</em></p>";
									unset($_SESSION['delete_success']);
								}
								?>
							</div>

							<ul class="listPage-reflect-2"></ul>

						</div>
					</div>

					<div class="card" id="processingHandle" style="display: none;">
						<div class="card-body">
							<h5 class="card-title">Danh sách đã xử lý</h5>

							<div class="row mb-3">
								<div class="col-md-4">
									<input type="text" id="searchInputReflect3" class="form-control mb-3" placeholder="Tìm kiếm phản ánh...">
								</div>
							</div>

							<table class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã phản ánh</th>
										<th scope="col">Tác giả</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Loại</th>
										<th scope="col">Ngày phản ánh</th>
										<th scope="col">Handle</th>
										<th scope="col">Duyệt</th>
										<th scope="col">Chi tiết</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="content-table-reflect-3">
									<?php
									$i = 1;
									foreach ($allReflects as $reflectId => $reflectData) {
										if ($reflectData['handle'] == 1) {

											$timestamp = $reflectData['createdAt'];
											$date = date('d-m-Y H:i:s', $timestamp / 1000);
									?>
											<tr class="td-item" style="vertical-align: middle;">
												<th scope="row" style="text-align: center;"><?= $i++; ?></th>
												<td style="text-align: center;"><?= $reflectData["id"]; ?></td>
												<td style="text-align: center;"><?= $reflectData['email']; ?></td>
												<td style="text-align: center;"><?= $reflectData['title']; ?></td>
												<!-- == 1: Đã xử lý
												== 0: Đang xử lý
											-->
												<td style="text-align: center;"><?= $reflectData['category_name']; ?></td>
												<td style="text-align: center;"><?= $date; ?></td>
												<?php if ($reflectData['handle'] == 0) { ?>
													<td style="text-align: center;" class="text-primary">Đã xử lý</td>
												<?php } else { ?>
													<td style="text-align: center;" class="text-danger">Đang xử lý</td>
												<?php } ?>

												<?php if ($reflectData['accept']) { ?>
													<td style="text-align: center;">
														<i class="bi bi-check"></i>
													</td>
												<?php } else { ?>
													<td style="text-align: center;">
														<i class="bi bi-x"></i>
														<!-- <button type="button" class="btn btn-danger">Duyệt</button> -->
													</td>
												<?php } ?>
												<td style="text-align: center;"><a href="detailreflect?detail=<?= $reflectData["id"]; ?>">Xem</a></td>
												<td style="text-align: center;">
													<a href="javascript:void(0)" class="delete-btn" data-id="<?= $reflectData["id"]; ?>">Xóa</a>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>

							<div class="text-center disnone">
								<?php
								if (isset($_SESSION['delete_fail'])) {
									echo '<p class="font-italic text-danger mt-1"><em>' . $_SESSION['delete_fail'] . "</em></p>";
									unset($_SESSION['delete_fail']);
								}
								if (isset($_SESSION['delete_success'])) {
									echo '<p class="font-italic text-success mt-1"><em>' . $_SESSION['delete_success'] . "</em></p>";
									unset($_SESSION['delete_success']);
								}
								?>
							</div>

							<ul class="listPage-reflect-3"></ul>

						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

	<script>
		function removeVietnameseTones(str) {
			str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
			str = str.replace(/đ/g, "d").replace(/Đ/g, "D");
			return str;
		}

		function filterTable() {
			const searchValue = removeVietnameseTones(document.getElementById('searchInputReflect1').value.toLowerCase());
			const rows = document.querySelectorAll('.content-table-reflect-1 tr');

			rows.forEach(row => {
				const title = removeVietnameseTones(row.querySelectorAll('td')[2].textContent.toLowerCase());
				const category = removeVietnameseTones(row.querySelectorAll('td')[3].textContent.toLowerCase());
				const address = removeVietnameseTones(row.querySelectorAll('td')[4].textContent.toLowerCase());

				if (title.includes(searchValue) || category.includes(searchValue) || address.includes(searchValue)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		}

		document.getElementById('searchInputReflect1').addEventListener('keyup', filterTable);

		// ------------------------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------------------------

		function filterTable() {
			const searchValue = removeVietnameseTones(document.getElementById('searchInputReflect2').value.toLowerCase());
			const rows = document.querySelectorAll('.content-table-reflect-2 tr');

			rows.forEach(row => {
				const title = removeVietnameseTones(row.querySelectorAll('td')[2].textContent.toLowerCase());
				const category = removeVietnameseTones(row.querySelectorAll('td')[3].textContent.toLowerCase());
				const address = removeVietnameseTones(row.querySelectorAll('td')[4].textContent.toLowerCase());

				if (title.includes(searchValue) || category.includes(searchValue) || address.includes(searchValue)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		}

		document.getElementById('searchInputReflect2').addEventListener('keyup', filterTable);

		// ------------------------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------------------------

		function filterTable() {
			const searchValue = removeVietnameseTones(document.getElementById('searchInputReflect3').value.toLowerCase());
			const rows = document.querySelectorAll('.content-table-reflect-3 tr');

			rows.forEach(row => {
				const title = removeVietnameseTones(row.querySelectorAll('td')[2].textContent.toLowerCase());
				const category = removeVietnameseTones(row.querySelectorAll('td')[3].textContent.toLowerCase());
				const address = removeVietnameseTones(row.querySelectorAll('td')[4].textContent.toLowerCase());

				if (title.includes(searchValue) || category.includes(searchValue) || address.includes(searchValue)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		}

		document.getElementById('searchInputReflect3').addEventListener('keyup', filterTable);


		document.addEventListener("DOMContentLoaded", function() {
			const subjectFilter = document.getElementById("subjectFilter");
			const allHandle = document.getElementById("allHandle");
			const processedHandle = document.getElementById("processedHandle");
			const processingHandle = document.getElementById("processingHandle");

			subjectFilter.addEventListener("change", function() {
				const selectedSubject = subjectFilter.value;

				if (selectedSubject === "allHandle") {
					console.log("1")
					allHandle.style.display = "block";
					processedHandle.style.display = "none";
					processingHandle.style.display = "none";
				} else if (selectedSubject === "processed") {
					console.log("2")
					allHandle.style.display = "none";
					processedHandle.style.display = "block";
					processingHandle.style.display = "none";
				} else if (selectedSubject === "processing") {
					console.log("3")
					allHandle.style.display = "none";
					processedHandle.style.display = "none";
					processingHandle.style.display = "block";
				}
			});
		});

		// Lắng nghe sự kiện click trên nút Xóa
		document.querySelectorAll('.delete-btn').forEach(button => {
			button.addEventListener('click', function() {
				const reflectId = this.getAttribute('data-id');
				if (confirm("Bạn chắc chắn có muốn xóa không?")) {
					document.getElementById('reflectIdInput').value = reflectId;
					document.getElementById('deleteForm').submit();
				}
			});
		});

		setTimeout(function() {
			// Ẩn thẻ chứa SESSION
			document.querySelector('.disnone').style.display = 'none';
		}, 5000);
	</script>