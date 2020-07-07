<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<?php $no = 1; ?>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="daftar-tab" data-toggle="tab" href="#data" role="tab">Detail</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#atur" role="tab">Pengaturan</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="data" role="tabpanel">
					<div class="table-resposive">
						<table class="table table-striped">
							<tr>
								<th>User ID</th>
								<td><?php echo $data['usr']['user_id']; ?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $data['usr']['nama']; ?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php echo $retVal = ($data['usr']['gender'] != '') ? $data['usr']['gender'] : 'Tidak diberitahu' ; ?></td>
							</tr>
							<tr>
								<th>Hak Akses</th>
								<td><?php echo $data['usr']['hak_akses']; ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $data['usr']['status']; ?></td>
							</tr>
							<tr>
								<th>Tentang Saya</th>
								<td><?php echo $data['usr']['bio']; ?></td>
							</tr>
							<tr>
								<th colspan="2" class="text-center"><h5><strong>Informasi Kontak</strong></h5></th>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><?php echo $data['usr']['email']; ?></td>
							</tr>
							<tr>
								<th>No. HP/WA</th>
								<td><?php echo $data['usr']['hp']; ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="atur" role="tabpanel">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Perubahan Data Akun</h5>
							<hr>
							<form action="<?php echo BASIS_URL . '/akun/update/datadiri'; ?>">
								<div class="table-resposive">
									<table class="table table-striped">
										<tr>
											<th>User ID</th>
											<td><input type="text" name="user_id" id="user_id" autocomplete="off" value="<?php echo $data['usr']['user_id']; ?>" class="form-control" readonly></td>
										</tr>
										<tr>
											<th>Nama</th>
											<td><input type="text" name="nama" id="nama" autocomplete="off" value="<?php echo $data['usr']['nama']; ?>" class="form-control" placeholder="Siapa nama Anda?" required></td>
										</tr>
										<tr>
											<th>Jenis Kelamin</th>
											<td>
												<select name="gender" id="gender" class="form-control" value="<?php echo $data['usr']['gender']; ?>">
													<option>-- Pilih Jenis Kelamin --</option>
													<option value="Laki-Laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</td>
										</tr>
										<tr>
											<th>Tentang Saya</th>
											<td><textarea class="form-control" placeholder="Ceritakan tentang diri Anda..."><?php echo $data['usr']['bio']; ?></textarea></td>
										</tr>
										<tr>
											<th colspan="2" class="text-center"><h5><strong>Informasi Kontak</strong></h5></th>
										</tr>
										<tr>
											<th>E-mail</th>
											<td><input type="text" name="email" id="email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z.]{2, 4}$" class="form-control" placeholder="Masukkan Alamat E-Mail Anda..." value="<?php echo $data['usr']['email']; ?>"></td>
										</tr>
										<tr>
											<th>No. HP/WA</th>
											<td><input type="tel" name="hp" id="hp" autocomplete="off" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3,}" class="form-control" placeholder="Masukkan Nomor Telepon (WhatsApp)..." value="<?php echo $data['usr']['hp']; ?>" required>
											<small class="text-muted">Format: 0812-3456-78910 (13 digit), 0812-3456-7890 (12 digit) atau 0812-3456-789 (11 digit).</small></td>
										</tr>
									</table>
								</div>
								<div class="form-group">
									<input type="submit" name="kirim" id="kirim" class="form-control btn btn-primary" value="Kirim Perubahan">
								</div>
							</form>
						</div>
					</div>
					<div class="card mt-2">
						<div class="card-body">
							<h5 class="card-title">Perubahan Kondisi Akun</h5>
							<hr>
							<div class="alert alert-danger">Perubahan ini membutuhkan konfirmasi Admin untuk memulihkannya.</div>
							<div class="table-responsive">
								<form action="<?php echo BASIS_URL . '/akun/update/dataakun'; ?>" method="post">
									<table class="table table-striped">
										<tr>
											<th>My Account</th>
											<td>
												<select value="<?php echo $data['usr']['status']; ?>" class="form-control">
													<option value="">-- Pilih Kondisi --</option>
													<option value="Aktif">Aktif</option>
													<option value="Blokir">Blokir</option>
													<option value="Inaktif">Inaktivasi</option>
												</select>
											</td>
										</tr>
										<?php if ($data['usr']['hak_akses'] == 'Admin'): ?>
											<tr>
												<th>Hak Akses</th>
												<td>
													<select value="<?php echo $data['usr']['user_id'] . '/' . $data['usr']['hak_akses']; ?>" class="form-control">
														<option value="">-- Pilih Hak Akses --</option>
														<option value="<?php echo $data['usr']['user_id'] . '/Admin'; ?>">Admin</option>
														<option value="<?php echo $data['usr']['user_id'] . '/Laboran'; ?>">Laboran</option>
													</select>
												</td>
											</tr>
										<?php endif ?>
									</table>
									<div class="form-group">
										<input type="submit" name="kirim" id="kirim" class="form-control btn btn-primary" value="Kirim Perubahan">
									</div>
								</form>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>