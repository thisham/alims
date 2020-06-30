<?php 

/**
 * 
 */
class m_ajax extends Kontroler
{
	private $dtmhs = 'daftar_mhs';
	private $dtmtk = 'daftar_mtk';
	private $dtdsn = 'daftar_dsn';
	private $db;

	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Auto-Complete
	
		function cari_mhs($data)
		{
			$kueri = "SELECT * FROM $this->dtmhs WHERE mhs_nim LIKE :kueri OR mhs_nama LIKE :kueri";
			$this->db->kueri($kueri);
			$this->db->ikat('kueri', '%' . $data . '%');
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function cari_mtk($data)
		{
			$kueri = "SELECT * FROM $this->dtmtk JOIN $this->dtdsn ON `$this->dtmtk`.`mtk_dosen` = `$this->dtdsn`.`dsn_id` WHERE mtk_buka != 0 AND mtk_tutup = 0 AND mtk_akronim LIKE :kueri OR mtk_id LIKE :kueri OR mtk_nama LIKE :kueri OR dsn_nama LIKE :kueri OR mtk_periode LIKE :kueri";
			$this->db->kueri($kueri);
			// $this->db->ikat('nol', 0);
			$this->db->ikat('kueri', '%' . $data . '%');
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}
}