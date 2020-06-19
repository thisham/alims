<div class="container mt-4">
	<h3>Daftar Alat Paten</h3>
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
						<table class="table table-responsive table-striped table-hover mt-2">
							<thead>
								<tr>
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
								<?php foreach ($data['lists'] as $aap): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $aap['aap_id']; ?></td>
										<td class="text-left"><?php echo $aap['aap_nama']; ?></td>
										<td class="text-left"><?php echo $aap['lab_nama']; ?></td>
										<td class="text-left"><?php echo $aap['aap_merek'] . ' - ' . $aap['aap_tipe']; ?></td>
										<td class="text-left"><?php echo $aap['aap_anggaran']; ?></td>
										<td><a href="<?php echo BASIS_URL . '/data/aap/detail/' . $aap['aap_id']; ?>" class="badge badge-primary">Detail</a> <a href="<?php echo BASIS_URL . '/data/aap/edit/' . $aap['aap_id']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/data/aap/hapus/' . $aap['aap_id']; ?>" class="badge badge-danger">Hapus</a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/aap/tambahin" method="post">
						<div class="form-group">
							<label for="aap_id">Kode (Mulai Input) Alat</label>
							<input type="text" name="aap_id" id="aap_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Alat Paten..." readonly required>
							<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
						</div>
						<div class="form-group">
							<label for="aap_nama">Nama Alat Paten</label>
							<input type="text" name="aap_nama" id="aap_nama" class="form-control" placeholder="Masukkan Nama Alat Paten..." required>
						</div>
						<div class="form-group">
							<label for="aap_anggaran">Anggaran Alat Paten</label>
							<input type="text" name="aap_anggaran" id="aap_anggaran" class="form-control" placeholder="Masukkan Sumber Anggaran Alat Paten..." required>
							<small class="text-muted">Contoh : Hibah WHO th. 2014, Inventaris UI th. 1993</small>
						</div>
						<div class="form-group">
							<label for="aap_letak">Letak Alat Paten</label>
							<select class="form-control" name="aap_letak" id="aap_letak" required>
								<option value="">-- Pllih Laboratorium --</option>
								<?php foreach ($data['labs'] as $lab): ?>
									<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="aap_merek">Merek Alat Paten</label>
							<input type="text" name="aap_merek" id="aap_merek" class="form-control" placeholder="Masukkan Merek Alat Paten...">
							<small class="text-muted">Contoh : Yazumi, Boeco</small>
						</div>
						<div class="form-group">
							<label for="aap_tipe">Tipe Alat Paten</label>
							<input type="text" name="aap_tipe" id="aap_tipe" class="form-control" placeholder="Masukkan Tipe Produk Alat Paten...">
							<small class="text-muted">Contoh : YX-01029, dll.</small>
						</div>
						<div class="form-group">
							<label for="aap_spesifikasi">Spesifikasi/Deskripsi Alat Paten</label>
							<textarea class="form-control" name="aap_spesifikasi" id="aap_spesifikasi" placeholder="Masukkan Spesifikasi Alat Paten..."></textarea>
							<small class="text-muted">Hint : Masukkan sedetail mungkin.</small>
						</div>
						<div class="form-group">
							<label for="aap_tanggal">Tanggal Inventaris Alat Paten</label>
							<input type="date" name="aap_tanggal" id="aap_tanggal" class="form-control" placeholder="Masukkan Lokasi Alat Paten...">
							<small class="text-muted">Hint : Tanggal penerimaan alat.</small>
						</div>
						<div class="form-group">
							<label for="aap_noinv">Nomor Inventaris Lembaga Alat Paten</label>
							<input type="text" name="aap_noinv" id="aap_noinv" class="form-control" placeholder="Masukkan Nomor Inventaris Alat Paten...">
							<small class="text-muted">Contoh : UI/FT/1993/HIBAH-LLDIKTI/YAZUMI/YX-01029/001</small>
						</div>
						<div class="form-group">
							<label for="aap_jumlah">Jumlah Alat Paten</label>
							<input type="number" name="aap_jumlah" id="aap_jumlah" class="form-control" placeholder="Masukkan Jumlah Alat Paten..." required>
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