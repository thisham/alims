<div class="container mt-4">
	<h3>Data Mahasiswa</h3>
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
						<form action="<?php echo BASIS_URL; ?>/data/mhs/cari" method="post">
							<div class="container">
								<div class="input-group">
									<input type="text" id="cari" name="cari" class="form-control" placeholder="NIM atau Nama Mahasiswa">
									<div class="input-group-append" id="button-addon4">
										<button type="submit" class="btn btn-outline-primary" type="button">Cari</button>
									</div>
								</div>
							</div>
						</form>
							
						<table class="table table-responsive table-striped table-hover mt-2">
							<thead>
								<tr>
									<th>No.</th>
									<th>NIM</th>
									<th>Nama</th>
									<!-- <th>Prodi</th>
									<th>Angkatan</th>
									<th>Kelas</th> -->
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['lists'] == NULL): ?>
									<tr>
										<td colspan="4">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['lists'] as $mhs): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $mhs['nim']; ?></td>
											<td class="text-left"><?php echo $mhs['nama']; ?></td>
											<!-- <td><?php echo $mhs['prodi']; ?></td>
											<td><?php echo $mhs['angkatan']; ?></td>
											<td><?php echo $mhs['kelas']; ?></td> -->
											<td>
												<div class="btn-group">
													<a href="<?php echo BASIS_URL . '/data/mhs/detail/' . $mhs['nim']; ?>" class="btn btn-primary btn-sm">Detail</a>
													<a href="<?php echo BASIS_URL . '/data/mhs/edit/' . $mhs['nim']; ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="<?php echo BASIS_URL . '/data/mhs/hapus/' . $mhs['nim']; ?>" class="btn btn-danger btn-sm">Hapus</a>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
									
							</tbody>
						</table>
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/mhs/tambahin" method="post">
						<div class="form-group">
							<label for="nim">Nomor Induk Mahasiswa</label>
							<input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM..." required>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa..." required>
						</div>
						<div class="form-group">
							<label for="prodi">Program Studi</label>
							<select class="form-control" name="prodi" id="prodi" required>
								<option value="">-- Pllih Program Studi --</option>
								<?php foreach ($data['prodi'] as $prodi): ?>
									<option value="<?php echo $prodi['kode']; ?>"><?php echo $prodi['prodi']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="angkatan">Angkatan</label>
							<input type="text" name="angkatan" id="angkatan" class="form-control" placeholder="Masukkan Tahun Pendaftaran Mahasiswa (4 digit)..." pattern="[0-9]{4}" required>
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas Mahasiswa..." required>
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