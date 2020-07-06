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
			'judul'	=> 'Akun Saya',
			'usr'	=> $this->model('m_dasbor')->data_usr($this->datasesi('user'))
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('akun/index', $data);
		$this->tampilkan('templat/footer', $data);
	}
}