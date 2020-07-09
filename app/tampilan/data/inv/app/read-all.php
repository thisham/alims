<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<?php $no = 1; ?>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="daftar-tab" data-toggle="tab" href="#daftar" role="tab">Daftar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="jumlah-tab" data-toggle="tab" href="#jumlah" role="tab">Jumlah</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab">Tambah</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="daftar" role="tabpanel">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="text-center">
								<tr>
									<th>ID Alat</th>
									<th>Nama Alat</th>
									<th>Label</th>
									<th>Kondisi</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['lists'] == NULL): ?>
									<tr>
										<td class="text-center" colspan="4">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['lists'] as $app): ?>
										<tr>
											<td><a href="<?php echo BASIS_URL . '/data/app/detail/' . $app['app_id']; ?>"><?php echo $app['app_id']; ?></a></td>
											<td><?php echo $app['app_nama']; ?></td>
											<td><?php echo $app['app_label']; ?></td>
											<td><?php echo $app['app_kondisi']; ?></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="jumlah" role="tabpanel">
					<?php $no = 1; ?>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead class="text-center">
								<tr>
									<th>No.</th>
									<th>Nama Alat</th>
									<th>Label</th>
									<th>Dipakai</th>
									<th>Rusak</th>
									<th>Tersedia</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php if ($data['tools'] == NULL): ?>
									<tr>
										<td colspan="7">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['tools'] as $jpp): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td class="text-left"><?php echo $jpp['app_nama']; ?></td>
											<td><?php echo $jpp['app_label']; ?></td>
											<td><?php echo $jpp['app_dipakai']['total']; ?></td>
											<td><?php echo $jpp['app_rusak']['total']; ?></td>
											<td><?php echo $jpp['app_tersedia']['total']; ?></td>
											<td><?php echo $jpp['app_total']['total']; ?></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/app/tambahin" method="post">
						<div class="form-group">
							<label for="app_nama">Nama Alat</label>
							<input type="text" name="app_nama" id="app_nama" class="form-control" placeholder="Masukkan Nama Alat..." required>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="app_label">Kode Label Alat</label>
									<input type="text" name="app_label" id="app_label" class="form-control" placeholder="Masukkan Kode Label Alat..." pattern="[A-Z]{2}" required>
									<small class="text-muted">Bantuan: Harus berisi dua huruf kapital. Contoh: GU, LU, dll.</small>
								</div>
								<div class="col">
									<label for="app_volume">Volume Alat</label>
									<input type="number" name="app_volume" id="app_volume" class="form-control" placeholder="Masukkan Volume Alat..." min="0" max="9999" required>
									<small class="text-muted">Bantuan: Diisi dengan volume alat (hanya angka maks. 4 digit).</small>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="app_jumlah">Jumlah Alat</label>
							<input type="number" name="app_jumlah" id="app_jumlah" class="form-control" placeholder="Masukkan Jumlah Alat..." required>
						</div>
						<div class="form-group">
							<input type="submit" name="app_kirim" id="app_kirim" class="form-control btn btn-primary" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>