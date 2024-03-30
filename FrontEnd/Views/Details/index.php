<main id="main" class="main">

	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">General Form Elements</h5>

						<?php
						foreach ($detailReflect as $reflect) {
							$timestamp = $reflect['createdAt'];
							$date = date('d-m-Y H:i:s', $timestamp / 1000);

						?>
							<!-- General Form Elements -->
							<form>
								<div class="row g-3">
									<div class="col-md-8">
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Tiêu đề</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['title'] ?></p>
											</div>
										</div>
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Danh mục</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['category_name'] ?></p>
											</div>
										</div>
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Tình trạng</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['handle'] ?></p>
											</div>
										</div>
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Nội dung</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['content'] ?></p>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Họ tên</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['email'] ?></p>
											</div>
										</div>
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Ngày đăng</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $date ?></p>
											</div>
										</div>
										<div class="row">
											<label for="inputText" class="col-sm-3 col-form-label">Địa chỉ</label>
											<div class="col-sm-9">
												<p class="form-control"><?= $reflect['address'] ?></p>
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

								<div class="col-md-6">
									<div class="row">
										<label for="inputText" class="col-sm-3 col-form-label">Nội dung phản hồi</label>
										<div class="col-sm-9">
											<p class="form-control">Nguyễn Xuân Sinh</p>
										</div>
									</div>
								</div>
					</div>

					</form><!-- End General Form Elements -->
				<?php } ?>
				</div>
			</div>
		</div>
		</div>
	</section>

</main><!-- End #main -->