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
										<label for="inputText" class="col-sm-3 col-form-label" style="font-style: italic;">Địa chỉ</label>
										<div class="col-sm-9">
											<p class="form-control form-control-plaintext"><?= $reflect['address'] ?></p>
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
										<label for="inputText" class="col-sm-4 col-form-label" style="font-style: italic;">Họ tên</label>
										<div class="col-sm-8">
											<p class="form-control form-control-plaintext"><?= $reflect['email'] ?></p>
										</div>
									</div>
									<div class="row">
										<label for="inputText" class="col-sm-4 col-form-label" style="font-style: italic;">Ngày đăng</label>
										<div class="col-sm-8">
											<p class="form-control form-control-plaintext"><?= $date ?></p>
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
													<p class="form-control form-control-plaintext" style="color: red; font-style: italic;"><?= $reflect['processingDeadline'] ?></p>
												</div>
											</div>
											<div class="row">
												<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Phản hồi <?= $index + 1 ?></label>
												<div class="col-sm-10">
													<p id="feedbackContent" class="form-control form-control-plaintext"><?= $contentFeedbacks['content'] ?></p>
												</div>
											</div>
											<!-- Nút Sửa -->
											<div class="row">
												<div class="col-sm-10 offset-sm-2">
													<button type="button" class="btn btn-warning edit-button" data-feedback="<?= $contentFeedbacks['content'] ?>">Sửa</button>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="row g-3 mb-3">
									<label for="inputText" class="col-sm-2 col-form-label" style="font-style: italic;">Phản hồi</label>
									<div class="col-sm-10">
										<textarea class="form-control" id="reflectFeedback" name="reflectFeedback" rows="5" required></textarea>
									</div>
								</div>

								<input type="hidden" name="id_reflect" id="id_reflect" value="<?= $reflectId; ?>">
								<input type="hidden" name="save" id="save" value="-1">

								<div class="row g-3 mb-3">
									<div class="col-md-12 d-flex justify-content-end">
										<button type="submit" class="btn btn-danger" id="save_feedback" value="save_feedback" name="save_feedback">Lưu</button>
									</div>
								</div>
							<?php } ?>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const editButtons = document.querySelectorAll('.edit-button');
		editButtons.forEach(button => {
			button.addEventListener('click', function() {
				const feedbackContent = this.getAttribute('data-feedback');
				const feedbackTextarea = document.getElementById('reflectFeedback');
				feedbackTextarea.value = feedbackContent;
				feedbackTextarea.scrollIntoView({ behavior: 'smooth', block: 'center' });
			});
		});
	});
</script>
