<div class="container">
	<div class="card">
		<div class="card-header">
			<center><img src="<?php echo BASIS_URL; ?>/aset/img/logo.png" alt="alims"></center>
		</div>
		<div class="card-body">
			<h4 class="text-center ">Masuk ke Halaman Perumat</h4>
			<?php Flasher::flash(); ?>
			<form action="<?php echo BASIS_URL; ?>/portal/masukkan" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="namaaingtehsaha_">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="password">Captcha</label>
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
				<small>Durung duwe akun perumat? <a href="<?php echo BASIS_URL; ?>/portal/daftar">Daftar saiki</a>!</small>
			</div>
		</div>
	</div>
</div>