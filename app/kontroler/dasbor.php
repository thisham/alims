<?php

/**
 * 
 */
class dasbor extends Kontroler
{
	
	function __construct()
	{
		if ( $this->datasesi('user') == NULL ) {
			$data = array(
				'judul'	=> 'Akses Terbatas - ALIMS'
			);
			$this->tampilkan('templat/header', $data);
			$this->tampilkan('templat/navbar', $data);
			$this->tampilkan('error/er401');
			$this->tampilkan('templat/footer', $data);
			exit;
		}
	}
	
	function indeks()
	{
		$data = array(
			'judul'	=> 'Dasbor - ALIMS',
			'pages'	=> 'Dasbor'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('dasbor/dasbor', $data);
		$this->tampilkan('templat/footer');
	}
}