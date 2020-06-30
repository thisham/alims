<div class="container mt-4">
	<h3><?php echo $data['judul']; ?></h3>
	<hr>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>ID Pemakaian</th>
						<td><?php echo $data['infos']['gnadl_id']; ?></td>
					</tr>
					<tr>
						<th>Alat</th>
						<td><a href="<?php echo BASIS_URL . '/data/adl/detail/' . $data['infos']['adl_id']; ?>"><?php echo $data['infos']['adl_id']; ?> - <?php echo $data['infos']['adl_nama']; ?></a></td>
					</tr>
					<tr>
						<th>Praktikan</th>
						<td><?php echo $data['infos']['mhs_nim']; ?> - <?php echo $data['infos']['mhs_nama']; ?></td>
					</tr>
					<tr>
						<th>Angkatan / Kelas</th>
						<td><?php echo $data['infos']['mhs_angkatan']; ?> / <?php echo $data['infos']['mhs_kelas']; ?></td>
					</tr>
					<tr>
						<th>Mata Kuliah</th>
						<td>(<?php echo $data['infos']['mtk_id']; ?>) <?php echo $data['infos']['mtk_nama']; ?> - Semester <?php echo $data['infos']['mtk_periode']; ?></td>
					</tr>
					<tr>
						<th>Dosen Pengampu</th>
						<td><?php echo $data['infos']['dsn_id'] . ' - ' . $data['infos']['dsn_nama']; ?></td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<?php if ($data['infos']['gnadl_awal'] != 0 AND $data['infos']['gnadl_akhir'] == 0): ?>
								<div class="badge badge-success">Dipakai</div>
							<?php else: ?>
								<div class="badge badge-secondary">Selesai</div>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<th>Praktikum</th>
						<td>
							<?php if ($data['infos']['gnadl_awal'] != 0 AND $data['infos']['gnadl_akhir'] == 0): ?>
								<div class="badge badge-success"><i>Dimulai pada <?php echo $data['infos']['gnadl_awal']; ?></i></div> ~ <a href="<?php echo BASIS_URL . '/gunakan/adl/update/' . $data['infos']['gnadl_id'] . '/selesai'; ?>" class="btn btn-danger btn-sm">Selesai</a>
							<?php else: ?>
								<div class="badge badge-success"><i><?php echo $data['infos']['gnadl_awal']; ?></i> ~ <i><?php echo $data['infos']['gnadl_akhir']; ?></i></div>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<th>TTD Laboran</th>
						<td><?php echo '<strong>' . $data['infos']['nama'] . '</strong> pada ' . $data['infos']['gnadl_sign']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>