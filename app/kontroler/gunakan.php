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

	function lab($menu = '', $id = '')
	{
		switch ($menu) {
			case 'tambahin':
				if ( $this->model('m_gunakan')->gnlab_tambah($_POST, $this->datasesi('user')) > 0 ) {
					Flasher::setFlash('Data penggunaan', 'telah dicatat', '', 'success');
					header('location:' . BASIS_URL . '/gunakan/lab');
					exit;
				} else {
					Flasher::setFlash('Data penggunaan', 'tidak dicatat', '', 'danger');
					header('location:' . BASIS_URL . '/gunakan/lab');
					exit;
				}
				break;
			
			case 'cekmhs':
				echo json_encode($this->model('m_warga')->mhs_detail($_POST['gnlab_mhs']));
				break;

			case 'cekdsnmtk':
				echo json_encode($this->model('m_akademik')->mtk_detail($_POST['gnlab_mtk']));
				break;

			case 'bylab':
				echo json_encode($this->model('m_gunakan')->gnlab_byLab($_POST['gnlab_lab']));
				break;

			case 'bymhs':
				echo json_encode($this->model('m_gunakan')->gnlab_byMhs($_POST['gnlab_mhs']));
				break;

			case 'detail':
				$data = array(
					'judul'	=> 'Penggunaan',
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
					'judul'	=> 'Penggunaan',
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
}