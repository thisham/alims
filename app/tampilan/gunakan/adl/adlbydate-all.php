<div class="table-responsive">
	<table class="table table-striped text-center">
		<?php $no = 1; ?>
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