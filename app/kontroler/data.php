<?php 

/**
 * 
 */
class data extends Kontroler
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
			'judul'	=> 'Data - ALIMS',
			'pages'	=> 'Data'
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('data/index', $data);
		$this->tampilkan('templat/footer', $data);
	}

	// Warga

		function mhs($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Tambah Data Mahasiswa - ALIMS',
				// 		'pages'	=> 'Data',
				// 		'prodi'	=> $this->model('m_akademik')->prodi_list()
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/edu/mhs/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					if ( $this->model('m_warga')->mhs_tambah($_POST) > 0 ) {
						Flasher::setFlash('Data mahasiswa', 'berhasil ditambahkan', '', 'success');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					} else {
						Flasher::setFlash('Data mahasiswa', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Mahasiswa - ALIMS',
						'pages'	=> 'Data',
						'prodi'	=> $this->model('m_akademik')->prodi_list(),
						'mhs'	=> $this->model('m_warga')->mhs_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mhs/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;
				
				case 'editin':
					if ( $this->model('m_warga')->mhs_edit($_POST) > 0 ) {
						Flasher::setFlash('Data dosen', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					} else {
						Flasher::setFlash('Data dosen', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul'	=> 'Detail Mahasiswa - ALIMS',
						'pages'	=> 'Data',
						'mhs'	=> $this->model('m_warga')->mhs_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mhs/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'hapus':
					if ( $this->model('m_warga')->mhs_hapus($id) > 0 ) {
						Flasher::setFlash('Data mahasiswa', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					} else {
						Flasher::setFlash('Data mahasiswa', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/mhs');
						exit;
					}
					break;

				case 'cari':
					$data = array(
						'judul'	=> 'Tambah Data Mahasiswa - ALIMS',
						'pages'	=> 'Data',
						'hasil'	=> $this->model('m_warga')->mhs_cari($_POST)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mhs/cari', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Mahasiswa - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_warga')->mhs_list(),
						'prodi'	=> $this->model('m_akademik')->prodi_list()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mhs/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}	
		}

		function dsn($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Tambah Data Dosen - ALIMS',
				// 		'pages'	=> 'Data',
				// 		'baru'	=> $this->model('m_warga')->dsn_idbaru()
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/edu/dsn/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					if ( $this->model('m_warga')->dsn_tambah($_POST) > 0 ) {
						Flasher::setFlash('Data dosen', 'berhasil ditambahkan', '', 'success');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					} else {
						Flasher::setFlash('Data dosen', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Dosen - ALIMS',
						'pages'	=> 'Data',
						'dosen'	=> $this->model('m_warga')->dsn_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/dsn/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;
				
				case 'editin':
					if ( $this->model('m_warga')->dsn_edit($_POST) > 0 ) {
						Flasher::setFlash('Data dosen', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					} else {
						Flasher::setFlash('Data dosen', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul'	=> 'Detail Dosen - ALIMS',
						'pages'	=> 'Data',
						'dosen'	=> $this->model('m_warga')->dsn_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/dsn/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'hapus':
					if ( $this->model('m_warga')->dsn_hapus($id) > 0 ) {
						Flasher::setFlash('Data dosen', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					} else {
						Flasher::setFlash('Data dosen', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/dsn');
						exit;
					}
					break;

				case 'cari':
					$data = array(
						'judul'	=> 'Tambah Data Dosen - ALIMS',
						'pages'	=> 'Data',
						'hasil'	=> $this->model('m_warga')->dsn_cari($_POST)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/dsn/cari', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Dosen - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_warga')->dsn_list(),
						'baru'	=> $this->model('m_warga')->dsn_idbaru()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/dsn/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}	
		}

	// Inventaris

		function lab($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Tambah Data Laboratorium - ALIMS',
				// 		'pages'	=> 'Data',
				// 		'users'	=> $this->model('m_portal')->list_user(),
				// 		'baru'	=> $this->model('m_inventaris')->lab_idbaru()
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/inv/lab/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					if ( $this->model('m_inventaris')->lab_tambah($_POST) > 0 ) {
						Flasher::setFlash('Data laboratorium', 'berhasil ditambahkan', '', 'success');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					} else {
						Flasher::setFlash('Data laboratorium', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Laboratorium - ALIMS',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_inventaris')->lab_detail($id),
						'users'	=> $this->model('m_portal')->list_user()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/lab/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;
				
				case 'editin':
					if ( $this->model('m_inventaris')->lab_edit($_POST) > 0 ) {
						Flasher::setFlash('Data laboratorium', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					} else {
						Flasher::setFlash('Data laboratorium', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					}
					break;

				case 'hapus':
					if ( $this->model('m_inventaris')->lab_hapus($id) > 0 ) {
						Flasher::setFlash('Data laboratorium', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					} else {
						Flasher::setFlash('Data laboratorium', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/lab');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul'	=> 'Detail Laboratorium - ALIMS',
						'pages'	=> 'Data',
						'gnlab'	=> $this->model('m_gunakan')->gnlab_byLab($id),
						'labs'	=> $this->model('m_inventaris')->lab_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/lab/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Laboratorium - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_inventaris')->lab_list(),
						'users'	=> $this->model('m_portal')->list_user(),
						'baru'	=> $this->model('m_inventaris')->lab_idbaru()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/lab/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
		}

		function aap($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Tambah Data Alat Paten - ALIMS',
				// 		'pages'	=> 'Data',
				// 		'labs'	=> $this->model('m_inventaris')->lab_list(),
				// 		'baru'	=> $this->model('m_inventaris')->aap_idbaru()
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/inv/aap/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					$data = 0;
					for ($i = 0; $i < $_POST['aap_jumlah'] ; $i++) { 
						$nomor = $this->model('m_inventaris')->aap_idbaru();
						$hasil = $this->model('m_inventaris')->aap_tambah($_POST, $nomor);
						$data = $data + $hasil;
					}
					
					if ( $data > 0 ) {
						Flasher::setFlash('Data alat paten', 'berhasil ditambahkan', 'Sebanyak ' . $data . ' baris data terpengaruh.', 'success');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					} else {
						Flasher::setFlash('Data alat paten', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Alat Paten - ALIMS',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_inventaris')->aap_detail($id),
						'labs'	=> $this->model('m_inventaris')->lab_list()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/aap/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'editin':
					if ( $this->model('m_inventaris')->aap_edit($_POST) > 0 ) {
						Flasher::setFlash('Data alat paten', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					} else {
						Flasher::setFlash('Data alat paten', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul'	=> 'Detail Alat Paten - ALIMS',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_inventaris')->aap_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/aap/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'hapus':
					if ( $this->model('m_inventaris')->aap_hapus($id) > 0 ) {
						Flasher::setFlash('Data alat paten', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					} else {
						Flasher::setFlash('Data alat paten', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/aap');
						exit;
					}
					break;
				
				default:
					$data = array(
						'judul'	=> 'Data Alat Paten - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_inventaris')->aap_list(),
						'labs'	=> $this->model('m_inventaris')->lab_list(),
						'baru'	=> $this->model('m_inventaris')->aap_idbaru()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/aap/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
		}

	// Akademik

		function prodi($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Data Program Studi - ALIMS',
				// 		'pages'	=> 'Data'
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/edu/prodi/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					if ( $this->model('m_akademik')->prodi_tambah($_POST) > 0 ) {
						Flasher::setFlash('Data program studi', 'berhasil ditambahkan', '', 'success');
						header('location:' . BASIS_URL . '/data/prodi');
						exit;
					} else {
						Flasher::setFlash('Data program studi', 'gagal ditambahkan', '', 'danger');
						eader('location:' . BASIS_URL . '/data/prodi');
					exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Program Studi - ALIMS',
						'pages'	=> 'Data',
						'prodi'	=> $this->model('m_akademik')->prodi_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dsh', $data);
					$this->tampilkan('data/edu/prodi/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;
				
				case 'editin':
					if ( $this->model('m_akademik')->prodi_edit($_POST) > 0 ) {
						Flasher::setFlash('Data program studi', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/prodi');
						exit;
					} else {
						Flasher::setFlash('Data program studi', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_UR . '/data/prodi');
						exit;
					}
					break;

				case 'hapus':
					if ( $this->model('m_akademik')->prodi_hapus($id) > 0 ) {
						Flasher::setFlash('Data program studi', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/prodi');
						exit;
					} else {
					Flasher::setFlash('Data program studi', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/prodi');
						exit;
					}
					break;

				default:
					$data = array(
						'judul'	=> 'Data Program Studi - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_akademik')->prodi_list()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/prodi/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
		}

		function mtk($menu = '', $id = '', $aksi = '')
		{
			switch ($menu) {				
				case 'tambahin':
					if ( $this->model('m_akademik')->mtk_tambah($_POST) > 0 ) {
						Flasher::setFlash('Data mata kuliah', 'berhasil ditambahkan', '', 'success');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					} else {
						Flasher::setFlash('Data mata kuliah', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					}
					break;

				case 'update':
					switch ($aksi) {
						case 'buka':
							if ( $this->model('m_akademik')->mtk_buka($id) > 0 ) {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							} else {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							}
							break;

						case 'bukaulang':
							if ( $this->model('m_akademik')->mtk_bukaulang($id) > 0 ) {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							} else {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							}
							break;

						case 'tutup':
							if ( $this->model('m_akademik')->mtk_tutup($id) > 0 ) {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							} else {
								header('location:' . BASIS_URL . '/data/mtk/detail/' . $id);
							}
							break;
						
						default:
							$data = array(
								'judul' => 'Kesalahan 404 - ALIMS'
							);
							$this->tampilkan('templat/header', $data);
							$this->tampilkan('templat/navbar_dash', $data);
							$this->tampilkan('error/er404', $data);
							$this->tampilkan('templat/footer', $data);
							break;
					}
					break;

				case 'edit':
					$data = array(
						'judul' => 'Edit Data Mata Kuliah - ALIMS',
						'pages'	=> 'Data',
						'dosen' => $this->model('m_warga')->dsn_list(),
						'infos'	=> $this->model('m_akademik')->mtk_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mtk/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'editin':
					if ( $this->model('m_akademik')->mtk_edit($id) > 0 ) {
						Flasher::setFlash('Data mata kuliah', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					} else {
						Flasher::setFlash('Data mata kuliah', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					}
					break;

				case 'hapus':
					if ( $this->model('m_akademik')->mtk_hapus($id) > 0 ) {
						Flasher::setFlash('Data mata kuliah', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					} else {
						Flasher::setFlash('Data mata kuliah', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/mtk');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul' => 'Detail Mata Kuliah - ALIMS',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_akademik')->mtk_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mtk/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'cari':
					$data = array(
						'judul'	=> 'Data Mata Kuliah - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_akademik')->mtk_cari($_POST),
						'datas' => 'semua'
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mtk/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Mata Kuliah - ALIMS',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_akademik')->mtk_list($menu),
						'dosen' => $this->model('m_warga')->dsn_list(),
						'tahun' => $this->model('m_akademik')->mtk_periodebaru(),
						'baru'	=> $this->model('m_akademik')->mtk_idbaru(),
						'datas' => 'semua'
					);
					switch ($menu) {
						case 'aktif':
							$data['datas'] = 'aktif';
							break;
						
						case 'pasca':
							$data['datas'] = 'pasca';
							break;

						case 'pra':
							$data['datas'] = 'pra';
							break;

						case 'invalid':
							$data['datas'] = 'invalid';
							break;

						default:
							$data['datas'] = 'semua';
							break;
					}
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mtk/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
		}
}