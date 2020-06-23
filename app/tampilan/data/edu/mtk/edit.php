<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/mtk/tambahin" method="post">
					<div class="form-group">
						<label for="mtk_id">ID Mata Kuliah</label>
						<input type="text" name="mtk_id" id="mtk_id" class="form-control" value="<?php echo $data['infos']['mtk_id']; ?>" placeholder="Masukkan ID Mata Kuliah..." readonly>
						<small class="text-muted">Kode ini dibuat secara otomatis. Jangan ubah dari inspect element ya ;)</small>
					</div>
					<div class="form-group">
						<label for="mtk_kode">Kode Mata Kuliah</label>
						<input type="text" name="mtk_kode" id="mtk_kode" class="form-control" value="<?php echo $data['infos']['mtk_kode']; ?>" placeholder="Masukkan Kode Mata Kuliah...">
						<small class="text-muted">Isi kode ini dengan kode mata kuliah yang ada di kurikulum.</small>
					</div>
					<div class="form-group">
						<label for="mtk_nama">Nama Mata Kuliah</label>
						<input type="text" name="mtk_nama" id="mtk_nama" class="form-control" value="<?php echo $data['infos']['mtk_nama']; ?>" placeholder="Masukkan Nama Mata Kuliah...">
					</div>
					<div class="form-group">
						<label for="mtk_akronim">Akronim Mata Kuliah</label>
						<input type="text" name="mtk_akronim" id="mtk_akronim" class="form-control" pattern="[A-Z0-9]{3,}" placeholder="Masukkan Akronim Mata Kuliah..." value="<?php echo $data['infos']['mtk_akronim']; ?>" required="">
						<small class="text-muted">Mohon buat akronim (singkatan) mata kuliah untuk mempermudah pemanggilan nama mata kuliah di log book. Gunakan huruf kapital atau angka minimal tiga (3) karakter.</small>
					</div>
					<div class="form-group">
						<label for="mtk_periode">Periode Mata Kuliah</label>
						<input type="text" name="mtk_periode" id="mtk_periode" class="form-control" value="<?php echo $data['infos']['mtk_periode']; ?>" placeholder="Masukkan Periode Mata Kuliah..." readonly>
						<small class="text-muted">Periode ini dibuat otomatis berdasarkan tahun dan semester. Semester ganjil dimulai pada September hingga Februari, semester genap dimulai pada Maret hingga Agustus.</small>
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>