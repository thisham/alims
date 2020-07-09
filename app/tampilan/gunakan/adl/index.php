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
		$(".gnadl_kirimtanggal").click(function(){
			var kueri_tgl = $("#gnadl_tgl_all").val();
			if (kueri_tgl != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/gunakan/adl/adlbytanggal/all",
					method: "POST",
					data: {gnadl_tgl: kueri_tgl},
					success: function(data) {
						$(".data-gnadl").html(data);
					}
				});
			}
		});
		var ctx = document.getElementById("gnadl-graph").getContext('2d');
		var gnadl_graph = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo $data['labels']; ?>,
				datasets: [{
					label: 'Penggunaan',
					fill: false,
					lineTension: 0.1,
					backgroundColor: "#29B0D0",
					borderColor: "#29B0D0",
					pointHoverBackgroundColor: "#29B0D0",
					pointHoverBorderColor: "#29B0D0",
					data: <?php echo $data['grafik']; ?>
				}]
			},
			options: {
				legend: {
					display: true
				},
				barValueSpacing: 20,
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
						}
					}],
					xAxes: [{
						gridLines: {
							color: "rgba(0, 0, 0, 0.1)",
						}
					}]
				}
			}
		});
	});

	function gakfokus() 
	{
		$("#gnadl_mhslist").fadeOut();
		$("#gnadl_mtklist").fadeOut();
	}
</script>

<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="daftar-tab" data-toggle="tab" href="#daftar" role="tab">Daftar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="aktif-tab" data-toggle="tab" href="#aktif" role="tab">Aktif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="grafik-tab" data-toggle="tab" href="#grafik" role="tab">Grafik</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#tambah" role="tab">Tambah</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="daftar" role="tabpanel">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Tanggal Mulai Pemakaian</span>
						</div>
						<input type="date" name="gnadl_tgl_all" id="gnadl_tgl_all" class="form-control" value="<?php echo date('Y-m-d'); ?>">
						<div class="input-group-append">
							<button id="gnadl_tglcari_all" name="gnadl_tglcari_all" class="btn btn-primary gnadl_kirimtanggal">Cari</button>
						</div>
					</div>
					<?php $no = 1; ?>
					<div class="data-gnadl mt-2">
						<div class="table-responsive">
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
									<?php if ($data['gdl_a'] == NULL): ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data.</td>
										</tr>
									<?php else: ?>
										<?php foreach ($data['gdl_a'] as $gnadl): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><a href="<?php echo BASIS_URL . '/gunakan/adl/detail/' . $gnadl['gnadl_id']; ?>"><?php echo $gnadl['gnadl_id']; ?></a></td>
												<td><?php echo $gnadl['gnadl_sign'] ?></td>
												<td><?php echo $gnadl['adl_nama']; ?></td>
												<td><?php echo $gnadl['adl_id']; ?></td>
												<td><?php echo $gnadl['mhs_nama']; ?></td>
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
				</div>
				<div class="tab-pane fade" id="aktif" role="tabpanel">
					<div class="table-responsive">
						<table class="table table-striped text-center">
							<thead>
								<tr class="text-center">
									<th>No.</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Nama Alat</th>
									<th>ID Alat</th>
									<th>Peminjam</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['gdl_p'] == NULL): ?>
									<tr>
										<td colspan="7" class="text-center">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['gdl_p'] as $gnadl): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><a href="<?php echo BASIS_URL . '/gunakan/adl/detail/' . $gnadl['gnadl_id']; ?>"><?php echo $gnadl['gnadl_id']; ?></a></td>
											<td><?php echo $gnadl['gnadl_sign'] ?></td>
											<td><?php echo $gnadl['adl_nama']; ?></td>
											<td><?php echo $gnadl['adl_id']; ?></td>
											<td><?php echo $gnadl['mhs_nama']; ?></td>
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
				<div class="tab-pane fade" id="grafik" role="tabpanel">
					<div class="card">
						<div class="card-body">
							<canvas id="gnadl-graph"></canvas>
						</div>
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
								<input type="text" name="gnadl_mhs" id="gnadl_mhs" class="form-control" placeholder="Masukkan NIM..." onblur="gakfokus();" autocomplete="off" required>
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
							<input type="text" name="gnadl_mtk" id="gnadl_mtk" class="form-control" placeholder="Masukkan Mata Kuliah..." onblur="gakfokus();" autocomplete="off" required>
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

