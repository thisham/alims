<?php 

/**
 * 
 */
class m_gunakan extends Kontroler
{
	private $gnlab = 'guna_lab';
	private $dtlab = 'daftar_lab';
	private $dtmhs = 'daftar_mhs';
	private $dtdsn = 'daftar_dsn';
	private $dtmtk = 'daftar_mtk';
	private $dtlbr = 'user';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Laboratorium

		// Create Data

			function gnlab_idbaru()
			{
				$kueri = "SELECT max(gnlab_id) as kode_besar FROM $this->gnlab";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$data = $this->db->hasil_tunggal();
				$urut = (int) substr($data['kode_besar'], 8);
				$kode = "GLB";
				$date = date('y') . sprintf("%03s", date('z'));
				$urut = $urut + 1;

				$hasil = $kode . $date . sprintf("%03s", $urut);
				$this->db->tutup();
				return $hasil;
			}
			
			function gnlab_tambah($data, $sesi)
			{
				$kueri = "INSERT INTO $this->gnlab VALUES (:gnlab_id, :gnlab_lab, :gnlab_mhs, :gnlab_dsn, :gnlab_mtk, :gnlab_plan, :gnlab_awal, :gnlab_akhir, :gnlab_sign, :gnlab_lbrn)";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_lab', $data['gnlab_lab']);
				$this->db->ikat('gnlab_mhs', $data['gnlab_mhs']);
				$this->db->ikat('gnlab_dsn', $data['gnlab_dsn']);
				$this->db->ikat('gnlab_mtk', $data['gnlab_mtk']);
				$this->db->ikat('gnlab_plan', $data['gnlab_tanggal'] . ' ' . $data['gnlab_waktu']);
				$this->db->ikat('gnlab_awal', 0);
				$this->db->ikat('gnlab_akhir', 0);
				$this->db->ikat('gnlab_sign', date('Y-m-d H:i:s'));
				$this->db->ikat('gnlab_lbrn', $sesi);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Read Data

			function gnlab_list()
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id`";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_detail($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id` WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_byMhs($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON gnlab_lab = lab_id JOIN $this->dtmhs ON gnlab_mhs = nim JOIN $this->dtdsn ON gnlab_dsn = dsn_id JOIN $this->dtmtk ON gnlab_mtk = mtk_id JOIN $this->dtlbr ON gnlab_lbrn = user WHERE gnlab_mhs = :gnlab_mhs";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_mhs', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_byLab($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON gnlab_lab = lab_id JOIN $this->dtmhs ON gnlab_mhs = nim JOIN $this->dtdsn ON gnlab_dsn = dsn_id JOIN $this->dtmtk ON gnlab_mtk = mtk_id JOIN $this->dtlbr ON gnlab_lbrn = user WHERE gnlab_lab = :gnlab_lab";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_lab', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

		// Update Data

			function gnlab_edit($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_lab = :gnlab_lab, gnlab_mhs = :gnlab_mhs, gnlab_dsn = :gnlab_dsn, gnlab_mtk = :gnlab_mtk WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_lab', $data['gnlab_lab']);
				$this->db->ikat('gnlab_mhs', $data['gnlab_mhs']);
				$this->db->ikat('gnlab_dsn', $data['gnlab_dsn']);
				$this->db->ikat('gnlab_mtk', $data['gnlab_mtk']);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_mulaiJadwal($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_awal = :gnlab_awal WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_awal', date('c'));
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_batalMulaiJadwal($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_awal = :gnlab_awal WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_awal', 0);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_tutupJadwal($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_akhir = :gnlab_akhir WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_akhir', date('c'));
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_batalTutupJadwal($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_akhir = :gnlab_akhir WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_akhir', 0);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Delete Data

			function gnlab_hapus($data)
			{
				$kueri = "DELETE FROM $this->gnlab WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

	// Alat Paten
		// Create Data
		// Read Data
		// Update Data
		// Delete Data
}