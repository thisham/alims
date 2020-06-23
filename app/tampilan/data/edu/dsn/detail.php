<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th>ID Dosen</th>
							<td><?php echo $data['dosen']['dsn_id']; ?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td><?php echo $data['dosen']['dsn_nama']; ?></td>
						</tr>
						<tr>
							<th>NIPD/NIDN/NIP</th>
							<td><?php echo $data['dosen']['dsn_nipd']; ?></td>
						</tr>
						<tr>
							<th>Gelar</th>
							<td><?php echo $data['dosen']['dsn_gelar']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>