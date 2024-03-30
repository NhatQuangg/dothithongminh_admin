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
						<h5 class="card-title">Chi tiết</h5>

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


											<!-- <div id="carouselExampleIndicators" class="carousel slide carousel-custom" data-ride="carousel" data-interval="false">
											<div class="carousel-indicators">
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
												<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
											</div>
											<div class="carousel-inner">
												<div class="carousel-item active">
													<img src="FrontEnd\assets\img\slides-1.jpg" class="d-block w-100" alt="...">
												</div>
												<div class="carousel-item">
													<img src="FrontEnd\assets\img\slides-2.jpg" class="d-block w-100" alt="...">
												</div>
												<div class="carousel-item">
													<img src="FrontEnd\assets\img\slides-4.jpg" class="d-block w-100" alt="...">
												</div>
											</div>

											<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div> -->
										</div>
									</div>
								</div>
								<div class="row g-3 mb-3">
									<div class="col-md-12">
										<div class="row">
											<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Nội dung phản hồi</label>
											<div class="col-sm-10">
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="row g-3">
									<label for="inputNumber" class="col-sm-2 col-form-label" style="font-style: italic;">File</label>
									<div class="col-sm-10">
										<input class="form-control" type="file" name="fileToUpload[]" id="fileToUpload" multiple onchange="previewFiles()">
										<div class="mt-2" id="preview"></div>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary" value="update_btn" name="update_btn">Cập nhật</button>
								</div>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

</main><!-- End #main -->

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
</script>