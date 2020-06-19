<div class="container mt-4">
	<h3>Daftar Dosen</h3>
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
						<form action="<?php echo BASIS_URL; ?>/data/dsn/cari" method="post">
							<div class="container">
								<div class="input-group">
									<input type="text" id="cari" name="cari" class="form-control" placeholder="NIPD atau Nama Dosen">
									<div class="input-group-append" id="button-addon4">
										<button type="submit" class="btn btn-outline-primary" type="button">Cari</button>
										<!-- <a href="<?php echo BASIS_URL; ?>/data/dsn/tambah" class="btn btn-outline-secondary" type="button">Tambah</a> -->
									</div>
								</div>
							</div>
						</form>
							
						<table class="table table-responsive table-striped table-hover mt-2">
							<thead>
								<tr>
									<th>No.</th>
									<th>ID Dosen</th>
									<th>Nama</th>
									<th>Gelar</th>
									<!-- <th>Prodi</th>
									<th>Angkatan</th>
									<th>Kelas</th> -->
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['lists'] as $dsn): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $dsn['dsn_id']; ?></td>
										<td class="text-left"><?php echo $dsn['dsn_nama']; ?></td>
										<td class="text-left"><?php echo $dsn['dsn_gelar']; ?></td>
										<!-- <td><?php echo $mhs['prodi']; ?></td>
										<td><?php echo $mhs['angkatan']; ?></td>
										<td><?php echo $mhs['kelas']; ?></td> -->
										<td><a href="<?php echo BASIS_URL . '/data/dsn/detail/' . $dsn['dsn_id']; ?>" class="badge badge-primary">Detail</a> <a href="<?php echo BASIS_URL . '/data/dsn/edit/' . $dsn['dsn_id']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/data/dsn/hapus/' . $dsn['dsn_id']; ?>" class="badge badge-danger">Hapus</a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/dsn/tambahin" method="post">
						<div class="form-group">
							<label for="dsn_id">ID Dosen</label>
							<input type="text" name="dsn_id" id="dsn_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Nomor Dosen..." readonly>
							<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
						</div>
						<div class="form-group">
							<label for="dsn_nipd">NIPD/NIDN/NIP</label>
							<input type="text" name="dsn_nipd" id="dsn_nipd" class="form-control" placeholder="Masukkan NIPD/NIDN/NIP Dosen..." required>
						</div>
						<div class="form-group">
							<label for="dsn_nama">Nama Dosen</label>
							<input type="text" name="dsn_nama" id="dsn_nama" class="form-control" placeholder="Masukkan Nama Dosen..." required>
						</div>
						<div class="form-group">
							<label for="dsn_gelar">Gelar Dosen</label>
							<input type="text" name="dsn_gelar" id="dsn_gelar" class="form-control" placeholder="Masukkan Gelar Dosen..." required>
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