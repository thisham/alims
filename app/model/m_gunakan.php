<?php 

/**
 * 
 */
class m_gunakan extends Kontroler
{
	private $gnlab = 'guna_lab';
	private $gnadl = 'guna_adl';
	private $dtadl = 'daftar_adl';
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

	// Other

		// Read Data

			function autc_dtmhs($data)
			{
				$kueri = "SELECT nim, nama FROM $this->dtmhs WHERE nim LIKE :data OR nama LIKE :data";
				$this->db->kueri($kueri);
				$this->db->ikat('data', "%$data%");
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				while ($baris = $this->db->hasil_jamak()) {
					$data[] = $baris['nim'];
				}
				$this->db->tutup();
				return $data;
			}

	// Laboratorium

		// Create Data

			function gnlab_idbaru()
			{
				$kode = "GLB" . date('y') . sprintf("%03s", date('z'));
				$kueri = "SELECT max(gnlab_id) as kode_besar FROM $this->gnlab WHERE gnlab_id LIKE :kode";
				$this->db->kueri($kueri);
				$this->db->ikat('kode', "%$kode%");
				$this->db->eksekusi();
				$data = $this->db->hasil_tunggal();
				$urut = (int) substr($data['kode_besar'], 8);
				$urut = $urut + 1;

				$hasil = $kode . sprintf("%03s", $urut);
				$this->db->tutup();
				return $hasil;
			}
			
			function gnlab_tambah($data, $sesi)
			{
				$data['gnlab_mhs'] = explode(' - ', $data['gnlab_mhs']);
				$kueri = "INSERT INTO $this->gnlab VALUES (:gnlab_id, :gnlab_lab, :gnlab_mhs, :gnlab_dsn, :gnlab_mtk, :gnlab_awal, :gnlab_akhir, :gnlab_sign, :gnlab_lbrn)";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_lab', $data['gnlab_lab']);
				$this->db->ikat('gnlab_mhs', $data['gnlab_mhs'][0]);
				$this->db->ikat('gnlab_dsn', $data['gnlab_dsn']);
				$this->db->ikat('gnlab_mtk', $data['gnlab_mtk']);
				$this->db->ikat('gnlab_awal', date('Y-m-d H:i:s'));
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
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->siswa`.`nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->mtkul`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `user`.`user_id` WHERE `$this->gnlab`.`gnlab_mhs` = :gnlab_mhs";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_mhs', $data);
				$this->db->eksekusi();
				$hasil = array(
					'jamak'	=> $this->db->hasil_jamak(),
					'baris'	=> $this->db->hit_baris()
				);
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_byLab($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `user`.`user_id` WHERE gnlab_lab = :gnlab_lab";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_lab', $data);
				$this->db->eksekusi();
				$hasil = array(
					'jamak'	=> $this->db->hasil_jamak(),
					'baris'	=> $this->db->hit_baris()
				);
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

			function gnlab_mulaiPraktikum($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_awal = :gnlab_awal WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data);
				$this->db->ikat('gnlab_awal', date('Y-m-d H:i:s'));
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_selesaiPraktikum($data)
			{
				$kueri = "UPDATE $this->gnlab SET gnlab_akhir = :gnlab_akhir WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data);
				$this->db->ikat('gnlab_akhir', date('Y-m-d H:i:s'));
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

			function gnadl_idbaru()
			{
				$kode = "GDL" . date('y') . sprintf("%03s", date('z'));
				$kueri = "SELECT max(gnadl_id) as kode_besar FROM $this->gnadl WHERE gnadl_id LIKE :kode";
				$this->db->kueri($kueri);
				$this->db->ikat('kode', "%$kode%");
				$this->db->eksekusi();
				$data = $this->db->hasil_tunggal();
				$urut = (int) substr($data['kode_besar'], 8);
				$urut = $urut + 1;

				$hasil = $kode . sprintf("%03s", $urut);
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_tambah($data, $user)
			{
				$kueri = "INSERT INTO $this->gnadl VALUES (:gnadl_id, :gnadl_adl, :gnadl_mhs, :gnadl_dsn, :gnadl_mtk, :gnadl_awal, :gnadl_akhir, :gnadl_sign, :gnadl_lbrn)";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $data['gnadl_id']);
				$this->db->ikat('gnadl_adl', $data['gnadl_adl']);
				$this->db->ikat('gnadl_mhs', $data['gnadl_mhs']);
				$this->db->ikat('gnadl_dsn', $data['gnadl_dsn']);
				$this->db->ikat('gnadl_mtk', $data['gnadl_mtk']);
				$this->db->ikat('gnadl_awal', date('Y-m-d H:i:s'));
				$this->db->ikat('gnadl_akhir', 0);
				$this->db->ikat('gnadl_sign', date('Y-m-d H:i:s'));
				$this->db->ikat('gnadl_lbrn', $user);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Read Data

			function gnadl_list()
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id`";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_detail($id)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id` WHERE gnadl_id = :gnadl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $id);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_byADL($data)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id` WHERE adl_id = :adl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('adl_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_byLab($data)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id` WHERE adl_letak = :adl_letak";
				$this->db->kueri($kueri);
				$this->db->ikat('adl_letak', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

		// Update Data

			function gnadl_mulai($data)
			{
				$kueri = "UPDATE $this->gnadl SET gnadl_awal = :gnadl_awal WHERE gnadl_id = :gnadl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $data);
				$this->db->ikat('gnadl_awal', date('Y-m-d H:i:s'));
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_selesai($data)
			{
				$kueri = "UPDATE $this->gnadl SET gnadl_akhir = :gnadl_akhir WHERE gnadl_id = :gnadl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $data);
				$this->db->ikat('gnadl_akhir', date('Y-m-d H:i:s'));
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Delete Data
}