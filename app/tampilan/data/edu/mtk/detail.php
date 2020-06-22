<div class="container mt-4">
	<h3>Detail Mata Kuliah</h3>
	<hr>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>ID Mata Kuliah</th>
						<td><?php echo $data['infos']['mtk_id']; ?></td>
					</tr>
					<tr>
						<th>Kode Mata Kuliah</th>
						<td><?php echo $data['infos']['mtk_kode']; ?></td>
					</tr>
					<tr>
						<th>Nama Mata Kuliah</th>
						<td><?php echo $data['infos']['mtk_nama']; ?></td>
					</tr>
					<tr>
						<th>Akronim</th>
						<td><?php echo $data['infos']['mtk_akronim']; ?></td>
					</tr>
					<tr>
						<th>Periode</th>
						<td><?php echo $data['infos']['mtk_periode']; ?></td>
					</tr>
					<tr>
						<th>Dosen Pengampu</th>
						<td><?php echo $data['infos']['mtk_dosen']; ?></td>
					</tr>
					<tr>
						<th>Pembukaan Periode</th>
						<td>
							<?php if ($data['infos']['mtk_buka'] == 0 AND $data['infos']['mtk_tutup'] == 0) { ?>
								<a href="<?php echo BASIS_URL . '/data/mtk/update/' . $data['infos']['mtk_id'] . '/buka'; ?>" class="btn btn-success">Buka Periode</a>
							<?php } elseif ($data['infos']['mtk_buka'] != 0 AND $data['infos']['mtk_tutup'] != 0) { ?>
								<a href="<?php echo BASIS_URL . '/data/mtk/update/' . $data['infos']['mtk_id'] . '/bukaulang'; ?>" class="btn btn-success">Buka Ulang Periode</a>
								<br>
								<small class="text-muted"><i>Timestamp akan ditulis tetap saat pembukaan perkuliahan pertama kali.</i></small>
							<?php } else { ?>
								<div class="badge badge-success"><i>Dibuka pada <?php echo $data['infos']['mtk_buka']; ?></i></div>
							<?php } ?>		
						</td>
					</tr>
					<tr>
						<th>Penutupan Periode</th>
						<td>
							<?php if ($data['infos']['mtk_tutup'] == 0) { ?>
								<a href="<?php echo BASIS_URL . '/data/mtk/update/' . $data['infos']['mtk_id'] . '/tutup'; ?>" class="btn btn-danger">Tutup Periode</a>
							<?php } else { ?>
								<div class="badge badge-danger"><i>Ditutup pada <?php echo $data['infos']['mtk_tutup']; ?></i></div>
							<?php } ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>