<div class="container mt-4">
	<h3>Data Laboratorium</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<?php $no = 1; ?>
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
							<tr>
								<th>ID Laboratorium</th>
								<td><?php echo $data['labs']['lab_id']; ?></td>
							</tr>
							<tr>
								<th>Nama Laboratorium</th>
								<td><?php echo $data['labs']['lab_nama']; ?></td>
							</tr>
							<tr>
								<th>Lokasi Laboratorium</th>
								<td><?php echo $data['labs']['lab_lokasi']; ?></td>
							</tr>
							<tr>
								<th>Laboran</th>
								<td><?php echo $data['labs']['nama']; ?></td>
							</tr>
							<tr>
								<th>Total Penggunaan</th>
								<td><?php echo $data['gnlab']['baris']; ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="riwayat" role="tabpanel">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr class="text-center">
									<th>No.</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Laboratorium</th>
									<th>Rencana Praktikum</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['gnlab']['jamak'] as $gnlab): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><a href="<?php echo BASIS_URL . '/gunakan/lab/detail/' . $gnlab['gnlab_id']; ?>"><?php echo $gnlab['gnlab_id']; ?></a></td>
										<td><?php echo $gnlab['gnlab_sign'] ?></td>
										<td><?php echo $gnlab['lab_nama']; ?></td>
										<td><?php echo $gnlab['gnlab_plan']; ?></td>
										<td>
											<?php if ($gnlab['gnlab_awal'] == 0 AND $gnlab['gnlab_akhir'] == 0) { ?>
												<div class="badge badge-warning">Direncanakan</div>
											<?php } else if ($gnlab['gnlab_awal'] != 0 AND $gnlab['gnlab_akhir'] == 0) { ?>
												<div class="badge badge-success">Berjalan</div>
											<?php } else { ?>
												<div class="badge badge-secondary">Selesai</div>
											<?php } ?>
										</td>
										<td>
											<div class="btn-group">
												<a href="<?php echo BASIS_URL . '/gunakan/lab/edit/' . $gnlab['gnlab_id']; ?>" class="btn btn-warning btn-sm">E</a>
												<a href="<?php echo BASIS_URL . '/gunakan/lab/hapus/' . $gnlab['gnlab_id']; ?>" class="btn btn-danger btn-sm">X</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>