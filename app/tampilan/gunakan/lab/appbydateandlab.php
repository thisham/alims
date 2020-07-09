<?php $no = 1; ?>
<table class="table table-striped text-center">
	<thead>
		<tr class="text-center">
			<th>No.</th>
			<th>Kode</th>
			<th>Tanggal</th>
			<th>Laboratorium</th>
			<th>Awal</th>
			<th>Akhir</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($data['gnlab'] == NULL): ?>
			<tr>
				<td colspan="7" class="text-center">Tidak ada data.</td>
			</tr>
		<?php else: ?>
			<?php foreach ($data['gnlab'] as $gnlab): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><a href="<?php echo BASIS_URL . '/gunakan/lab/detail/' . $gnlab['gnlab_id']; ?>"><?php echo $gnlab['gnlab_id']; ?></a></td>
					<td><?php echo $gnlab['gnlab_sign'] ?></td>
					<td><?php echo $gnlab['lab_nama']; ?></td>
					<td><?php echo $gnlab['gnlab_awal']; ?></td>
					<td>
						<?php if ($gnlab['gnlab_akhir'] == 0): ?>
							<div class="badge badge-warning">Belum Selesai</div>
						<?php else: ?>
							<?php echo $gnlab['gnlab_akhir']; ?></td>
						<?php endif ?>
					<td>
						<?php if ($gnlab['gnlab_awal'] != 0 AND $gnlab['gnlab_akhir'] == 0): ?>
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