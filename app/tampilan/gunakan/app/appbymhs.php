<div class="mt-4">Hasil Pencarian: <?php echo $data['angka']; ?> data ditemukan.</div>
<div class="table-responsive">
	<table class="table table-striped">
		<thead class="text-center">
			<tr>
				<th>No.</th>
				<th>Kode Pinjam</th>
				<th>Nama Alat</th>
				<th>No. Seri</th>
				<th>Mulai</th>
				<th>Selesai</th>
				<th>Rusak</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data['hasil'] as $gpp_m): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $gpp_m['gnapp_id']; ?></td>
					<td><?php echo $gpp_m['app_nama'] ?></td>
					<td><?php echo $gpp_m['app_id']; ?></td>
					<td><?php echo $gpp_m['gnapp_awal']; ?></td>
					<td><?php echo $gpp_m['gnapp_akhir']; ?></td>
					<td><?php echo $gpp_m['gnapp_rusak']; ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>