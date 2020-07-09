<script type="text/javascript">
	$(document).ready(function(){
		$(".gnapp_mhs").keyup( function(){
			var kueri_mhs = $(this).val();
			if (kueri_mhs != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mhs",
					method: "POST",
					data: {kueri_mhs:kueri_mhs},
					success: function(data) {
						$(".gnapp_mhslist").fadeIn();
						$(".gnapp_mhslist").html(data);
					}
				});
			}
		});
		$('#gnapp_mhscari').click(function(){
			var frmmhs = $('#gnapp_mhs').val();
			frmmhs = frmmhs.split(' - ', 1);
			var url = "<?php echo BASIS_URL; ?>/gunakan/app/carimhs-pinjam/" + frmmhs;
			$("#tbl-appbymhs").load(url);
		});
		$("#gnapp_mtk").keyup( function() {
			var kueri_mtk = $(this).val();
			if (kueri_mtk != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mtk",
					method: "POST",
					data: {kueri_mtk:kueri_mtk},
					success: function(data) {
						$("#gnapp_mtklist").fadeIn();
						$("#gnapp_mtklist").html(data);
					}
				});
			}
		});
		$("#gnapp_tglcari_all").click(function(){
			var tgl_all = $("#gnapp_tgl_all").val();
			if (tgl_all != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/gunakan/app/appbytanggal/all",
					method: "POST",
					data: {gnapp_tgl_all: tgl_all},
					success: function(data) {
						$(".tabel-semua").html(data);
					}
				});
			}
		});
		var ctx = document.getElementById("gnapp-graph").getContext('2d');
		var gnadl_graph = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo $data['labels']; ?>,
				datasets: [{
					label: 'Peminjaman',
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
	function appsumarray(sum, act, num) {
		var url = "<?php echo BASIS_URL; ?>/gunakan/app/appsumarray/" + sum + '/' + act + '/' + num;
		$("#gnapp_noalat-" + num).load(url);
	}
	function appcaritglall(tgl){
		var url = "<?php echo BASIS_URL; ?>/gunakan/app/appbytanggal/all" + tgl;
		$(".tabel-semua").load();
	}
	function gakfokus() {
		$(".gnapp_mhslist").fadeOut();
		$("#gnapp_mtklist").fadeOut();
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
					<a class="nav-link" id="dipakai-tab" data-toggle="tab" href="#dipakai" role="tab">Dipakai</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="rusak-tab" data-toggle="tab" href="#rusak" role="tab">Rusak/Hilang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="kembali-tab" data-toggle="tab" href="#kembali" role="tab">Pengembalian</a>
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
					<?php $no = 1; ?>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Tanggal Peminjaman</span>
						</div>
						<input type="date" name="gnapp_tgl_all" id="gnapp_tgl_all" class="form-control" value="<?php echo date('Y-m-d'); ?>">
						<div class="input-group-append">
							<button id="gnapp_tglcari_all" name="gnapp_tglcari_all" class="btn btn-primary">Cari</button>
						</div>
					</div>
					<div class="tabel-semua mt-2">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead class="text-center">
									<tr>
										<th>No.</th>
										<th>Kode Pinjam</th>
										<th>Nama Alat</th>
										<th>No. Seri</th>
										<th>Peminjam</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php if ($data['gpp_a'] == NULL): ?>
										<tr>
											<td colspan="6" class="text-center">Tidak ada data.</td>
										</tr>
									<?php else: ?>
										<?php foreach ($data['gpp_a'] as $gpp_a): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $gpp_a['gnapp_id']; ?></td>
												<td><?php echo $gpp_a['app_nama']; ?></td>
												<td><?php echo $gpp_a['app_id']; ?></td>
												<td><?php echo $gpp_a['mhs_nama']; ?></td>
												<td>
													<?php if ($gpp_a['gnapp_akhir'] == 0 AND $gpp_a['gnapp_rusak'] == 0) { ?>
														<div class="badge badge-warning">Dipinjam</div>
													<?php } else if ($gpp_a['gnapp_akhir'] == 0 AND $gpp_a['gnapp_rusak'] != 0) { ?>
														<div class="badge badge-danger">Belum Diganti</div>
													<?php } else if ($gpp_a['gnapp_akhir'] != 0 AND $gpp_a['gnapp_rusak'] != 0) { ?>
														<div class="badge badge-primary">Sudah Diganti</div>
													<?php } else { ?>
														<div class="badge badge-success">Dikembalikan</div>
													<?php } ?>
												</td>
											</tr>
										<?php endforeach ?>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="dipakai" role="tabpanel">
					<?php $no = 1; ?>
					<div class="table-responsive">
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode Pinjam</th>
									<th>Nama Alat</th>
									<th>No. Seri</th>
									<th>Peminjam</th>
									<th>Waktu Awal</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['gpp_p'] == NULL): ?>
									<tr>
										<td colspan="6" class="text-center">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['gpp_p'] as $gpp_p): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $gpp_p['gnapp_id']; ?></td>
											<td><?php echo $gpp_p['app_nama']; ?></td>
											<td><?php echo $gpp_p['app_id']; ?></td>
											<td><?php echo $gpp_p['mhs_nama']; ?></td>
											<td><?php echo $gpp_p['gnapp_awal']; ?></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="rusak" role="tabpanel">
					<?php $no = 1; ?>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode Pinjam</th>
									<th>Nama Alat</th>
									<th>No. Seri</th>
									<th>Peminjam</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($data['gpp_r'] == NULL): ?>
									<tr>
										<td colspan="6" class="text-center">Tidak ada data.</td>
									</tr>
								<?php else: ?>
									<?php foreach ($data['gpp_r'] as $gpp_r): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $gpp_r['gnapp_id']; ?></td>
											<td><?php echo $gpp_r['app_nama']; ?></td>
											<td><?php echo $gpp_r['app_id']; ?></td>
											<td><?php echo $gpp_r['mhs_nama']; ?></td>
											<td><a href="<?php echo BASIS_URL . '/gunakan/app/update/' . $gpp_r['gnapp_id'] . '/ganti/' . $gpp_r['app_id']; ?>" class="btn btn-success btn-sm">Ganti</a></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade" id="kembali" role="tabpanel">
					<div class="input-group">
						<input id="gnapp_mhs" name="gnapp_mhs" type="text" class="form-control gnapp_mhs" placeholder="Masukkan NIM dan Nama..." onblur="gakfokus();" autocomplete="off">
						<div class="input-group-append">
							<button id="gnapp_mhscari" name="gnapp_mhscari" class="btn btn-primary">Cari</button>
						</div>							
					</div>
					<div id="gnapp_mhslist" class="gnapp_mhslist"></div>
					<div id="tbl-appbymhs"></div>
				</div>
				<div class="tab-pane fade" id="grafik" role="tabpanel">
					<div class="card">
						<div class="card-body">
							<canvas id="gnapp-graph"></canvas>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/gunakan/app/tambahin" method="post">
						<div class="form-group">
							<label for="gnapp_mhs">NIM Peminjam</label>
							<input type="text" name="gnapp_mhs" id="gnapp_mhs-add" class="form-control gnapp_mhs" placeholder="Masukkan NIM dan Nama Mahasiswa..." onblur="gakfokus();" autocomplete="off" required>
							<div id="gnapp_mhslist-add" class="gnapp_mhslist"></div>
						</div>
						<div class="form-group">
							<label for="gnapp_mtk">Mata Kuliah</label>
							<input type="text" name="gnapp_mtk" id="gnapp_mtk" class="form-control gnapp_mtk" placeholder="Masukkan Nama Mata Kuliah..." onblur="gakfokus();" autocomplete="off" required>
							<div id="gnapp_mtklist" class="gnapp_mtklist"></div>
						</div>
						<div class="form-group">
							<label for="gnapp_dsn">Dosen</label>
							<div class="input-group">
								<select id="gnapp_dsn" name="gnapp_dsn" class="form-control" required>
									<option value="">-- Pilih Dosen --</option>
									<?php foreach ($data['dosen'] as $dsn): ?>
										<option value="<?php echo $dsn['dsn_id']; ?>"><?php echo $dsn['dsn_nama']; ?></option>
									<?php endforeach ?>
								</select>
							</div> 
						</div>
						<div id="divAlat">
							<div class="card" id="divAlat-0">
								<div class="card-body">
									<div class="form-group">
										<label for="gnapp_appname">Nama Alat</label>
										<div class="input-group">
											<select name="gnapp_appname[0]" id="gnapp_appname-0" class="form-control" required>
												<option>-- Pilih Alat --</option>
												<?php foreach ($data['dtapp'] as $dtapp): ?>
													<option value="<?php echo $dtapp['app_label']; ?>"><?php echo $dtapp['app_nama']; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="gnapp_appsum">Jumlah Alat</label>
										<div class="input-group">
											<input type="number" name="gnapp_appsum[0]" id="gnapp_appsum-0" class="form-control" placeholder="Masukkan Jumlah Alat..." autocomplete="off" onkeyup="appsumarray($('#gnapp_appsum-0').val(), $('#gnapp_appname-0').val(), 0);" required>
										</div>
									</div>
									<div id="gnapp_noalat-0"></div>
								</div>
							</div>
						</div>
						<div class="form-group mt-4">
							<div class="row">
								<div class="col">
									<button id="btn-add-alat" class="btn btn-success form-control">Tambah Kolom</button>
								</div>
								<div class="col">
									<button id="btn-del-alat" class="btn btn-warning form-control">Hapus Kolom</button>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col">
									<input type="submit" name="kirim" id="kirim" class="btn btn-primary form-control" value="Kirim">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var hitungan = 1;
		$('#btn-add-alat').click(function(e){
			e.preventDefault();
			var kartu_pinjam = $(document.createElement('div')).attr('id', 'divAlat' + hitungan);
			kartu_pinjam.after().html('<div class="card mt-2" id="divAlat-' + hitungan + '">\
				<div class="card-body">\
					<div class="form-group">\
						<label for="gnapp_appname">Nama Alat</label>\
						<div class="input-group">\
							<select name="gnapp_appname[' + hitungan + ']" id="gnapp_appname-' + hitungan + '" class="form-control" required>\
								<option>-- Pilih Alat --</option>\
								<?php foreach ($data['dtapp'] as $dtapp): ?>\
									<option value="<?php echo $dtapp['app_label']; ?>"><?php echo $dtapp['app_nama']; ?></option>\
								<?php endforeach ?>\
							</select>\
						</div>\
					</div>\
					<div class="form-group">\
						<label for="gnapp_appsum">Jumlah Alat</label>\
						<div class="input-group">\
							<input type="number" name="gnapp_appsum[' + hitungan + ']" id="gnapp_appsum-' + hitungan + '" class="form-control" placeholder="Masukkan Jumlah Alat..." autocomplete="off" onkeyup="appsumarray($(`#gnapp_appsum-' + hitungan + '`).val(), $(`#gnapp_appname-' + hitungan + '`).val(), ' + hitungan + ');" required>\
						</div>\
					</div>\
					<div id="gnapp_noalat-' + hitungan + '"></div>\
				</div>\
			</div>');
			kartu_pinjam.appendTo('#divAlat');
			hitungan++;
		});
		$('#btn-del-alat').click(function(e){
			e.preventDefault();
			if (hitungan == 1) {
				alert('Telah mencapai minimum peminjaman.');
				return false;
			}
			hitungan--;
			$('#divAlat' + hitungan).remove();
		});
	});
</script>