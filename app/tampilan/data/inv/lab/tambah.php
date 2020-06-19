<div class="container mt-4">
	<h3>Tambah Laboratorium</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/lab/tambahin" method="post">
					<div class="form-group">
						<label for="lab_id">Kode Laboratorium</label>
						<input type="text" name="lab_id" id="lab_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Laboratorium..." readonly>
						<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
					</div>
					<div class="form-group">
						<label for="lab_nama">Nama Laboratorium</label>
						<input type="text" name="lab_nama" id="lab_nama" class="form-control" placeholder="Masukkan Nama Laboratorium...">
					</div>
					<div class="form-group">
						<label for="lab_laboran">Penanggung Jawab</label>
						<select class="form-control" name="lab_laboran" id="lab_laboran">
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