<div class="container mt-4">
	<h3>Detail Mata Kuliah</h3>
	<hr>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<form action="<?php echo BASIS_URL; ?>/gunakan/lab/tambahin" method="post">
					<div class="form-group">
						<label for="gnlab_id">Kode Pemakaian</label>
						<input type="text" name="gnlab_id" id="gnlab_id" class="form-control" value="<?php echo $data['newID']; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="gnlab_mhs">Nomor Induk Mahasiswa Praktikan</label>
						<div class="input-group">
							<input type="text" name="gnlab_mhs" id="gnlab_mhs" class="form-control" placeholder="Masukkan NIM...">
						</div>
					</div>
					<div class="form-group">
						<label for="gnlab_lab">Laboratorium</label>
						<select name="gnlab_lab" id="gnlab_lab" class="form-control">
							<option value="">-- Pilih Laboratorium --</option>
							<?php foreach ($data['labs'] as $lab): ?>
							<option value="<?php echo $lab['lab_id']; ?>"><?php echo $lab['lab_nama']; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="gnlab_mtk">Mata Kuliah</label>
						<select name="gnlab_mtk" id="gnlab_mtk" class="form-control">
							<option value="">-- Pilih Mata Kuliah --</option>
							<?php foreach ($data['mtkul'] as $mtk): ?>
								<option value="<?php echo $mtk['mtk_id']; ?>"><?php echo $mtk['mtk_akronim'] . ' - ' . $mtk['dsn_nama'] . ' (' . $mtk['mtk_periode'] . ')'; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="gnlab_dsn">Dosen</label>
						<div class="input-group">
							<select id="gnlab_dsn" name="gnlab_dsn" class="form-control">
								<option value="">-- Pilih Dosen --</option>
								<?php foreach ($data['dosen'] as $dsn): ?>
									<option value="<?php echo $dsn['dsn_id']; ?>"><?php echo $dsn['dsn_nama']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="gnlab_mulai">Rencana Pemakaian</label>
						<div class="input-group">
							<input type="date" name="gnlab_tanggal" id="gnlab_tanggal" class="form-control">
							<input type="time" name="gnlab_waktu" id="gnlab_waktu" class="form-control" step="1">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="gnlab_kirim" id="gnlab_kirim" class="btn btn-primary form-control" value="Kirim">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>