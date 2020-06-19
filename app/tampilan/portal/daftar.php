<div class="container">
	<div class="card">
		<div class="card-header">
			<center><img src="<?php echo BASIS_URL; ?>/aset/img/logo.png" alt="alims"></center>
		</div>
		<div class="card-body">
			<h4 class="text-center ">Pendaftaran Perumat</h4>
			<?php Flasher::flash(); ?>
			<form action="<?php echo BASIS_URL; ?>/portal/daftarkan" method="post">
				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input type="email" class="form-control" placeholder="Masukkan Alamat Email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
					</div>
				</div>
				<div class="form-group">
					<label for="hp">Nomor HP atau WhatsApp</label>
					<input type="tel" class="form-control" id="hp" name="hp" placeholder="Masukkan Nomor HP atau WhatsApp" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3,}" required>
					<small class="text-muted">Format: 0812-3456-78910 (13 digit), 0812-3456-7890 (12 digit) atau 0812-3456-789 (11 digit).</small>
				</div>
				<hr>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama Pengguna" required>
					<small class="text-muted">Username ini akan digunakan sebagai informasi saat masuk ke sistem. Contoh username: namaaingtehsaha_</small>
				</div>
				<div class="form-group">
					<label for="password">Kata Sandi</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi" required>
				</div>
				<div class="form-group">
					<label for="cpassword">Konfirmasi Kata Sandi</label>
					<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Masukkan Kata Sandi" required>
				</div>
				<div class="form-group">
					<label for="captcha">Captcha</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><?php echo $data['rumus']['a'] . ' ' . $data['rumus']['o'] . ' ' . $data['rumus']['b'] . ' = ' ?></span>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan hasilnya di sini sob..." id="captcha" name="captcha">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="kirim" id="kirim" class="btn btn-primary text-center form-control" value="Kirim">
				</div>
			</form>
			<div class="text-center">
				<small>Wis duwe akun perumat? <a href="<?php echo BASIS_URL; ?>/portal">Mlebu sistem wae</a>.</small>
			</div>
		</div>
	</div>
</div>