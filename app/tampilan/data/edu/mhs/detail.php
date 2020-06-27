<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab">Detail</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab">Lab</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="detail" role="tabpanel">
					<div class="table-responsive">
						<table class="table table-striped">
							<tr>
								<th>Nama</th>
								<td><?php echo $data['mhs']['nama']; ?></td>
							</tr>
							<tr>
								<th>NIM</th>
								<td><?php echo $data['mhs']['nim']; ?></td>
							</tr>
							<tr>
								<th>Program Studi</th>
								<td><?php echo $data['mhs']['prodi']; ?></td>
							</tr>
							<tr>
								<th>Angkatan</th>
								<td><?php echo $data['mhs']['angkatan']; ?></td>
							</tr>
							<tr>
								<th>Kelas</th>
								<td><?php echo $data['mhs']['kelas']; ?></td>
							</tr>
							<tr>
								<th>Pemakaian Lab</th>
								<td>...</td>
							</tr>
							<tr>
								<th>Pemakaian Alat dalam Lab</th>
								<td>...</td>
							</tr>
							<tr>
								<th>Peminjaman Alat</th>
								<td>...</td>
							</tr>
							<tr>
								<th>Tanggungan</th>
								<td>...</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="lab" role="tabpanel">...</div>
			</div>
		</div>
	</div>
</div>