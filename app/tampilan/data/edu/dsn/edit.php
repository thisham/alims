<div class="container mt-4">
	<h3>Tambah Dosen</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/dsn/editin" method="post">
					<div class="form-group">
						<label for="dsn_id">ID Dosen</label>
						<input type="text" name="dsn_id" id="dsn_id" class="form-control" value="<?php echo $data['dosen']['dsn_id']; ?>" placeholder="Masukkan Nomor Dosen..." readonly>
						<small class="text-muted">Kode ini sebagai poros data.</small>
					</div>
					<div class="form-group">
						<label for="dsn_nipd">NIPD/NIDN/NIP</label>
						<input type="text" name="dsn_nipd" id="dsn_nipd" class="form-control" value="<?php echo $data['dosen']['dsn_nipd']; ?>" placeholder="Masukkan NIPD/NIDN/NIP Dosen...">
					</div>
					<div class="form-group">
						<label for="dsn_nama">Nama Dosen</label>
						<input type="text" name="dsn_nama" id="dsn_nama" class="form-control" value="<?php echo $data['dosen']['dsn_nama']; ?>" placeholder="Masukkan Nama Dosen...">
					</div>
					<div class="form-group">
						<label for="dsn_gelar">Gelar Dosen</label>
						<input type="text" name="dsn_gelar" id="dsn_gelar" class="form-control" value="<?php echo $data['dosen']['dsn_gelar']; ?>" placeholder="Masukkan Gelar Dosen...">
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>