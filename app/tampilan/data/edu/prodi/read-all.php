<div class="container mt-4">
	<h3>Daftar Program Studi</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<?php $no = 1; ?>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="daftar-tab" data-toggle="tab" href="#daftar" role="tab">Daftar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab">Tambah</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="daftar" role="tabpanel">
					<center>
						<table class="table table-responsive table-striped table-hover mt-2">
							<tr>
								<th>No.</th>
								<th>Kode Prodi</th>
								<th>Nama Prodi</th>
								<th>Aksi</th>
							</tr>
							<?php foreach ($data['lists'] as $prodi): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $prodi['kode']; ?></td>
									<td><?php echo $prodi['prodi']; ?></td>
									<td><a href="<?php echo BASIS_URL . '/data/prodi/edit/' . $prodi['kode']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/data/prodi/hapus/' . $prodi['kode']; ?>" class="badge badge-danger">Hapus</a></td>
								</tr>
							<?php endforeach ?>
						</table>
					</center>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/data/prodi/tambahin" method="post">
						<div class="form-group">
							<label for="kode">Kode Prodi</label>
							<input type="text" name="kode" id="kode" class="form-control" placeholder="Masukkan Kode Prodi..." required>
						</div>
						<div class="form-group">
							<label for="prodi">Nama Program Studi</label>
							<input type="text" name="prodi" id="prodi" class="form-control" placeholder="Masukkan Nama Program Studi..." required>
						</div>
						<div class="form-group">
							<input type="submit" name="kirim" id="kirim" value="Kirim" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
					
</div>