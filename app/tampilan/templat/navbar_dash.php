<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	    <a class="navbar-brand" href="<?php echo BASIS_URL; ?>">ALIMS</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
	    	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="navbar-nav">
	    		<li class="nav-item <?php if ($data['pages'] == 'Dasbor') echo 'active'; ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/dasbor">Dasbor<span class="sr-only">(current)</span></a>
	      		</li>
	      		<li class="nav-item <?php if ($data['pages'] == 'Penggunaan') echo 'active'; ?> dropdown">
	      			<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown">Penggunaan</a>
	      			<div class="dropdown-menu">
	      				<a href="<?php echo BASIS_URL; ?>/gunakan/lab" class="dropdown-item">Laboratorium</a>
	      				<a href="<?php echo BASIS_URL; ?>/gunakan/adl" class="dropdown-item">Alat dalam Lab</a>
	      				<a href="<?php echo BASIS_URL; ?>/gunakan/app" class="dropdown-item">Alat Pinjam-Pakai</a>
	      			</div>
	        	</li>
	        	<li class="nav-item <?php if ($data['pages'] == 'Data') echo 'active'; ?> dropdown">
	      			<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown">Data</a>
	      			<div class="dropdown-menu">
	      				<a href="<?php echo BASIS_URL; ?>/data/lab" class="dropdown-item">Laboratorium</a>
	      				<a href="<?php echo BASIS_URL; ?>/data/adl" class="dropdown-item">Alat dalam Lab</a>
	      				<a href="<?php echo BASIS_URL; ?>/data/app" class="dropdown-item">Alat Pinjam-Pakai</a>
	      				<div class="dropdown-divider"></div>
	      				<a href="<?php echo BASIS_URL; ?>/data/mhs" class="dropdown-item">Mahasiswa</a>
	      				<a href="<?php echo BASIS_URL; ?>/data/dsn" class="dropdown-item">Dosen</a>
	      				<a href="<?php echo BASIS_URL; ?>/data/prodi" class="dropdown-item">Program Studi</a>
	      				<a href="<?php echo BASIS_URL; ?>/data/mtk" class="dropdown-item">Mata Kuliah</a>
	      			</div>
	        	</li>
	      		<li class="nav-item <?php if ($data['pages'] == 'Tentang') echo 'active'; ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/tentang">Tentang</a>
	        	</li>
	    	</ul>
		    	
	  	</div>
	  	<div class="btn-group mr-1" role="group">
			<a href="<?php echo BASIS_URL; ?>/portal" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
			<div class="dropdown-menu">
				<a href="#" class="dropdown-item">Pengaturan</a>
				<a href="<?php echo BASIS_URL; ?>/portal/keluar" class="dropdown-item">Keluar</a>
			</div>
		</div>
	</div>
</nav>
<br>