<div class="container mt-4">
	<h3>Tambah Program Studi</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/prodi/tambahin" method="post">
					<div class="form-group">
						<label for="kode">Kode Prodi</label>
						<input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan Kode Prodi...">
					</div>
					<div class="form-group">
						<label for="prodi">Nama Program Studi</label>
						<input type="text" name="prodi" id="prodi" class="form-control" placeholder="Masukkan Nama Program Studi...">
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>