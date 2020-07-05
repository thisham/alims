<?php

/**
 * 
 */
class beranda extends Kontroler
{

	function __construct()
	{
		if ($this->datasesi('user') != '') {
			header('location:' . BASIS_URL . '/dasbor');
		}
	}
	
	function indeks()
	{
		$data = array(	'judul' => 'Beranda',
						'pages' => 'Beranda',
						'nama'  => $this->model('model_pengguna')->getPengguna());
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('beranda/index', $data);
		$this->tampilkan('templat/footer');
	}
}