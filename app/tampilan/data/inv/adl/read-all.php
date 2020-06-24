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
									<tr class="text-center">
										<th>No.</th>
										<th>Kode Alat</th>
										<th>Nama Alat</th>
										<th>Letak</th>
										<th>Merek - Tipe</th>
										<th>Anggaran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($data['lists'] == NULL): ?>
										<tr>
											<td colspan="7" class="text-center">Data tidak ditemukan.</td>
										</tr>
									<?php else: ?>
										<?php foreach ($data['lists'] as $adl): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><a href="<?php echo BASIS_URL . '/data/adl/detail/' . $adl['adl_id']; ?>"><?php echo $adl['adl_id']; ?></a></td>
												<td class="text-left"><?php echo $adl['adl_nama']; ?></td>
												<td class="text-left"><?php echo $adl['lab_nama']; ?></td>
												<td class="text-left"><?php echo $adl['adl_merek'] . ' - ' . $adl['adl_tipe']; ?></td>
												<td class="text-left"><?php echo $adl['adl_anggaran']; ?></td>
												<td>
													<div class="btn-group">
														<a href="<?php echo BASIS_URL . '/data/adl/edit/' . $adl['adl_id']; ?>" class="btn btn-warning btn-sm">Edit</a> <a href="<?php echo BASIS_URL . '/data/adl/hapus/' . $adl['adl_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
					<form action="<?php echo BASIS_URL; ?>/data/adl/tambahin" method="post">
						<p style="color: red;">*) Wajib Diisi.</p>
						<div class="form-group">
							<label for="adl_id">Kode (Mulai Input) Alat</label>
							<input type="text" name="adl_id" id="adl_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Alat dalam Laboratorium..." readonly required>
							<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
						</div>
						<div class="form-group">
							<label for="adl_nama">Nama Alat dalam Laboratorium *)</label>
							<input type="text" name="adl_nama" id="adl_nama" class="form-control" placeholder="Masukkan Nama Alat dalam Laboratorium..." required>
						</div>
						<div class="form-group">
							<label for="adl_anggaran">Anggaran Alat dalam Laboratorium *)</label>
							<input type="text" name="adl_anggaran" id="adl_anggaran" class="form-control" placeholder="Masukkan Sumber Anggaran Alat dalam Laboratorium..." required>
							<small class="text-muted">Contoh : Hibah WHO th. 2014, Inventaris UI th. 1993</small>
						</div>
						<div class="form-group">
							<label for="adl_letak">Letak Alat dalam Laboratorium *)</label>
							<select class="form-control" name="adl_letak" id="adl_letak" required>
								<option value="">-- Pllih Laboratorium --</option>
								<?php foreach ($data['labs'] as $lab): ?>
									<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="adl_merek">Merek Alat dalam Laboratorium</label>
							<input type="text" name="adl_merek" id="adl_merek" class="form-control" placeholder="Masukkan Merek Alat dalam Laboratorium...">
							<small class="text-muted">Contoh : Yazumi, Boeco</small>
						</div>
						<div class="form-group">
							<label for="adl_tipe">Tipe Alat dalam Laboratorium</label>
							<input type="text" name="adl_tipe" id="adl_tipe" class="form-control" placeholder="Masukkan Tipe Produk Alat dalam Laboratorium...">
							<small class="text-muted">Contoh : YX-01029, dll.</small>
						</div>
						<div class="form-group">
							<label for="adl_spesifikasi">Spesifikasi/Deskripsi Alat dalam Laboratorium</label>
							<textarea class="form-control" name="adl_spesifikasi" id="adl_spesifikasi" placeholder="Masukkan Spesifikasi Alat dalam Laboratorium..."></textarea>
							<small class="text-muted">Hint : Masukkan sedetail mungkin.</small>
						</div>
						<div class="form-group">
							<label for="adl_tanggal">Tanggal Inventaris Alat dalam Laboratorium</label>
							<input type="date" name="adl_tanggal" id="adl_tanggal" class="form-control" placeholder="Masukkan Lokasi Alat dalam Laboratorium...">
							<small class="text-muted">Hint : Tanggal penerimaan alat.</small>
						</div>
						<div class="form-group">
							<label for="adl_noinv">Nomor Inventaris Lembaga Alat dalam Laboratorium</label>
							<input type="text" name="adl_noinv" id="adl_noinv" class="form-control" placeholder="Masukkan Nomor Inventaris Alat dalam Laboratorium...">
							<small class="text-muted">Contoh : UI/FT/1993/HIBAH-LLDIKTI/YAZUMI/YX-01029/001</small>
						</div>
						<div class="form-group">
							<label for="adl_jumlah">Jumlah Alat dalam Laboratorium *)</label>
							<input type="number" name="adl_jumlah" id="adl_jumlah" class="form-control" placeholder="Masukkan Jumlah Alat dalam Laboratorium..." required>
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