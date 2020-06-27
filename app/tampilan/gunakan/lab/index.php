<script type="text/javascript">
	$(document).ready(function(){
		$("#gnlab_mhs").keyup( function(){
			var kueri_mhs = $(this).val();
			if (kueri_mhs != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mhs",
					method: "POST",
					data: {kueri_mhs:kueri_mhs},
					success: function(data) {
						$("#gnlab_mhslist").fadeIn();
						$("#gnlab_mhslist").html(data);
					}
				});
			}
		});
	});
	$(document).ready(function(){
		$("#gnlab_mtk").keyup( function() {
			var kueri_mtk = $(this).val();
			if (kueri_mtk != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mtk",
					method: "POST",
					data: {kueri_mtk:kueri_mtk},
					success: function(data) {
						$("#gnlab_mtklist").fadeIn();
						$("#gnlab_mtklist").html(data);
					}
				});
			}
		});
	});
	
</script>

<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
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
					<!-- <div class="input-group">
						<select name="gnlab_lab" id="gnlab_lab" class="form-control">
							<option value="">-- Pilih Laboratorium --</option>
							<?php foreach ($data['labs'] as $lab): ?>
								<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
							<?php endforeach ?>
						</select>
						<a class="btn btn-outline-primary" id="btn-gnlab_filterin" name="gnlab_carikan">Kirim</a>
					</div> -->
					<div id="data-gnlab" class="table-responsive">
						<table class="table table-striped text-center">
							<thead>
								<tr class="text-center">
									<th>No.</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Laboratorium</th>
									<th>Awal</th>
									<th>Akhir</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['gnlab'] == NULL): ?>
									<tr>
										<td colspan="6" class="text-center">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['gnlab'] as $gnlab): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><a href="<?php echo BASIS_URL . '/gunakan/lab/detail/' . $gnlab['gnlab_id']; ?>"><?php echo $gnlab['gnlab_id']; ?></a></td>
											<td><?php echo $gnlab['gnlab_sign'] ?></td>
											<td><?php echo $gnlab['lab_nama']; ?></td>
											<td><?php echo $gnlab['gnlab_awal']; ?></td>
											<td>
												<?php if ($gnlab['gnlab_akhir'] == 0): ?>
													<div class="badge badge-warning">Belum Selesai</div>
												<?php else: ?>
													<?php echo $gnlab['gnlab_akhir']; ?></td>
												<?php endif ?>
											<td>
												<?php if ($gnlab['gnlab_awal'] != 0 AND $gnlab['gnlab_akhir'] == 0): ?>
													<div class="badge badge-success">Berjalan</div>
												<?php else: ?>
													<div class="badge badge-secondary">Selesai</div>
												<?php endif ?>
											</td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/gunakan/lab/tambahin" method="post">
						<div class="form-group">
							<label for="gnlab_id">Kode Pemakaian</label>
							<input type="text" name="gnlab_id" id="gnlab_id" class="form-control" value="<?php echo $data['newID']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="gnlab_mhs">Nomor Induk Mahasiswa Praktikan</label>
							<input type="text" name="gnlab_mhs" id="gnlab_mhs" class="form-control" placeholder="Masukkan NIM..." required>
							<div id="gnlab_mhslist"></div>
						</div>
						<div class="form-group">
							<label for="gnlab_lab">Laboratorium</label>
							<select name="gnlab_lab" id="gnlab_lab" class="form-control" required>
								<option value="">-- Pilih Laboratorium --</option>
								<?php foreach ($data['labs'] as $lab): ?>
									<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="gnlab_mtk">Mata Kuliah</label>
							<input type="text" name="gnlab_mtk" id="gnlab_mtk" class="form-control" placeholder="Masukkan Mata Kuliah..." required>
							<div id="gnlab_mtklist"></div>
						</div>
						<div class="form-group">
							<label for="gnlab_dsn">Dosen</label>
							<div class="input-group">
								<select id="gnlab_dsn" name="gnlab_dsn" class="form-control" required>
									<option value="">-- Pilih Dosen --</option>
									<?php foreach ($data['dosen'] as $dsn): ?>
										<option value="<?php echo $dsn['dsn_id']; ?>"><?php echo $dsn['dsn_nama']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="gnlab_kirim" id="gnlab_kirim" class="btn btn-primary form-control" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

