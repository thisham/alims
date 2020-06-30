<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo BASIS_URL; ?>/data/mhs/editin" method="post">
					<div class="form-group">
						<label for="nim">Nomor Induk Mahasiswa</label>
						<input type="text" name="mhs_nim" id="mhs_nim" class="form-control" value="<?php echo $data['mhs']['mhs_nim']; ?>" placeholder="Masukkan NIM..." readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="mhs_nama" id="mhs_nama" class="form-control" value="<?php echo $data['mhs']['mhs_nama']; ?>" placeholder="Masukkan Nama Mahasiswa..." required>
					</div>
					<div class="form-group">
						<label for="mhs_prodi">Program Studi</label>
						<select class="form-control" name="mhs_prodi" id="mhs_prodi" value="" required>
							<option value="<?php echo $data['mhs']['kode']; ?>"><?php echo $data['mhs']['prodi']; ?></option>
							<?php foreach ($data['prodi'] as $prodi): ?>
								<option value="<?php echo $prodi['kode']; ?>"><?php echo $prodi['prodi']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="mhs_angkatan">Angkatan</label>
						<input type="text" name="mhs_angkatan" id="mhs_angkatan" class="form-control" placeholder="Masukkan Tahun Pendaftaran Mahasiswa (4 digit)..." pattern="[0-9]{4}" value="<?php echo $data['mhs']['mhs_angkatan']; ?>" required>
					</div>
					<div class="form-group">
						<label for="mhs_kelas">Kelas</label>
						<input type="text" name="mhs_kelas" id="mhs_kelas" class="form-control" placeholder="Masukkan Kelas Mahasiswa..." value="<?php echo $data['mhs']['mhs_kelas']; ?>" required>
					</div>
					<div class="form-group">
						<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>