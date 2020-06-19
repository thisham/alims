<div class="container mt-4">
	<h3>Detail Mahasiswa</h3>
	<hr>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body text-center">
				<h4 class="card-title"><?php echo $data['mhs']['nama']; ?></h4>
				<hr>
				<h5 class="card-title"><?php echo $data['mhs']['nim']; ?></h5>
				<br class="mt-2">
				<h6 class="card-title"><?php echo $data['mhs']['prodi'] . ' - Angkatan Tahun ' . $data['mhs']['angkatan'] . ' - Kelas ' . $data['mhs']['kelas']; ?></h6>
			</div>
		</div>
	</div>
</div>