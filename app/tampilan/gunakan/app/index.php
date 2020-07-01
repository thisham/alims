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
	});
	$(document).ready(function() {
		$('#gnapp_mhscari').click(function(){
			var frmmhs = $('#gnapp_mhs').val();
			frmmhs = frmmhs.split(' - ', 1);
			var url = "<?php echo BASIS_URL; ?>/gunakan/app/carimhs-pinjam/" + frmmhs;
			$("#tbl-appbymhs").load(url);
		});
	});
	function appsumarray(sum, act) {
		var url = "<?php echo BASIS_URL; ?>/gunakan/app/appsumarray/" + sum + '/' + act;
		$("#gnapp_noalat").load(url);
	}
	function kembalikan_alat(mhs_id, gpp_id, app_id) {
		var url = "<?php echo BASIS_URL; ?>/gunakan/app/update/" + mhs_id + "/kembaliin/" + app_id + '/' + gpp_id;
		$("#tbl-appbymhs").load(url);
	}
	function perusakan_alat(mhs_id, gpp_id, app_id) {
		var url = "<?php echo BASIS_URL; ?>/gunakan/app/update/" + mhs_id + "/rusakin/" + app_id + '/' + gpp_id;
		$("#tbl-appbymhs").load(url);
	}
	$(document).ready(function(){
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
	});
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
					<a class="nav-link" id="tambah-tab" data-toggle="tab" href="#kembali" role="tab">Pengembalian</a>
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
								<?php if (is_null($data['gpp_a'])): ?>
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
				<div class="tab-pane fade" id="dipakai" role="tabpanel">
					<?php $no = 1; ?>
					...
				</div>
				<div class="tab-pane fade" id="rusak" role="tabpanel">
					<?php $no = 1; ?>
					...
				</div>
				<div class="tab-pane fade" id="kembali" role="tabpanel">
					<div class="input-group">
						<input id="gnapp_mhs" name="gnapp_mhs" type="text" class="form-control gnapp_mhs" placeholder="Masukkan NIM dan Nama...">
						<div class="input-group-append">
							<button id="gnapp_mhscari" name="gnapp_mhscari" class="btn btn-primary">Cari</button>
						</div>							
					</div>
					<div id="gnapp_mhslist" class="gnapp_mhslist"></div>
					<form action="<?php echo BASIS_URL; ?>/gunakan/app/update" method="post">
						<div id="tbl-appbymhs"></div>
					</form>
					
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					<form action="<?php echo BASIS_URL; ?>/gunakan/app/tambahin" method="post">
						<div class="form-group">
							<label for="gnapp_mhs">NIM Peminjam</label>
							<input type="text" name="gnapp_mhs" id="gnapp_mhs-add" class="form-control gnapp_mhs" placeholder="Masukkan NIM dan Nama Mahasiswa..." required>
							<div id="gnapp_mhslist-add" class="gnapp_mhslist"></div>
						</div>
						<div class="form-group">
							<label for="gnapp_mtk">Mata Kuliah</label>
							<input type="text" name="gnapp_mtk" id="gnapp_mtk" class="form-control gnapp_mtk" placeholder="Masukkan Nama Mata Kuliah..." required>
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
						<div class="form-group">
							<label for="gnapp_appname">Nama Alat</label>
							<div class="input-group">
								<select name="gnapp_appname" id="gnapp_appname" class="form-control" required>
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
								<input type="number" name="gnapp_appsum" id="gnapp_appsum" class="form-control" placeholder="Masukkan Jumlah Alat..." onblur="appsumarray($('#gnapp_appsum').val(), $('#gnapp_appname').val());" required>
							</div>
						</div>
						<div id="gnapp_noalat"></div>
						<div class="form-group">
							<input type="submit" name="kirim" id="kirim" class="btn btn-primary form-control" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>