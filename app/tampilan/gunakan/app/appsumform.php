<div class="container mt-4">
	<div class="card">
		<div class="card-body">
			<?php for ($i=0; $i < $data['angka']; $i++) { ?>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">APP<?php echo $data['label']; ?>-</span>
						</div>
						<input type="number" name="gnapp_noalat[]" id="gnapp_noalat" class="form-control" required>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>