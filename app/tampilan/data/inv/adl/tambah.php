<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/adl/tambahin" method="post">
					<div class="form-group">
						<label for="adl_id">Kode (Mulai Input) Alat</label>
						<input type="text" name="adl_id" id="adl_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Alat Paten..." readonly>
						<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
					</div>
					<div class="form-group">
						<label for="adl_nama">Nama Alat Paten</label>
						<input type="text" name="adl_nama" id="adl_nama" class="form-control" placeholder="Masukkan Nama Alat Paten...">
					</div>
					<div class="form-group">
						<label for="adl_anggaran">Anggaran Alat Paten</label>
						<input type="text" name="adl_anggaran" id="adl_anggaran" class="form-control" placeholder="Masukkan Sumber Anggaran Alat Paten...">
						<small class="text-muted">Contoh : Hibah WHO th. 2014, Inventaris UI th. 1993</small>
					</div>
					<div class="form-group">
						<label for="adl_letak">Letak Alat Paten</label>
						<select class="form-control" name="adl_letak" id="adl_letak">
							<option value="">-- Pllih Laboratorium --</option>
							<?php foreach ($data['labs'] as $lab): ?>
								<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="adl_merek">Merek Alat Paten</label>
						<input type="text" name="adl_merek" id="adl_merek" class="form-control" placeholder="Masukkan Merek Alat Paten...">
						<small class="text-muted">Contoh : Yazumi, Boeco</small>
					</div>
					<div class="form-group">
						<label for="adl_tipe">Tipe Alat Paten</label>
						<input type="text" name="adl_tipe" id="adl_tipe" class="form-control" placeholder="Masukkan Tipe Produk Alat Paten...">
						<small class="text-muted">Contoh : YX-01029, dll.</small>
					</div>
					<div class="form-group">
						<label for="adl_spesifikasi">Spesifikasi/Deskripsi Alat Paten</label>
						<textarea class="form-control" name="adl_spesifikasi" id="adl_spesifikasi" placeholder="Masukkan Spesifikasi Alat Paten..."></textarea>
						<small class="text-muted">Hint : Masukkan sedetail mungkin.</small>
					</div>
					<div class="form-group">
						<label for="adl_tanggal">Tanggal Inventaris Alat Paten</label>
						<input type="date" name="adl_tanggal" id="adl_tanggal" class="form-control" placeholder="Masukkan Lokasi Alat Paten...">
						<small class="text-muted">Hint : Tanggal penerimaan alat.</small>
					</div>
					<div class="form-group">
						<label for="adl_noinv">Nomor Inventaris Lembaga Alat Paten</label>
						<input type="text" name="adl_noinv" id="adl_noinv" class="form-control" placeholder="Masukkan Nomor Inventaris Alat Paten...">
						<small class="text-muted">Contoh : UI/FT/1993/HIBAH-LLDIKTI/YAZUMI/YX-01029/001</small>
					</div>
					<div class="form-group">
						<label for="adl_jumlah">Jumlah Alat Paten</label>
						<input type="number" name="adl_jumlah" id="adl_jumlah" class="form-control" placeholder="Masukkan Jumlah Alat Paten...">
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>