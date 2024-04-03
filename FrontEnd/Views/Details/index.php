<style>
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

<main id="main" class="main">
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row g-3">

							<h5 class="card-title col-md-6">Chi tiết</h5>
							<?php
							foreach ($detailReflect as $reflect) {
								if ($reflect['handle'] == 1) {
							?>
									<div class="col-md-6">
										<div class="d-flex justify-content-end align-items-center" style="padding: 20px 0 15px 0;">
											<h5 style="color: red; margin: 5px 20px 5px 0px;">Đang xử lý</h5>
											<?php if ($reflect['accept'] == false) { ?>
												<button type="button" class="btn btn-outline-danger" id="acceptButton" value="accept" name="accept">Tiếp nhận</button>
											<?php } ?>
										</div>
									</div>
								<?php } else { ?>
									<h5 class="col-md-6 d-flex justify-content-end" style="padding: 20px; color: #15c;">Đã xử lý</h5>
							<?php }
							} ?>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="saveForm" method="post" action="detailreflect">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tiếp nhận</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<input type="hidden" name="id_reflect" id="id_reflect" value="<?= $reflectId; ?>">
											<input type="hidden" name="save" id="save" value="-1">

											<div class="mb-3">
												<label for="exampleFormControlInput1" class="form-label">Ngày hiện tại</label>
												<input type="date" class="form-control" id="currentDateInput" name="currentDateInput" readonly>
											</div>
											<div class="mb-3">
												<label for="exampleFormControlTextarea1" class="form-label">Hạn xử lý</label>
												<input type="date" class="form-control" id="processingDeadline" name="processingDeadline">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
												<button type="submit" class="btn btn-primary" id="save_time" value="save_time" name="save_time">Lưu</button>
											</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<?php
					foreach ($detailReflect as $reflect) {
						$timestamp = $reflect['createdAt'];
						$date = date('d-m-Y H:i:s', $timestamp / 1000);
					?>
						<form action="detailreflect" method="post" enctype="multipart/form-data">
							<div class="row g-3 mb-3">
								<div class="col-md-8">
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Tiêu đề</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext" style="font-weight: bold;"><?= $reflect['title'] ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Danh mục</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['category_name'] ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Tình trạng</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['handle'] ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Nội dung</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['content'] ?></p>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Họ tên</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['email'] ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Ngày đăng</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $date ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Địa chỉ</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['address'] ?></p>
										</div>
									</div>
									<div class="row">
										<div id="carouselExampleIndicators" class="carousel slide carousel-custom" data-ride="carousel" data-interval="false">
											<div class="carousel-inner">
												<?php foreach ($reflect['media'] as $index => $mediaUrl) { ?>
													<div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
														<?php
														$extension = pathinfo(parse_url($mediaUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
														// echo $extension;
														if ($extension === 'mp4') { ?>
															<video controls class="d-block w-100 media-item">
																<source src="<?= $mediaUrl ?>" type="video/mp4">
																Your browser does not support the video tag.
															</video>
														<?php } else { ?>
															<img src="<?= $mediaUrl ?>" class="d-block w-100 media-item" alt="...">
														<?php } ?>
													</div>
												<?php } ?>
											</div>
											<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div>
									</div>
								</div>
							</div>

							<!-- accept == true : Đã tiếp nhận -->
							<?php if ($reflect['accept'] == true) { ?>
								<?php foreach ($reflect['contentfeedback'] as $index => $contentFeedbacks) { ?>
									<div class="row g-3 mb-3">
										<div class="col-md-12">
											<div class="row">
												<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Thời hạn xử lý</label>
												<div class="col-sm-10">
													<p class="form-control form-control-plaintext"><?= $contentFeedbacks ?></p>
													<input type="hidden" name="timeAccept" id="timeAccept" value="<?= $contentFeedbacks; ?>">
												</div>
											</div>
										</div>
									</div>
									<?php break; ?>
								<?php } ?>
							<?php } ?>

							<!-- == 1 : Đang xử lý -->
							<!-- == 0 : Đã xử lý   -->
							<?php if ($reflect['handle'] == 1) { ?>
								<!-- content feefback input -->
								<div class="row g-3 mb-3">
									<div class="col-md-12">
										<div class="row">
											<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Nội dung phản hồi</label>
											<div class="col-sm-10">
												<textarea class="form-control" id="contentFeedback" rows="10" name="contentFeedback"></textarea>
											</div>
										</div>
									</div>
								</div>

								<!-- Upload File input -->
								<div class="row g-3">
									<label for="inputNumber" class="col-sm-2 col-form-label" style="font-style: italic;">File</label>
									<div class="col-sm-10">
										<input class="form-control" type="file" name="fileToUpload[]" id="fileToUpload" multiple onchange="previewFiles()">
										<div class="mt-2" id="preview"></div>
									</div>
								</div>

								<!-- Btn update input -->
								<div class="row g-3 mt-3">
									<div class="text-center">
										<input type="hidden" name="id_reflect" id="id_reflect" value="<?= $reflectId; ?>">
										<button type="submit" class="btn btn-primary" id="update_btn" value="update_btn" name="update_btn">Cập nhật</button>
									</div>
								</div>
							<?php
							} else {
							?>
								<!-- contentfeedback -->
								<div class="row g-3 mb-3">
									<div class="col-md-12">
										<div class="row">
											<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Nội dung phản hồi</label>
											<div class="col-sm-10">
												<p class="form-control form-control-plaintext" style="  text-align: justify; text-justify: inter-word;">
													<?php
													$contentFeedbacks = $reflect['contentfeedback'];
													if (!empty($contentFeedbacks)) {
														$firstIteration = true;
														foreach ($contentFeedbacks as $contentFeedback) {
															if ($firstIteration) {
																$firstIteration = false;
																continue;
															}
															echo $contentFeedback;
														}
													} else
														echo "";
													?>
												</p>
											</div>
										</div>
									</div>
								</div>

								<!-- File -->
								<div class="row g-3">
									<label for="inputNumber" class="col-sm-2 col-form-label" style="font-style: italic;">File</label>
									<div class="col-sm-10">
										<div class="row">
											<?php $count = 0; ?>
											<?php foreach ($reflect['media'] as $index => $mediaUrl) { ?>
												<?php $extension = pathinfo(parse_url($mediaUrl, PHP_URL_PATH), PATHINFO_EXTENSION); ?>
												<div class="col-md-4">
													<?php if ($extension === 'mp4') { ?>
														<video controls class="d-block w-100 media-item">
															<source src="<?= $mediaUrl ?>" type="video/mp4">
															Your browser does not support the video tag.
														</video>
													<?php } else { ?>
														<img src="<?= $mediaUrl ?>" class="d-block w-100 media-item" alt="...">
													<?php } ?>
												</div>
												<?php $count++; ?>
												<?php if ($count % 3 == 0 && $count != count($reflect['media'])) { ?>
										</div>
										<div class="row">
										<?php } ?>
									<?php } ?>
										</div>
									</div>
								</div>

							<?php } ?>
						</form>
					<?php	} ?>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- End #main -->

<script>
	function previewFiles() {
		var preview = document.getElementById('preview');
		var files = document.getElementById('fileToUpload').files;

		preview.innerHTML = '';

		for (var i = 0; i < files.length; i++) {
			var file = files[i];
			var fileTypeIcon = getFileTypeIcon(file.type);

			// Cắt chuỗi tên tập tin nếu vượt quá 35 ký tự
			var fileNameText = file.name.length > 35 ? file.name.substring(0, 35) + '...' : file.name;
			var fileName = document.createElement('span');
			fileName.textContent = fileNameText;
			fileName.className = 'file-name'; // Đặt lớp cho phần tử <span> chứa văn bản

			var filePreview = document.createElement('div');
			filePreview.appendChild(fileTypeIcon);
			filePreview.appendChild(fileName);
			filePreview.className = 'file-preview'; // Thêm lớp CSS cho phần tử <div>

			preview.appendChild(filePreview);
		}
	}

	function getFileTypeIcon(fileType) {
		// Các loại tập tin và biểu tượng tương ứng
		var fileTypeIcons = {
			'image/jpeg': '🖼️', // Loại MIME cho ảnh JPEG
			'image/png': '🖼️', // Loại MIME cho ảnh PNG
			'video/mp4': '📹', // Loại MIME cho video MP4
			'application/pdf': '📄',
			'text/plain': '📄',
			'application/msword': '📄',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document': '📄',
			'application/vnd.ms-excel': '📄',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': '📄',
			'application/vnd.ms-powerpoint': '📄',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation': '📄',
			'application/zip': '📁',
			'application/x-rar-compressed': '📁',
			'application/x-tar': '📁',
			'application/x-7z-compressed': '📁',
			'application/vnd.android.package-archive': '📦',
			'application/x-msdownload': '📦',
			'application/x-diskcopy': '💾',
			'application/octet-stream': '📦',
			'application/x-sh': '📄',
			'application/x-csh': '📄',
			'application/x-executable': '📦',
			'application/java-archive': '📦',
			'application/javascript': '📄',
			'application/json': '📄',
			'application/xml': '📄',
			'text/html': '📄',
			'text/css': '📄',
			'text/csv': '📄',
			'text/calendar': '📄',
			'text/javascript': '📄',
			'text/php': '📄',
		};

		// Kiểm tra xem loại tập tin có tồn tại trong danh sách không
		if (fileType in fileTypeIcons) {
			var icon = document.createElement('span');
			icon.textContent = fileTypeIcons[fileType];
			return icon;
		} else {
			// Nếu không tìm thấy biểu tượng, trả về biểu tượng mặc định
			var defaultIcon = document.createElement('span');
			defaultIcon.textContent = '📁'; // Biểu tượng thư mục
			return defaultIcon;
		}
	}

	document.getElementById('acceptButton').addEventListener('click', function() {
		// Lấy ngày hiện tại
		var currentDate = new Date().toISOString().slice(0, 10);
		// Đặt giá trị cho input ngày hiện tại
		document.getElementById('currentDateInput').value = currentDate;

		// Hiển thị modal khi nút được nhấn
		var myModal = new bootstrap.Modal(document.getElementById('acceptModal'));
		myModal.show();

	});

	document.getElementById('saveForm').addEventListener('submit', function(event) {
		var currentDateInput = document.getElementById('currentDateInput').value;
		var processingDeadlineInput = document.getElementById('processingDeadline').value;

		if (currentDateInput == "" || processingDeadlineInput == "") {
			// Ngăn chặn gửi form
			event.preventDefault();
			alert('Không được để trống');
		}

		var currentDate = new Date(currentDateInput);
		var processingDeadline = new Date(processingDeadlineInput);

		// Kiểm tra nếu ngày hiện tại không nhỏ hơn ngày xử lý
		if (currentDate >= processingDeadline) {
			// Ngăn chặn gửi form
			event.preventDefault();
			// Hiển thị thông báo
			alert('Ngày hiện tại phải bé hơn ngày xử lý.');
		}
	});

	document.getElementById('update_btn').addEventListener('click', function(event) {
		<?php foreach ($detailReflect as $reflect) { ?>
			<?php if ($reflect['handle'] !== true) { ?>
				event.preventDefault(); // Ngăn chặn gửi form
				alert('Bạn chưa thực hiện việc tiếp nhận nên không thể Cập Nhật');
			<?php } ?>
		<?php } ?>
	});
</script>