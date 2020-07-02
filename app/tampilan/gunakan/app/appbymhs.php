<div class="mt-4">
	<p class="text-center">Hasil Pencarian: <?php echo $data['angka']; ?> data ditemukan.</p>
	<form action="<?php echo BASIS_URL; ?>/gunakan/app/update" method="post" id="frm-listalatmhs">

		<div class="table-responsive">
			<?php $no = 1; ?>
			<table class="table table-striped">
				<thead class="text-center">
					<tr>
						<th>No.</th>
						<th>Kode Pinjam</th>
						<th>Nama Alat</th>
						<th>No. Seri</th>
						<th>Mulai</th>
						<th>Selesai</th>
					</tr>
				</thead>
				<tbody class="dt-tbl-gnapp-kembali">
					<?php if ($data['hasil'] == null): ?>
						<tr>
							<td class="text-center" colspan="6">Tidak ada data.</td>
						</tr>
					<?php else: ?>
						
						<?php foreach ($data['hasil'] as $gpp_m): ?>
							<script type="text/javascript">
								var mhs = "<?php echo $gpp_m['gnapp_mhs']; ?>";
								var gpp = "<?php echo $gpp_m['gnapp_id']; ?>";
								var app = "<?php echo $gpp_m['app_id']; ?>";
							</script>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $gpp_m['gnapp_id']; ?></td>
								<td><?php echo $gpp_m['app_nama'] ?></td>
								<td><?php echo $gpp_m['app_id']; ?></td>
								<td>
									<div class="badge badge-success"><?php echo $gpp_m['gnapp_awal']; ?></div>
								</td>
								<td>
									<select name="gnapp_kembali[]" id="gnapp_kembali" class="form-control">
										<option value="<?php echo $gpp_m['app_id'] . '/' . $gpp_m['gnapp_id'] . '/dipakai'; ?>">Dipakai</option>
										<option value="<?php echo $gpp_m['app_id'] . '/' . $gpp_m['gnapp_id'] . '/kembali'; ?>">Kembali</option>
										<option value="<?php echo $gpp_m['app_id'] . '/' . $gpp_m['gnapp_id'] . '/rusak'; ?>">Rusak/Hilang</option>
									</select>
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
			<input type="submit" name="kirim" id="kirim" value="Laporkan" class="btn btn-primary form-control	">
		</div>
	</form>
</div>