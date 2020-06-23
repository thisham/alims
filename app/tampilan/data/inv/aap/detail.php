<div class="container mt-4">
	<h3>Detail Alat Paten</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab">Detail</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab">Riwayat</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="detail" role="tabpanel">
						<div class="table-responsive">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Kode Alat</th>
										<td><?php echo $data['infos']['aap_id']; ?></td>
									</tr>
									<tr>
										<th>Nama Alat</th>
										<td><?php echo $data['infos']['aap_nama']; ?></td>
									</tr>
									<tr>
										<th>Sumber Anggaran</th>
										<td><?php echo $data['infos']['aap_anggaran']; ?></td>
									</tr>
									<tr>
										<th>Letak Alat</th>
										<td>Laboratorium <?php echo $data['infos']['lab_nama']; ?> (<?php echo $data['infos']['lab_lokasi']; ?>)</td>
									</tr>
									<tr>
										<th>Merek</th>
										<td><?php echo $data['infos']['aap_merek']; ?></td>
									</tr>
									<tr>
										<th>Tipe</th>
										<td><?php echo $data['infos']['aap_tipe']; ?></td>
									</tr>
									<tr>
										<th>Tanggal Inventaris</th>
										<td><?php echo $data['infos']['aap_tanggal']; ?></td>
									</tr>
									<tr>
										<th>Nomor Inventaris</th>
										<td><?php echo $data['infos']['aap_noinv']; ?></td>
									</tr>
									<tr>
										<th>Spesifikasi/Deskripsi Alat Paten</th>
										<td><?php echo $data['infos']['aap_spesifikasi']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="riwayat" role="tabpanel">
						<!-- <div class="table-responsive">
							<table class="table table-striped">
								
							</table>
						</div> -->
						...
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>