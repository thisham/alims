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
			<?php if ($data['gpp_a'] == ''): ?>
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