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
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab">Tambah</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="daftar" role="tabpanel">
					<center>
						<div class="table-responsive">
							<table class="table table-striped table-hover mt-2">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode Lab</th>
										<th>Nama Lab</th>
										<th>Lokasi</th>
										<th>Penanggung Jawab</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($data['lists'] == NULL): ?>
										<tr>
											<td colspan="6" class="text-center">Data tidak ditemukan.</td>
										</tr>
									<?php else: ?>
										<?php foreach ($data['lists'] as $lab): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><a href="<?php echo BASIS_URL . '/data/lab/detail/' . $lab['lab_id']; ?>"><?php echo $lab['lab_id']; ?></a></td>
												<td class="text-left"><?php echo $lab['lab_nama']; ?></td>
												<td class="text-left"><?php echo $lab['lab_lokasi']; ?></td>
												<td class="text-left"><?php echo $lab['nama']; ?></td>
												<td>
													<div class="btn-group">
														<a href="<?php echo BASIS_URL . '/data/lab/edit/' . $lab['lab_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
														<a href="<?php echo BASIS_URL . '/data/lab/hapus/' . $lab['lab_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
													</div>
														
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								</tbody>
							</table>
						</div>
							
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/lab/tambahin" method="post">
						<div class="form-group">
							<label for="lab_id">Kode Laboratorium</label>
							<input type="text" name="lab_id" id="lab_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Laboratorium..." readonly>
							<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
						</div>
						<div class="form-group">
							<label for="lab_nama">Nama Laboratorium</label>
							<input type="text" name="lab_nama" id="lab_nama" class="form-control" placeholder="Masukkan Nama Laboratorium..." required>
						</div>
						<div class="form-group">
							<label for="lab_laboran">Penanggung Jawab</label>
							<select class="form-control" name="lab_laboran" id="lab_laboran" required>
								<option value="">-- Pllih Laboran --</option>
								<?php foreach ($data['users'] as $laboran): ?>
									<option value="<?php echo $laboran['user_id']; ?>"><?php echo $laboran['nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="lab_lokasi">Lokasi Laboratorium</label>
							<input type="text" name="lab_lokasi" id="lab_lokasi" class="form-control" placeholder="Masukkan Lokasi Laboratorium...">
							<small class="text-muted">Contoh : Gedung A No. 204</small>
						</div>
						<div class="form-group">
							<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
					
</div>