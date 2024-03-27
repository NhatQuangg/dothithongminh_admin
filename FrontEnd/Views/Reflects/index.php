	<!-- =============== Main ============== -->
	<main id="main" class="main" style="min-height: 625px;">
		<section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Danh sách phản ánh</h5>
							<!-- Table with stripped rows -->

							<table class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center; vertical-align: middle;">
										<th scope="col">#</th>
										<th scope="col">Mã phản ánh</th>
										<th scope="col">Tác giả</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Loại</th>
										<th scope="col">Địa chỉ</th>
										<th scope="col">Ngày phản ánh</th>
										<th scope="col">Handle</th>
										<th scope="col">Duyệt</th>
										<th scope="col">Chi tiết</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($allReflects as $reflectId => $reflectData) {
										$timestamp = $reflectData['createdAt'];
										$date = date('d-m-Y H:i:s', $timestamp / 1000);
									?>
										<tr style="vertical-align: middle;">
											<th scope="row" style="text-align: center;"><?= $i++; ?></th>
											<td style="text-align: center;"><?= $reflectId ?></td>
											<td style="text-align: center;"><?= $reflectData['email']; ?></td>
											<td style="text-align: center;"><?= $reflectData['title']; ?></td>
											<!-- == 1: Đã xử lý
												== 0: Đang xử lý
											-->
											<td style="text-align: center;"><?= $reflectData['category_name']; ?></td>
											<td style="text-align: center;"><?= $reflectData['address']; ?></td>
											<td style="text-align: center;"><?= $date; ?></td>
											<?php if ($reflectData['handle'] == 1) {?>
												<td style="text-align: center;">Đã xử lý</td>
											<?php } else { ?>
												<td style="text-align: center;">Đang xử lý</td>
											<?php } ?>

											<?php if ($reflectData['accept']) {?>
												<td style="text-align: center;">
													<i class="bi bi-check"></i>
												</td>
											<?php } else {?>
											<td style="text-align: center;">
											<button type="button" class="btn btn-danger">Duyệt</button>
											</td>
											<?php } ?>
											<td style="text-align: center;"><a href="">Xem</a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<!-- End Table with stripped rows -->
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

