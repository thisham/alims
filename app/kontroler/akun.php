<?php 

/**
 * 
 */
class akun extends Kontroler
{
	
	function __construct()
	{
		if ( $this->datasesi('user') == NULL ) {
			$data = array(
				'judul'	=> 'Akses Terbatas'
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
			'judul'	=> 'Akun Saya'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('akun/index', $data);
		$this->tampilkan('templat/footer', $data);
	}
}