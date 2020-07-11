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

	function detail($data)
	{
		$data = array(
			'judul'	=> 'Akun Saya',
			'usr'	=> $this->model('m_dasbor')->data_usr($data)
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar_dash', $data);
		$this->tampilkan('akun/index', $data);
		$this->tampilkan('templat/footer', $data);
	}

	function update($menu = '', $id = '')
	{
		switch ($menu) {
			case 'datadiri':
				if ($this->model('m_user')->u_datadiri($_POST, $this->datasesi('user')) > 0) {
					Flasher::setFlash('Data diri dalam akun', 'berhasil diperbarui', '', 'success');
					header('location:' . BASIS_URL . '/akun');
					exit;
				} else {
					Flasher::setFlash('Data diri dalam akun', 'gagal diperbarui', '', 'danger');
					header('location:' . BASIS_URL . '/akun');
					exit;
				}
				break;
			
			case 'dataakun':
				if ($this->model('m_user')->u_dataakun($_POST, $this->datasesi('user')) > 0) {
					Flasher::setFlash('Data akun', 'berhasil diperbarui', '', 'success');
					header('location:' . BASIS_URL . '/akun');
					exit;
				} else {
					Flasher::setFlash('Data akun', 'gagal diperbarui', '', 'danger');
					header('location:' . BASIS_URL . '/akun');
					exit;
				}
				break;

			case 'm_dataakun':
				var_dump($_POST);
				break;

			default:
				# code...
				break;
		}
	}
}