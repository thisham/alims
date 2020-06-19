<?php 

/**
 * 
 */
class portal extends Kontroler
{
	
	function indeks()
	{
		$data = array(	
			'judul' => 'Portal - ALIMS',
			'pages' => 'Portal',
			'rumus' => $this->pustaka('p_captcha')->tampilkanrumus()
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('portal/masuk', $data);
		$this->tampilkan('templat/footer');
	}

	function daftar()
	{
		$data = array(	
			'judul' => 'Portal - ALIMS',
			'pages' => 'Portal',
			'rumus' => $this->pustaka('p_captcha')->tampilkanrumus()
		);
		$this->tampilkan('templat/header', $data);
		$this->tampilkan('templat/navbar', $data);
		$this->tampilkan('portal/daftar', $data);
		$this->tampilkan('templat/footer');
	}

	function keluar()
	{
		if ( $this->datasesi('user') != NULL ) {
			$this->akhirsesi('user');
			$this->akhirsesi('nama');
			$this->akhirsesi('hak_akses');
			$this->akhirsesi('kode');
		}
		header('location:' . BASIS_URL);
	}

	function daftarkan()
	{
		if ($_POST['captcha'] == $this->datasesi('kode')) {
			if ($this->model('m_portal')->daftarkan($_POST) > 0) {
				Flasher::setFlash('Nama pengguna', 'berhasil didaftarkan', 'Silakan meminta konfirmasi ke admin untuk mengaktifkan akun', 'success');
				header('location:' . BASIS_URL . '/portal/daftar');
				exit;
			} else {
				Flasher::setFlash('Nama pengguna', 'gagal didaftarkan', 'Silakan meminta konfirmasi ke admin untuk mengaktifkan akun', 'danger');
				header('location:' . BASIS_URL . '/portal/daftar');
				exit;
			}
		}
	}

	function masukkan()
	{
		$data = $this->model('m_portal')->masukkan($_POST);
		if ( $_POST['captcha'] == $this->datasesi('kode') ) {
			if ( $data != NULL ) {
				var_dump($data);
				switch ( $data['status'] ) {
					case 'Inaktif':
						Flasher::setFlash('Akun', 'belum dapat digunakan', 'Silakan meminta konfirmasi ke admin untuk mengaktifkan akun', 'warning');
						header('location:' . BASIS_URL . '/portal/masuk');
						exit;
						break;

					case 'Terblokir':
						Flasher::setFlash('Akun', 'terblokir', 'Silakan hubungi admin untuk perbaikan akun', 'warning');
						header('location:' . BASIS_URL . '/portal/masuk');
						exit;
						break;

					case 'Aktif':
						$this->mulaisesi('user', $data['user_id']);
						$this->mulaisesi('nama', $data['nama']);
						$this->mulaisesi('hak_akses', $data['hak_akses']);
						header('location:' . BASIS_URL . '/dasbor');
						break;

					default:
						Flasher::setFlash('Akun', 'eror', 'Silakan hubungi admin untuk perbaikan akun', 'warning');
						header('location:' . BASIS_URL . '/portal/masuk');
						exit;
						break;
				}
			} else {
				Flasher::setFlash('Kombinasi username dan password Anda', 'tidak ditemukan', 'Mohon masukkan kombinasi yang benar atau kontak admin', 'danger');
				header('location:' . BASIS_URL . '/portal/masuk');
				exit;
			}
		} else {
			Flasher::setFlash('Captcha yang Anda masukkan', 'salah', 'Are you a robot?', 'warning');
			header('location:' . BASIS_URL . '/portal/masuk');
			exit;
		}
	}
}