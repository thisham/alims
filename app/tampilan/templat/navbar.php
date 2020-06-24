<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	    <a class="navbar-brand" href="<?php echo BASIS_URL; ?>">ALIMS</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
	    	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="navbar-nav">
	    		<li class="nav-item <?php if ($data['pages'] == 'Beranda') { echo 'active'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>">Beranda<span class="sr-only">(current)</span></a>
	      		</li>
	      		<li class="nav-item <?php if ($data['pages'] == 'Penggunaan') { echo 'active'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/penggunaan">Penggunaan</a>
	        	</li>
	      		<li class="nav-item <?php if ($data['pages'] == 'Tentang') { echo 'active'; } ?>">
	        		<a class="nav-link" href="<?php echo BASIS_URL; ?>/tentang">Tentang</a>
	        	</li>
	    	</ul>
	  	</div>
	  	<div class="text-right mr-1">
			<a href="<?php echo BASIS_URL; ?>/portal" class="btn btn-outline-primary text-right">Admin</a>
		</div>
	</div>
</nav>
<br>