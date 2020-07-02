<script type="text/javascript">
	$(document).ready(function(){
		$("#gnadl_mhs").keyup( function(){
			var kueri_mhs = $(this).val();
			if (kueri_mhs != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mhs",
					method: "POST",
					data: {kueri_mhs:kueri_mhs},
					success: function(data) {
						$("#gnadl_mhslist").fadeIn();
						$("#gnadl_mhslist").html(data);
					}
				});
			}
		});
	});
	$(document).ready(function(){
		$("#gnadl_mtk").keyup( function() {
			var kueri_mtk = $(this).val();
			if (kueri_mtk != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mtk",
					method: "POST",
					data: {kueri_mtk:kueri_mtk},
					success: function(data) {
						$("#gnadl_mtklist").fadeIn();
						$("#gnadl_mtklist").html(data);
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
					<div id="data-gnadl" class="table-responsive">
						<table class="table table-striped text-center">
							<thead>
								<tr class="text-center">
									<th>No.</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Nama Alat</th>
									<th>Awal</th>
									<th>Akhir</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['gnadl'] == NULL): ?>
									<tr>
										<td colspan="7" class="text-center">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['gnadl'] as $gnadl): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><a href="<?php echo BASIS_URL . '/gunakan/adl/detail/' . $gnadl['gnadl_id']; ?>"><?php echo $gnadl['gnadl_id']; ?></a></td>
											<td><?php echo $gnadl['gnadl_sign'] ?></td>
											<td><?php echo $gnadl['adl_nama']; ?></td>
											<td><?php echo $gnadl['adl_id']; ?></td>
											<td>
												<?php echo $gnadl['mhs_nama']; ?>
											<td>
												<?php if ($gnadl['gnadl_awal'] != 0 AND $gnadl['gnadl_akhir'] == 0): ?>
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
					<form action="<?php echo BASIS_URL; ?>/gunakan/adl/tambahin" method="post">
						<div class="form-group">
							<label for="gnadl_id">Kode Pemakaian</label>
							<input type="text" name="gnadl_id" id="gnadl_id" class="form-control" value="<?php echo $data['newID']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="gnadl_mhs">Nomor Induk Mahasiswa Praktikan</label>
							<div class="input-group">
								<input type="text" name="gnadl_mhs" id="gnadl_mhs" class="form-control" placeholder="Masukkan NIM..." required>
							</div>
							<div id="gnadl_mhslist"></div>
						</div>
						<div class="form-group">
							<label for="gnadl_adl">Nama Alat</label>
							<select name="gnadl_adl" id="gnadl_adl" class="form-control" required>
								<option value="">-- Pilih Alat --</option>
								<?php foreach ($data['dtadl'] as $adl): ?>
									<option value="<?php echo $adl['adl_id']; ?>"><?php echo $adl['adl_id'] . ' - ' . $adl['adl_nama'] . ' - ' . $adl['lab_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="gnadl_mtk">Mata Kuliah</label>
							<input type="text" name="gnadl_mtk" id="gnadl_mtk" class="form-control" placeholder="Masukkan Mata Kuliah..." required>
							<div id="gnadl_mtklist"></div>
						</div>
						<div class="form-group">
							<label for="gnadl_dsn">Dosen</label>
							<div class="input-group">
								<select id="gnadl_dsn" name="gnadl_dsn" class="form-control" required>
									<option value="">-- Pilih Dosen --</option>
									<?php foreach ($data['dosen'] as $dsn): ?>
										<option value="<?php echo $dsn['dsn_id']; ?>"><?php echo $dsn['dsn_nama']; ?></option>
									<?php endforeach ?>
								</select>
							</div> 
						</div>
						<div class="form-group">
							<input type="submit" name="gnadl_kirim" id="gnadl_kirim" class="btn btn-primary form-control" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

