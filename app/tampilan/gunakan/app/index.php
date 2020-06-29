<script type="text/javascript">
	$(document).ready(function(){
		$("#gnapp_mhs").keyup( function(){
			var kueri_mhs = $(this).val();
			if (kueri_mhs != '') {
				$.ajax({
					url: "<?php echo BASIS_URL; ?>/data/autcajax/mhs",
					method: "POST",
					data: {kueri_mhs:kueri_mhs},
					success: function(data) {
						$("#gnapp_mhslist").fadeIn();
						$("#gnapp_mhslist").html(data);
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
			// console.log(frmmhs);
			// $.ajax({
			// 	url: "<?php echo BASIS_URL; ?>/gunakan/app/carimhs-pinjam/" + frmmhs,
			// 	success: function(url) {
					
			// 	}
			// });
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
							<tbody>
								<tr></tr>
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
					<?php $no = 1; ?>
					<div class="input-group">
						<input id="gnapp_mhs" name="gnapp_mhs" type="text" class="form-control" placeholder="Masukkan NIM dan Nama...">
						<div class="input-group-append">
							<button id="gnapp_mhscari" name="gnapp_mhscari" class="btn btn-primary">Cari</button>
						</div>							
					</div>
					<div id="gnapp_mhslist"></div>
					<div id="tbl-appbymhs"></div>
				</div>
				<div class="tab-pane fade" id="tambah" role="tabpanel">
					...
				</div>
			</div>
		</div>
	</div>
</div>