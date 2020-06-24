<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>ID Pemakaian</th>
						<td><?php echo $data['infos']['gnlab_id']; ?></td>
					</tr>
					<tr>
						<th>Laboratorium</th>
						<td><?php echo $data['infos']['lab_id']; ?> - <?php echo $data['infos']['lab_nama']; ?></td>
					</tr>
					<tr>
						<th>Praktikan</th>
						<td><?php echo $data['infos']['nim']; ?> - <?php echo $data['infos']['nama']; ?></td>
					</tr>
					<tr>
						<th>Angkatan / Kelas</th>
						<td><?php echo $data['infos']['angkatan']; ?> / <?php echo $data['infos']['kelas']; ?></td>
					</tr>
					<tr>
						<th>Mata Kuliah</th>
						<td>(<?php echo $data['infos']['mtk_id']; ?>) <?php echo $data['infos']['mtk_nama']; ?> - Semester <?php echo $data['infos']['mtk_periode']; ?></td>
					</tr>
					<tr>
						<th>Dosen Pengampu</th>
						<td><?php echo $data['infos']['mtk_dosen'] . ' - ' . $data['infos']['dsn_nama']; ?></td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<?php if ($data['infos']['gnlab_awal'] == 0 AND $data['infos']['gnlab_akhir'] == 0) { ?>
								<div class="badge badge-warning">Direncanakan</div>
							<?php } else if ($data['infos']['gnlab_awal'] != 0 AND $data['infos']['gnlab_akhir'] == 0) { ?>
								<div class="badge badge-success">Berjalan</div>
							<?php } else { ?>
								<div class="badge badge-secondary">Selesai</div>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<th>Praktikum</th>
						<td>
							<?php if ($data['infos']['gnlab_awal'] == 0 AND $data['infos']['gnlab_akhir'] == 0) { ?>
								<a href="<?php echo BASIS_URL . '/gunakan/lab/update/' . $data['infos']['gnlab_id'] . '/mulai'; ?>" class="btn btn-success btn-sm">Mulai</a>
							<?php } elseif ($data['infos']['gnlab_awal'] != 0 AND $data['infos']['gnlab_akhir'] == 0) { ?>
								<div class="badge badge-success"><i>Dibuka pada <?php echo $data['infos']['gnlab_awal']; ?></i></div> ~ <a href="<?php echo BASIS_URL . '/gunakan/lab/update/' . $data['infos']['gnlab_id'] . '/selesai'; ?>" class="btn btn-danger btn-sm">Tutup</a>
								<br>
							<?php } else { ?>
								<div class="badge badge-success"><i><?php echo $data['infos']['gnlab_awal']; ?></i> ~ <i><?php echo $data['infos']['gnlab_akhir']; ?></i></div>
							<?php } ?>		
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>