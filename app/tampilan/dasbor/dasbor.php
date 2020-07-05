<div class="container mt-4">
	<div class="container mt-4">
		<h3>Selamat datang, <?php echo $_SESSION['nama']; ?>!</h3>
		<p class="text-muted"><i>Anda masuk sebagai: <?php echo $_SESSION['hak_akses']; ?>, dengan akun <?php echo $_SESSION['user']; ?> sejak <?php echo $_SESSION['waktu_sesi']; ?>.</i></p>
		<hr>
	</div>
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group"><b>Email:</b><br><?php echo $data['usr']['dtl']['email']; ?></div>
					<div class="form-group"><b>No. HP:</b><br><?php echo $data['usr']['dtl']['hp']; ?></div>
					<?php if ($data['usr']['dtl']['bio'] != ''): ?>
						<div class="form-group"><b>Tentang Saya:</b><br><?php echo $data['usr']['dtl']['bio']; ?></div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="row">
				<div class="col">
					<div class="alert alert-success">
						<h6 class="alert-heading">Laboratorium</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['dtc']['lab']; ?></h3>
					</div>
				</div>
				<div class="col">
					<div class="alert alert-warning">
						<h6 class="alert-heading">Alat dalam Lab</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['dtc']['adl']; ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="alert alert-danger">
						<h6 class="alert-heading">Alat Pinjam-Pakai</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['dtc']['app']; ?></h3>
					</div>
				</div>
				<div class="col">
					<div class="alert alert-primary">
						<h6 class="alert-heading">Kontribusi</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['usr']['ctr']['gpp'] + $data['usr']['ctr']['gdl'] + $data['usr']['ctr']['glb']; ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="alert alert-secondary">
						<h6 class="alert-heading">Praktikan</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['dtc']['mhs']; ?></h3>
					</div>
				</div>
				<div class="col">
					<div class="alert alert-danger">
						<h6 class="alert-heading">Aktivitas Lab</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['gnc']['glb']; ?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="alert alert-warning">
						<h6 class="alert-heading">Aktivitas ADL</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['gnc']['gdl']; ?></h3>
					</div>
				</div>
				<div class="col">
					<div class="alert alert-success">
						<h6 class="alert-heading">Aktivitas APP</h6>
						<hr>
						<h3 class="alert-text"><?php echo $data['gnc']['gpp']; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>