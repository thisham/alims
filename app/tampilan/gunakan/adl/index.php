<script type="text/javascript">
	var basisurl = "<?php echo BASIS_URL; ?>";
	$(document).ready( function(){
		// var data = basisurl + '/gunakan/lab/autc-dtmhs';
		$("#gnadl_mhs").autocomplete({
			serviceUrl: "<?php echo BASIS_URL; ?>/gunakan/ajax",
			type: "get",
			dataType: "JSON",
			onSelect: function (suggestion) {
				$("#gnadl_mhs").val("" + suggestion.value);
			}
		});
	});
</script>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		var data = "<?php echo BASIS_URL; ?>/gunakan/ajax";
		$("#gnadl_mhs").autocomplete({
			source: data
		});
	});
</script> -->

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
						<select name="gnadl_lab" id="gnadl_lab" class="form-control">
							<option value="">-- Pilih Laboratorium --</option>
							<?php foreach ($data['labs'] as $lab): ?>
								<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
							<?php endforeach ?>
						</select>
						<a class="btn btn-outline-primary" id="btn-gnadl_filterin" name="gnadl_carikan">Kirim</a>
					</div> -->
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
											<td><?php echo $gnadl['gnadl_awal']; ?></td>
											<td>
												<?php if ($gnadl['gnadl_akhir'] == 0): ?>
													<div class="badge badge-warning">Belum Selesai</div>
												<?php else: ?>
													<?php echo $gnadl['gnadl_akhir']; ?></td>
												<?php endif ?>
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
								<input type="text" name="gnadl_mhs" id="gnadl_mhs" class="form-control" placeholder="Masukkan NIM...">
								<!-- <div class="input-group-append" id="button-addon4">
									<button class="btn btn-outline-primary" id="btn-gnadl_cariin" name="btn-gnadl_cariin">Nama =></button>
								</div>
								<div class="input-group-append" id="button-addon4">
									<input type="text" name="gnadl_nim" id="gnadl_nim" class="form-control" placeholder="Ini nama mahasiswa praktikan...">
								</div> -->
							</div>
						</div>
						<div class="form-group">
							<label for="gnadl_adl">Nama Alat</label>
							<select name="gnadl_adl" id="gnadl_adl" class="form-control">
								<option value="">-- Pilih Alat --</option>
								<?php foreach ($data['dtadl'] as $adl): ?>
									<option value="<?php echo $adl['adl_id']; ?>"><?php echo $adl['adl_id'] . ' - ' . $adl['adl_nama'] . ' - ' . $adl['lab_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="gnadl_mtk">Mata Kuliah</label>
							<select name="gnadl_mtk" id="gnadl_mtk" class="form-control">
								<option value="">-- Pilih Mata Kuliah --</option>
								<?php foreach ($data['mtkul'] as $mtk): ?>
									<option value="<?php echo $mtk['mtk_id']; ?>"><?php echo $mtk['mtk_akronim'] . ' - ' . $mtk['dsn_nama'] . ' (' . $mtk['mtk_periode'] . ')'; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="gnadl_dsn">Dosen</label>
							<div class="input-group">
								<select id="gnadl_dsn" name="gnadl_dsn" class="form-control">
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

