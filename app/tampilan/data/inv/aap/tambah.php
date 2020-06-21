<div class="container mt-4">
	<h3>Tambah Alat Paten</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/aap/tambahin" method="post">
					<div class="form-group">
						<label for="aap_id">Kode (Mulai Input) Alat</label>
						<input type="text" name="aap_id" id="aap_id" class="form-control" value="<?php echo $data['baru']; ?>" placeholder="Masukkan Kode Alat Paten..." readonly>
						<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
					</div>
					<div class="form-group">
						<label for="aap_nama">Nama Alat Paten</label>
						<input type="text" name="aap_nama" id="aap_nama" class="form-control" placeholder="Masukkan Nama Alat Paten...">
					</div>
					<div class="form-group">
						<label for="aap_anggaran">Anggaran Alat Paten</label>
						<input type="text" name="aap_anggaran" id="aap_anggaran" class="form-control" placeholder="Masukkan Sumber Anggaran Alat Paten...">
						<small class="text-muted">Contoh : Hibah WHO th. 2014, Inventaris UI th. 1993</small>
					</div>
					<div class="form-group">
						<label for="aap_letak">Letak Alat Paten</label>
						<select class="form-control" name="aap_letak" id="aap_letak">
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
						<input type="number" name="aap_jumlah" id="aap_jumlah" class="form-control" placeholder="Masukkan Jumlah Alat Paten...">
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>