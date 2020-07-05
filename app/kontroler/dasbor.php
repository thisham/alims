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
			'judul'	=> 'Dasbor',
			'pages'	=> 'Dasbor',
			'dtc'	=> array(
				'lab'	=> count($this->model('m_dasbor')->data_lab()),
				'adl'	=> count($this->model('m_dasbor')->data_adl()),
				'app'	=> count($this->model('m_dasbor')->data_app()),
				'mhs'	=> count($this->model('m_dasbor')->data_mhs())
			),
			'gnc'	=> array(
				'glb'	=> count($this->model('m_dasbor')->guna_lab()),
				'gdl'	=> count($this->model('m_dasbor')->guna_adl()),
				'gpp'	=> count($this->model('m_dasbor')->guna_app())
			),
			'usr'	=> array(
				'ctr'	=> array(
					'gpp'	=> count($this->model('m_dasbor')->contribution_app($this->datasesi('user'))),
					'glb'	=> count($this->model('m_dasbor')->contribution_lab($this->datasesi('user'))),
					'gdl'	=> count($this->model('m_dasbor')->contribution_adl($this->datasesi('user')))
				),
				'dtl'	=> $this->model('m_dasbor')->data_usr($this->datasesi('user'))
			)
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('dasbor/dasbor', $data);
		$this->tampilkan('templat/footer');
	}
}