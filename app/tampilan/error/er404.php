<div class="container mt-4">
	<div class="jumbotron">
		<h1 class="display-4 text-center">Error 404!</h1>
		<p class="lead text-center">Hanya halaman ini yang tidak ditemukan, bukan jodoh Anda :D</p>
		<hr class="my-4">
		<center>
			<?php if ( isset($_SESSION['user']) ): ?>
				<a class="btn btn-primary btn-lg" href="<?php echo BASIS_URL; ?>/dasbor" role="button">Bali Omah</a>
			<?php else: ?>
				<a class="btn btn-primary btn-lg" href="<?php echo BASIS_URL; ?>/beranda" role="button">Bali Omah</a>
			<?php endif ?>
		</center>
	</div>
</div>