<?php

/**
 * 
 */
class gunakan extends Kontroler
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
			'judul'	=> 'Penggunaan',
			'pages'	=> 'Penggunaan'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('gunakan/index', $data);
		$this->tampilkan('templat/footer', $data);
	}

	function lab($menu = '', $id = '', $aksi = '')
	{
		switch ($menu) {
			case 'tambahin':
				if ( $this->model('m_gunakan')->gnlab_tambah($_POST, $this->datasesi('user')) > 0 ) {
					Flasher::setFlash('Data penggunaan laboratorium', 'telah dicatat', '', 'success');
					header('location:' . BASIS_URL . '/gunakan/lab');
					exit;
				} else {
					Flasher::setFlash('Data penggunaan laboratorium', 'tidak dicatat', '', 'danger');
					header('location:' . BASIS_URL . '/gunakan/lab');
					exit;
				}
				break;

			case 'update':
				switch ($aksi) {
					case 'mulai':
						$this->model('m_gunakan')->gnlab_mulaiPraktikum($id);
						header('location:' . BASIS_URL . '/gunakan/lab/detail/' . $id);
						break;
					
					case 'selesai':
						$this->model('m_gunakan')->gnlab_selesaiPraktikum($id);
						header('location:' . BASIS_URL . '/gunakan/lab/detail/' . $id);
						break;

					default:
						header('location:' . BASIS_URL . '/gunakan/lab/detail/' . $id);
						exit;
						break;
				}
				break;

			case 'detail':
				$data = array(
					'judul'	=> 'Detail Penggunaan Laboratorium',
					'pages'	=> 'Penggunaan',
					'infos'	=> $this->model('m_gunakan')->gnlab_detail($id)
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/lab/detail', $data);
				$this->tampilkan('templat/footer', $data);
				break;

			// case 'autc-dtmhs':
				
			// 	break;

			default:
				$data = array(
					'judul'	=> 'Penggunaan Laboratorium',
					'pages'	=> 'Penggunaan',
					'newID'	=> $this->model('m_gunakan')->gnlab_idbaru(),
					'mtkul'	=> $this->model('m_akademik')->mtk_list('aktif', 'list'),
					'dosen'	=> $this->model('m_warga')->dsn_list(),
					'gnlab'	=> $this->model('m_gunakan')->gnlab_list(),
					'labs'	=> $this->model('m_inventaris')->lab_list()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/lab/index', $data);
				$this->tampilkan('templat/footer', $data);
				break;
		}
	}

	function adl($menu = '', $id = '', $aksi = '')
	{
		switch ($menu) {
			case 'tambahin':
				// $this->model('m_gunakan')->gnadl_tambah($_POST, $this->datasesi('user'));
				if ( $this->model('m_gunakan')->gnadl_tambah($_POST, $this->datasesi('user')) > 0 ) {
					Flasher::setFlash('Data penggunaan alat dalam laboratorium', 'telah dicatat', '', 'success');
					header('location:' . BASIS_URL . '/gunakan/adl');
					exit;
				} else {
					Flasher::setFlash('Data penggunaan alat dalam laboratorium', 'tidak dicatat', '', 'danger');
					header('location:' . BASIS_URL . '/gunakan/adl');
					exit;
				}
				break;

			case 'update':
				switch ($aksi) {
					case 'mulai':
						$this->model('m_gunakan')->gnadl_mulai($id);
						header('location:' . BASIS_URL . '/gunakan/adl/detail/' . $id);
						break;
					
					case 'selesai':
						$this->model('m_gunakan')->gnadl_selesai($id);
						header('location:' . BASIS_URL . '/gunakan/adl/detail/' . $id);
						break;

					default:
						header('location:' . BASIS_URL . '/gunakan/adl/detail/' . $id);
						break;
				}
				break;

			case 'detail':
				$data = array(
					'judul'	=> 'Detail Peminjaman Alat',
					'pages'	=> 'Penggunaan',
					'infos'	=> $this->model('m_gunakan')->gnadl_detail($id)
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/adl/detail', $data);
				$this->tampilkan('templat/footer', $data);
				break;
			
			default:
				$data = array(
					'judul'	=> 'Penggunaan Alat dalam Laboratorium',
					'pages'	=> 'Penggunaan',
					'newID'	=> $this->model('m_gunakan')->gnadl_idbaru(),
					'dosen'	=> $this->model('m_warga')->dsn_list(),
					'gnadl'	=> $this->model('m_gunakan')->gnadl_list(),
					'dtadl'	=> $this->model('m_inventaris')->adl_list()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/adl/index', $data);
				$this->tampilkan('templat/footer', $data);
				break;
		}
	}

	function app($menu = '', $id = '', $aksi = '')
	{
		switch ($menu) {
			case 'tambahin':
				# c
				break;

			case 'update':
				# code...
				break;

			case 'detail':
				# code...
				break;

			default:
				$data = array(
					'judul'	=> 'Penggunaan Alat Pinjam-Pakai',
					'pages'	=> 'Penggunaan'
					// 'newID'	=> $this->model('m_gunakan')->gnapp_idbaru(),
					// 'dosen'	=> $this->model('m_warga')->dsn_list(),
					// 'gnapp'	=> $this->model('m_gunakan')->gnapp_list(),
					// 'dtapp'	=> $this->model('m_inventaris')->app_list()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/app/index', $data);
				$this->tampilkan('templat/footer', $data);
				break;
		}
	}

}