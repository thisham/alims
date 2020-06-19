<div class="container mt-4">
	<h3>Daftar Mahasiswa</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<?php $no = 1; ?>
	<center>
		<form action="<?php echo BASIS_URL; ?>/data/mhs/cari" method="post">
			<div class="container">
				<div class="input-group">
					<input type="text" id="cari" name="cari" class="form-control" value="<?php echo $data['hasil']['kueri'] ?>" placeholder="NIM atau Nama Mahasiswa">
					<div class="input-group-append" id="button-addon4">
						<button type="submit" class="btn btn-outline-primary" type="button">Cari</button>
						<a href="<?php echo BASIS_URL; ?>/data/mhs/tambah" class="btn btn-outline-secondary" type="button">Tambah</a>
					</div>
				</div>
			</div>
		</form>
			
		<table class="table table-responsive table-striped table-hover mt-2">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIM</th>
					<th>Nama</th>
					<!-- <th>Prodi</th>
					<th>Angkatan</th>
					<th>Kelas</th> -->
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($data['hasil']['baris'] == 0): ?>
					<tr>
						<td colspan="4">Data tidak ditemukan.</td>
					</tr>
				<?php else: ?>
					<?php foreach ($data['hasil']['hasil'] as $mhs): ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $mhs['nim']; ?></td>
							<td><?php echo $mhs['nama']; ?></td>
							<!-- <td><?php echo $mhs['prodi']; ?></td>
							<td><?php echo $mhs['angkatan']; ?></td>
							<td><?php echo $mhs['kelas']; ?></td> -->
							<td><a href="<?php echo BASIS_URL . '/data/mhs/detail/' . $mhs['nim']; ?>" class="badge badge-primary">Detail</a> <a href="<?php echo BASIS_URL . '/data/mhs/edit/' . $mhs['nim']; ?>" class="badge badge-warning">Edit</a> <a href="<?php echo BASIS_URL . '/data/mhs/hapus/' . $mhs['nim']; ?>" class="badge badge-danger">Hapus</a></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</center>
</div>