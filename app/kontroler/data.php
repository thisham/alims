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
			'judul'	=> 'Data',
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
				// 		'judul'	=> 'Tambah Data Mahasiswa',
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
						'judul'	=> 'Edit Data Mahasiswa',
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
						'judul'	=> 'Detail Mahasiswa',
						'pages'	=> 'Data',
						'mhs'	=> $this->model('m_warga')->mhs_detail($id),
						'glb'	=> $this->model('m_gunakan')->gnlab_bymhs($id)
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
						'judul'	=> 'Tambah Data Mahasiswa',
						'pages'	=> 'Data',
						'hasil'	=> $this->model('m_warga')->mhs_cari($_POST['cari'])
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/edu/mhs/cari', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Mahasiswa',
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
				// 		'judul'	=> 'Tambah Data Dosen',
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
						'judul'	=> 'Edit Data Dosen',
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
						'judul'	=> 'Detail Dosen',
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
						'judul'	=> 'Tambah Data Dosen',
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
						'judul'	=> 'Data Dosen',
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
				// 		'judul'	=> 'Tambah Data Laboratorium',
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
						'judul'	=> 'Edit Data Laboratorium',
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
						'judul'	=> 'Detail Laboratorium',
						'pages'	=> 'Data',
						'gnlab'	=> $this->model('m_gunakan')->gnlab_byLab($id),
						'dtadl'	=> $this->model('m_inventaris')->adl_byLab($id),
						'labs'	=> $this->model('m_inventaris')->lab_detail($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/lab/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				default:
					$data = array(
						'judul'	=> 'Data Laboratorium',
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

		function adl($menu = '', $id = '')
		{
			switch ( $menu ) {
				// case 'tambah':
				// 	$data = array(
				// 		'judul'	=> 'Tambah Data Alat dalam Laboratorium',
				// 		'pages'	=> 'Data',
				// 		'labs'	=> $this->model('m_inventaris')->lab_list(),
				// 		'baru'	=> $this->model('m_inventaris')->adl_idbaru()
				// 	);
				// 	$this->tampilkan('templat/header', $data);
				// 	$this->tampilkan('templat/navbar_dash', $data);
				// 	$this->tampilkan('data/inv/adl/tambah', $data);
				// 	$this->tampilkan('templat/footer', $data);
				// 	break;

				case 'tambahin':
					$data = 0;
					for ($i = 0; $i < $_POST['adl_jumlah'] ; $i++) { 
						$nomor = $this->model('m_inventaris')->adl_idbaru();
						$hasil = $this->model('m_inventaris')->adl_tambah($_POST, $nomor);
						$data = $data + $hasil;
					}
					
					if ( $data > 0 ) {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'berhasil ditambahkan', 'Sebanyak ' . $data . ' baris data terpengaruh.', 'success');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					} else {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Alat dalam Laboratorium',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_inventaris')->adl_detail($id),
						'labs'	=> $this->model('m_inventaris')->lab_list()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/adl/edit', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'editin':
					if ( $this->model('m_inventaris')->adl_edit($_POST) > 0 ) {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'berhasil diubah', '', 'success');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					} else {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'gagal diubah', '', 'danger');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					}
					break;

				case 'detail':
					$data = array(
						'judul'	=> 'Detail Alat dalam Laboratorium',
						'pages'	=> 'Data',
						'infos'	=> $this->model('m_inventaris')->adl_detail($id),
						'gnadl'	=> $this->model('m_gunakan')->gnadl_byADL($id)
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/adl/detail', $data);
					$this->tampilkan('templat/footer', $data);
					break;

				case 'hapus':
					if ( $this->model('m_inventaris')->adl_hapus($id) > 0 ) {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					} else {
						Flasher::setFlash('Data Alat dalam Laboratorium', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/adl');
						exit;
					}
					break;
				
				default:
					$data = array(
						'judul'	=> 'Data Alat dalam Laboratorium',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_inventaris')->adl_list(),
						'labs'	=> $this->model('m_inventaris')->lab_list(),
						'baru'	=> $this->model('m_inventaris')->adl_idbaru()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/adl/read-all', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
		}

		function app($menu = '', $id = '')
		{
			switch ($menu) {
				case 'tambahin':
					// var_dump($_POST);
					$_POST['app_volume'] = sprintf("%04s", $_POST['app_volume']);
					$data = 0;
					for ($i = 0; $i < $_POST['app_jumlah'] ; $i++) { 
						$nomor = $this->model('m_inventaris')->app_idbaru($_POST['app_label'] . $_POST['app_volume']);
						$hasil = $this->model('m_inventaris')->app_tambah($_POST, $nomor);
						$data = $data + $hasil;
					}
					
					if ( $data > 0 ) {
						Flasher::setFlash('Data alat pinjam-pakai', 'berhasil ditambahkan', 'Sebanyak ' . $data . ' baris data terpengaruh.', 'success');
						header('location:' . BASIS_URL . '/data/app');
						exit;
					} else {
						Flasher::setFlash('Data alat pinjam-pakai', 'gagal ditambahkan', '', 'danger');
						header('location:' . BASIS_URL . '/data/app');
						exit;
					}
					break;

				case 'edit':
					# code...
					break;

				case 'editin':
					# code...
					break;

				case 'hapus':
					if ($this->model('m_inventaris')->app_hapus($id) > 0) {
						Flasher::setFlash('Data alat pinjam-pakai', 'berhasil dihapus', '', 'success');
						header('location:' . BASIS_URL . '/data/app');
						exit;
					} else {
						Flasher::setFlash('Data alat pinjam-pakai', 'gagal dihapus', '', 'danger');
						header('location:' . BASIS_URL . '/data/app');
						exit;
					}
					
					break;

				case 'detail':
					# code...
					break;
				
				default:
					$data = array(
						'judul'	=> 'Data Alat Pinjam-Pakai',
						'pages'	=> 'Data',
						'lists'	=> $this->model('m_inventaris')->app_list()
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('data/inv/app/read-all', $data);
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
				// 		'judul'	=> 'Data Program Studi',
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
						header('location:' . BASIS_URL . '/data/prodi');
						exit;
					}
					break;

				case 'edit':
					$data = array(
						'judul'	=> 'Edit Data Program Studi',
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
						'judul'	=> 'Data Program Studi',
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
								'judul' => 'Kesalahan 404'
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
						'judul' => 'Edit Data Mata Kuliah',
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
						'judul' => 'Detail Mata Kuliah',
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
						'judul'	=> 'Data Mata Kuliah',
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
						'judul'	=> 'Data Mata Kuliah',
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

	// Auto Complete Ajax

		function autcajax($kueri = '')
		{
			switch ($kueri) {
				case 'mhs':
					if ( isset($_POST['kueri_mhs']) ) {
						$data = $this->model('m_ajax')->cari_mhs($_POST['kueri_mhs']);
						$this->tampilkan('ajax/autc/mhs', $data);
					}
					break;

				case 'mtk':
					if ( isset($_POST['kueri_mtk']) ) {
						$data = $this->model('m_ajax')->cari_mtk($_POST['kueri_mtk']);
						$this->tampilkan('ajax/autc/mtk', $data);
					}
					break;
				
				default:
					$data = array(
						'judul'	=> 'Halaman Tidak Ditemukan'
					);
					$this->tampilkan('templat/header', $data);
					$this->tampilkan('templat/navbar_dash', $data);
					$this->tampilkan('error/er404', $data);
					$this->tampilkan('templat/footer', $data);
					break;
			}
			
		}
}