<div class="container mt-4">
	<h3>Data Mata Kuliah</h3>
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
						<div class="btn-group" role="group">
							<a href="<?php echo BASIS_URL; ?>/data/mtk/semua" class="btn btn-outline-secondary <?php if ($data['datas'] == 'semua') echo 'active'; ?>">Semua</a>
							<a href="<?php echo BASIS_URL; ?>/data/mtk/aktif" class="btn btn-outline-secondary <?php if ($data['datas'] == 'aktif') echo 'active'; ?>">Aktif</a>
							<a href="<?php echo BASIS_URL; ?>/data/mtk/pasca" class="btn btn-outline-secondary <?php if ($data['datas'] == 'pasca') echo 'active'; ?>">Tutup</a>
							<a href="<?php echo BASIS_URL; ?>/data/mtk/pra" class="btn btn-outline-secondary <?php if ($data['datas'] == 'pra') echo 'active'; ?>">Belum Dibuka</a>
							<a href="<?php echo BASIS_URL; ?>/data/mtk/invalid" class="btn btn-outline-secondary <?php if ($data['datas'] == 'invalid') echo 'active'; ?>">Invalid</a>
						</div>
						<table class="table table-responsive table-striped table-hover mt-2">
							<thead>
								<tr>
									<th>No.</th>
									<th>ID Matkul</th>
									<th>Nama Matkul</th>
									<th>Akronim</th>
									<th>Pengampu</th>
									<th>Periode</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['lists'] as $mtk): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $mtk['mtk_id']; ?></td>
										<td class="text-left"><?php echo $mtk['mtk_nama']; ?></td>
										<td class="text-left"><?php echo $mtk['mtk_akronim']; ?></td>
										<td class="text-left"><?php echo $mtk['dsn_nama']; ?></td>
										<td><?php echo $mtk['mtk_periode']; ?></td>
										<td>
											<?php if ($mtk['mtk_buka'] == 0 && $mtk['mtk_tutup'] == 0) { ?>
												<div class="badge badge-warning">Belum Aktif</div>
											<?php } else if ($mtk['mtk_buka'] != 0 && $mtk['mtk_tutup'] == 0) { ?>
												<div class="badge badge-success">Aktif</div>
											<?php } else if ($mtk['mtk_buka'] != 0 && $mtk['mtk_tutup'] != 0) { ?>
												<div class="badge badge-danger">Telah Berakhir</div>
											<?php } else { ?>
												<div class="badge badge-secondary">Invalid</div>
											<?php } ?>
										</td>
										<td>
											<div class="btn-group">
												<a href="<?php echo BASIS_URL . '/data/mtk/detail/' . $mtk['mtk_id']; ?>" class="btn btn-primary btn-sm">Detail</a>
												<a href="<?php echo BASIS_URL . '/data/mtk/edit/' . $mtk['mtk_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
												<a href="<?php echo BASIS_URL . '/data/mtk/hapus/' . $mtk['mtk_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/mtk/tambahin" method="post">
						<div class="form-group">
							<label for="mtk_id">ID Mata Kuliah</label>
							<input type="text" name="mtk_id" id="mtk_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan ID Mata Kuliah..." readonly required>
							<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
						</div>
						<div class="form-group">
							<label for="mtk_kode">Kode Mata Kuliah</label>
							<input type="text" name="mtk_kode" id="mtk_kode" class="form-control" placeholder="Masukkan Kode Mata Kuliah..." required>
							<small class="text-muted">Isi kode ini dengan kode mata kuliah yang ada di kurikulum.</small>
						</div>
						<div class="form-group">
							<label for="mtk_nama">Nama Mata Kuliah</label>
							<input type="text" name="mtk_nama" id="mtk_nama" class="form-control" placeholder="Masukkan Nama Mata Kuliah..." required>
						</div>
						<div class="form-group">
							<label for="mtk_akronim">Akronim Mata Kuliah</label>
							<input type="text" name="mtk_akronim" id="mtk_akronim" class="form-control" pattern="[A-Z0-9]{3,}" placeholder="Masukkan Akronim Mata Kuliah..." required="">
							<small class="text-muted">Mohon buat akronim (singkatan) mata kuliah untuk mempermudah pemanggilan nama mata kuliah di log book. Gunakan huruf kapital atau angka minimal tiga (3) karakter.</small>
						</div>
						<div class="form-group">
							<label for="mtk_periode">Periode Mata Kuliah</label>
							<input type="text" name="mtk_periode" id="mtk_periode" class="form-control" value="<?php echo $data['tahun']; ?>" placeholder="Masukkan Periode Mata Kuliah..." readonly required>
							<small class="text-muted">Periode ini dibuat otomatis berdasarkan tahun dan semester. Semester ganjil dimulai pada September hingga Februari, semester genap dimulai pada Maret hingga Agustus.</small>
						</div>
						<div class="form-group">
							<label for="mtk_dosen">Pilih Dosen Pengampu</label>
							<select class="form-control" name="mtk_dosen" id="mtk_dosen" required>
								<option value="">-- Pllih Dosen --</option>
								<?php foreach ($data['dosen'] as $dosen): ?>
									<option value="<?php echo $dosen['dsn_id']; ?>"><?php echo $dosen['dsn_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
					
	<!-- <div class="card">
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
				<div class="tab-pane fade show active" id="daftar" role="tabpanel">...</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">...</div>
			</div>
		</div>
	</div> -->
</div>