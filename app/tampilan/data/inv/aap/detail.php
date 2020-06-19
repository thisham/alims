<div class="container mt-4">
	<h3>Detail Alat Paten</h3>
	<hr>
	<?php Flasher::flash(); ?>
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
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
	</div>
</div>