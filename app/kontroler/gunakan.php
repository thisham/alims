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
				// var_dump($_POST);
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

	function app($menu = '', $id = '', $aksi = '', $app_id = '', $gpp_id = '')
	{
		switch ($menu) {
			case 'tambahin':
				$data = 0;
				for ($i=0; $i < $_POST['gnapp_appsum']; $i++) { 
					$kirim  = array(
						'mhs'	=> explode(' - ', $_POST['gnapp_mhs']), 
						'dsn'	=> $_POST['gnapp_dsn'], 
						'mtk'	=> explode(' - ', $_POST['gnapp_mtk']),
						'inv'	=> 'APP' . $_POST['gnapp_appname'] . '-' . sprintf("%03s", $_POST['gnapp_noalat'][$i]),
						'IDs'	=> $this->model('m_gunakan')->gnapp_idbaru(),
						'usr'	=> $this->datasesi('user')
					);
					$hasil = $this->model('m_gunakan')->gnapp_tambah($kirim);
					$data = $data + $hasil;
				}
				
				if ($data > 0) {
					Flasher::setFlash('Data peminjaman alat pinjam-pakai', 'telah dicatat', 'Sebanyak ' . $data . ' baris terpengaruh.', 'success');
					header('location:' . BASIS_URL . '/gunakan/app');
					exit;
				} else {
					Flasher::setFlash('Data peminjaman alat pinjam-pakai', 'tidak dicatat', '', 'success');
					header('location:' . BASIS_URL . '/gunakan/app');
					exit;
				}
				
				break;

			case 'carimhs-pinjam':
				if ($id != '') {
					$data = $this->model('m_gunakan')->gnapp_listDipakaiMHS($id);
					$this->tampilkan('gunakan/app/appbymhs', $data);
				}
				break;

			case 'update':
				$hitung = 0;
				foreach ($_POST['gnapp_kembali'] as $data) {
					$status = explode('/', $data);
					switch ($status[2]) {
						case 'kembali':
							$hasil = $this->model('m_gunakan')->gnapp_kembali($status[1], $status[0]);
							break;

						case 'rusak':
							$this->model('m_gunakan')->gnapp_rusak($status[1], $status[0]);
							break;
						
						default:
							# code...
							break;
					}
					$hitung = $hitung + $hasil;
					var_dump($status);
				}
				header('location:' . BASIS_URL . '/gunakan/app');
				Flasher::setFlash('Laporan', 'diterima', 'Sebanyak ' . $hasil . ' perubahan dilakukan.', 'primary');
				exit;
				// switch ($aksi) {
				// 	case 'kembaliin':
				// 		
				// 		$data = $this->model('m_gunakan')->gnapp_listDipakaiMHS($id);
				// 		$this->tampilkan('gunakan/app/appbymhs', $data);
				// 		break;

				// 	case 'rusakin':
				// 		
				// 		$data = $this->model('m_gunakan')->gnapp_listDipakaiMHS($id);
				// 		$this->tampilkan('gunakan/app/appbymhs', $data);
				// 		break;
					
				// 	default:
				// 		
				// 		break;
				// }
				break;

			case 'appsumarray':
				if ($id != '' AND $aksi != '') {
					$data = array(
						'angka' => $id,
						'label'	=> $aksi
					);
					$this->tampilkan('gunakan/app/appsumform', $data);
				}
				break;

			case 'detail':
				# code...
				break;

			default:
				$data = array(
					'judul'	=> 'Penggunaan Alat Pinjam-Pakai',
					'pages'	=> 'Penggunaan',
					'newID'	=> $this->model('m_gunakan')->gnapp_idbaru(),
					'dosen'	=> $this->model('m_warga')->dsn_list(),
					'gpp_a'	=> $this->model('m_gunakan')->gnapp_list(),
					'gpp_r'	=> $this->model('m_gunakan')->gnapp_listRusak(),
					'gpp_p'	=> $this->model('m_gunakan')->gnapp_listDipakai(),
					'dtapp'	=> $this->model('m_inventaris')->app_listJenis()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/app/index', $data);
				$this->tampilkan('templat/footer', $data);
				break;
		}
	}

}