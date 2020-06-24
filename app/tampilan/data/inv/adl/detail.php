<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab">Detail</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab">Riwayat</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="detail" role="tabpanel">
						<div class="table-responsive">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Kode Alat</th>
										<td><?php echo $data['infos']['adl_id']; ?></td>
									</tr>
									<tr>
										<th>Nama Alat</th>
										<td><?php echo $data['infos']['adl_nama']; ?></td>
									</tr>
									<tr>
										<th>Sumber Anggaran</th>
										<td><?php echo $data['infos']['adl_anggaran']; ?></td>
									</tr>
									<tr>
										<th>Letak Alat</th>
										<td>Laboratorium <?php echo $data['infos']['lab_nama']; ?> (<?php echo $data['infos']['lab_lokasi']; ?>)</td>
									</tr>
									<tr>
										<th>Merek</th>
										<td><?php echo $data['infos']['adl_merek']; ?></td>
									</tr>
									<tr>
										<th>Tipe</th>
										<td><?php echo $data['infos']['adl_tipe']; ?></td>
									</tr>
									<tr>
										<th>Tanggal Inventaris</th>
										<td><?php echo $data['infos']['adl_tanggal']; ?></td>
									</tr>
									<tr>
										<th>Nomor Inventaris</th>
										<td><?php echo $data['infos']['adl_noinv']; ?></td>
									</tr>
									<tr>
										<th>Spesifikasi/Deskripsi Alat Paten</th>
										<td><?php echo $data['infos']['adl_spesifikasi']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="riwayat" role="tabpanel">
						<?php $no = 1; ?>
						<div id="data-gnadl" class="table-responsive">
							<table class="table table-striped text-center">
								<thead>
									<tr class="text-center">
										<th>No.</th>
										<th>Kode</th>
										<th>Tanggal</th>
										<th>Nama Alat</th>
										<th>Awal</th>
										<th>Akhir</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($data['gnadl'] == NULL): ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data.</td>
										</tr>
									<?php else: ?>
										<?php foreach ($data['gnadl'] as $gnadl): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><a href="<?php echo BASIS_URL . '/gunakan/adl/detail/' . $gnadl['gnadl_id']; ?>"><?php echo $gnadl['gnadl_id']; ?></a></td>
												<td><?php echo $gnadl['gnadl_sign'] ?></td>
												<td><?php echo $gnadl['adl_nama']; ?></td>
												<td><?php echo $gnadl['gnadl_awal']; ?></td>
												<td>
													<?php if ($gnadl['gnadl_akhir'] == 0): ?>
														<div class="badge badge-warning">Belum Selesai</div>
													<?php else: ?>
														<?php echo $gnadl['gnadl_akhir']; ?></td>
													<?php endif ?>
												<td>
													<?php if ($gnadl['gnadl_awal'] != 0 AND $gnadl['gnadl_akhir'] == 0): ?>
														<div class="badge badge-success">Berjalan</div>
													<?php else: ?>
														<div class="badge badge-secondary">Selesai</div>
													<?php endif ?>
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>