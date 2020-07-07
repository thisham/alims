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

			case 'adlbytanggal':
				switch ($id) {
					case 'all':
						$data = array(
							'gdl_a' => $this->model('m_gunakan')->gnadl_list($_POST['gnadl_tgl'])
						);
						$this->tampilkan('gunakan/adl/adlbydate-all', $data);
						break;
					
					default:
						# code...
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
					'gdl_a'	=> $this->model('m_gunakan')->gnadl_list(date('Y-m-d')),
					'gdl_p'	=> $this->model('m_gunakan')->gnadl_aktif(),
					'dtadl'	=> $this->model('m_inventaris')->adl_list()
				);
				$this->tampilkan('templat/header', $data);
				$this->tampilkan('templat/navbar_dash', $data);
				$this->tampilkan('gunakan/adl/index', $data);
				$this->tampilkan('templat/footer', $data);
				break;
		}
	}

	function app($menu = '', $id = '', $aksi = '', $app_id = '')
	{
		switch ($menu) {
			case 'tambahin':
				$data = 0;
				for ($i=0; $i < count($_POST['gnapp_appname']); $i++) { 
					for ($j=0; $j < $_POST['gnapp_appsum'][$i]; $j++) { 
						$kirim  = array(
							'mhs'	=> explode(' - ', $_POST['gnapp_mhs']), 
							'dsn'	=> $_POST['gnapp_dsn'], 
							'mtk'	=> explode(' - ', $_POST['gnapp_mtk']),
							'inv'	=> 'APP' . $_POST['gnapp_appname'][$i] . '-' . sprintf("%03s", $_POST['gnapp_noalat'][$i][$j]),
							'IDs'	=> $this->model('m_gunakan')->gnapp_idbaru(),
							'usr'	=> $this->datasesi('user')
						);
						if ($_POST['gnapp_noalat'][$i][$j] != '') {
							$hasil = $this->model('m_gunakan')->gnapp_tambah($kirim);
						} else {
							$hasil = 0;
						}
						
						$data = $data + $hasil;
					}
				}
				
				if ($data > 0) {
					Flasher::setFlash('Data peminjaman alat pinjam-pakai', 'telah dicatat', 'Sebanyak ' . $data . ' baris terpengaruh.', 'success');
					header('location:' . BASIS_URL . '/gunakan/app');
					exit;
				} else {
					Flasher::setFlash('Data peminjaman alat pinjam-pakai', 'tidak dicatat', '', 'danger');
					header('location:' . BASIS_URL . '/gunakan/app');
					exit;
				}
				
				break;

			case 'carimhs-pinjam':
				if ($id != '') {
					$data = array(
						'hasil'	=> $this->model('m_gunakan')->gnapp_listDipakaiMHS($id),
						'angka'	=> count($this->model('m_gunakan')->gnapp_listDipakaiMHS($id))
					);
					$this->tampilkan('gunakan/app/appbymhs', $data);
				}
				break;

			case 'update':
				if ($id == '') {
					$hasil = 0;
					for ($i=0; $i < count($_POST['gnapp_kembali']); $i++) {
						$status = explode('/', $_POST['gnapp_kembali'][$i]); 
						var_dump($status) . PHP_EOL;
						switch ($status[2]) {
							case 'kembali':
								$baris = $this->model('m_gunakan')->gnapp_kembali($status[1], $status[0]);
								break;

							case 'rusak':
								$baris = $this->model('m_gunakan')->gnapp_rusak($status[1], $status[0]);
								break;
							
							default:
								# code...
								break;
						}
						$hasil = $hasil + $baris;
					}
					header('location:' . BASIS_URL . '/gunakan/app');
					Flasher::setFlash('Laporan', 'diterima', 'Sebanyak ' . $hasil . ' perubahan dilakukan.', 'primary');
					exit;
					
				} else {
					switch ($aksi) {
						case 'ganti':
							if ($this->model('m_gunakan')->gnapp_kembali($id, $app_id) > 0) {
								Flasher::setFlash('Penggantian alat', 'telah dicatat', '', 'success');
								header('location:' . BASIS_URL . '/gunakan/app');
								exit;
							} else {
								Flasher::setFlash('Penggantian alat', 'tidak dicatat', '', 'success');
								header('location:' . BASIS_URL . '/gunakan/app');
								exit;
							}
							break;
						
						default:
							# code...
							break;
					}
				}
				
					
				break;

			case 'appsumarray':
				if ($id != '' AND $aksi != '') {
					$data = array(
						'angka' => $id,
						'label'	=> $aksi,
						'larik'	=> $app_id
					);
					$this->tampilkan('gunakan/app/appsumform', $data);
				}
				break;

			case 'appbytanggal':
				switch ($id) {
					case 'all':
						$data = array(
							'gpp_a' => $this->model('m_gunakan')->gnapp_list($_POST['gnapp_tgl_all'])
						);
						$this->tampilkan('gunakan/app/appbydate-all', $data);
						break;
					
					default:
						# code...
						break;
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
					'gpp_a'	=> $this->model('m_gunakan')->gnapp_list(date('Y-m-d')),
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

	function graphbydate($menu = '', $pekan = 25, $tanggal = 27, $bulan = 6, $tahun = 2020)
	{
		switch ($menu) {
			case 'adl':
				$hasil = array(
					'pekan' => 0,
					'tahun' => 0,
					'tanggal' => 0,
					'bulan' => 0,
				);
				$varData = $this->model('m_gunakan')->gnadl_listToGraph();
				foreach ($varData as $data) {
					if ($data['pekan'] == $pekan) {
						$hasil['pekan']++;
					}
					if ($data['tahun'] == $tahun) {
						$hasil['tahun']++;
					}
					if ($data['tanggal'] == $tanggal) {
						$hasil['tanggal']++;
					}
					if ($data['bulan'] == $bulan) {
						$hasil['bulan']++;
					}
					var_dump($data); echo '<br>';
				}
				print_r($hasil);
				break;
			
			default:
				# code...
				break;
		}
	}
}