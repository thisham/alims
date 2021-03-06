<?php 

/**
 * 
 */
class m_gunakan extends Kontroler
{
	private $gnlab = 'guna_lab';
	private $gnadl = 'guna_adl';
	private $gnapp = 'guna_app';
	private $dtadl = 'daftar_adl';
	private $dtlab = 'daftar_lab';
	private $dtapp = 'daftar_app';
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
				$kueri = "SELECT mhs_nim, nama FROM $this->dtmhs WHERE mhs_nim LIKE :data OR nama LIKE :data";
				$this->db->kueri($kueri);
				$this->db->ikat('data', "%$data%");
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				while ($baris = $this->db->hasil_jamak()) {
					$data[] = $baris['mhs_nim'];
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
				$data['gnlab_mtk'] = explode(' - ', $data['gnlab_mtk']);
				$kueri = "INSERT INTO $this->gnlab VALUES (:gnlab_id, :gnlab_lab, :gnlab_mhs, :gnlab_dsn, :gnlab_mtk, :gnlab_awal, :gnlab_akhir, :gnlab_sign, :gnlab_lbrn)";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data['gnlab_id']);
				$this->db->ikat('gnlab_lab', $data['gnlab_lab']);
				$this->db->ikat('gnlab_mhs', $data['gnlab_mhs'][0]);
				$this->db->ikat('gnlab_dsn', $data['gnlab_dsn']);
				$this->db->ikat('gnlab_mtk', $data['gnlab_mtk'][0]);
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

			function gnlab_listall($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id` WHERE gnlab_sign LIKE :tgl ORDER BY gnlab_sign DESC";
				$this->db->kueri($kueri);
				$this->db->ikat('tgl', "%" . $data . "%");
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_list($data)
			{
				if ($data['gnlab_lab_opt'] == 'ALL') {
					$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id` WHERE gnlab_sign LIKE :tgl ORDER BY gnlab_sign DESC";
					$this->db->kueri($kueri);
					$this->db->ikat('tgl', "%" . $data['gnlab_tanggal'] . "%");
					$this->db->eksekusi();
					$hasil = $this->db->hasil_jamak();
					$this->db->tutup();
					return $hasil;
				} else {
					$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id` WHERE gnlab_sign LIKE :tgl AND gnlab_lab = :lab ORDER BY gnlab_sign DESC";
					$this->db->kueri($kueri);
					$this->db->ikat('tgl', "%" . $data['gnlab_tanggal'] . "%");
					$this->db->ikat('lab', $data['gnlab_lab_opt']);
					$this->db->eksekusi();
					$hasil = $this->db->hasil_jamak();
					$this->db->tutup();
					return $hasil;
				}
			}

			function gnlab_detail($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `$this->dtlbr`.`user_id` WHERE gnlab_id = :gnlab_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnlab_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

			function gnlab_byMhs($data)
			{
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `user`.`user_id` WHERE `$this->gnlab`.`gnlab_mhs` = :gnlab_mhs ORDER BY gnlab_sign DESC";
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
				$kueri = "SELECT * FROM $this->gnlab JOIN $this->dtlab ON `$this->gnlab`.`gnlab_lab` = `$this->dtlab`.`lab_id` JOIN $this->dtmhs ON `$this->gnlab`.`gnlab_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnlab`.`gnlab_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnlab`.`gnlab_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnlab`.`gnlab_lbrn` = `user`.`user_id` WHERE gnlab_lab = :gnlab_lab ORDER BY gnlab_sign DESC";
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

			function gnlab_listToGraph($date, $month, $year)
			{
				$kueri = "SELECT COUNT(gnlab_id) AS jumlah FROM $this->gnlab WHERE month(gnlab_sign) = :month AND day(gnlab_sign) = :tanggal AND year(gnlab_sign) = :year";
				$this->db->kueri($kueri);
				$this->db->ikat('tanggal', $date);
				$this->db->ikat('month', $month);
				$this->db->ikat('year', $year);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
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
				$data['gnadl_mhs'] = explode(' - ', $data['gnadl_mhs']);
				$data['gnadl_mtk'] = explode(' - ', $data['gnadl_mtk']);
				// var_dump($data);
				$kueri = "INSERT INTO $this->gnadl VALUES (:gnadl_id, :gnadl_adl, :gnadl_mhs, :gnadl_dsn, :gnadl_mtk, :gnadl_awal, :gnadl_akhir, :gnadl_sign, :gnadl_lbrn)";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $data['gnadl_id']);
				$this->db->ikat('gnadl_adl', $data['gnadl_adl']);
				$this->db->ikat('gnadl_mhs', $data['gnadl_mhs'][0]);
				$this->db->ikat('gnadl_dsn', $data['gnadl_dsn']);
				$this->db->ikat('gnadl_mtk', $data['gnadl_mtk'][0]);
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

			function gnadl_list($data)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON gnadl_mhs = mhs_nim WHERE gnadl_sign LIKE :gnadl_sign ORDER BY gnadl_sign DESC";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_sign', "$data%");
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_listToGraph($date, $month, $year)
			{
				$kueri = "SELECT COUNT(gnadl_id) AS jumlah FROM $this->gnadl WHERE month(gnadl_sign) = :month AND day(gnadl_sign) = :tanggal AND year(gnadl_sign) = :year";
				$this->db->kueri($kueri);
				$this->db->ikat('tanggal', $date);
				$this->db->ikat('month', $month);
				$this->db->ikat('year', $year);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_aktif()
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON gnadl_mhs = mhs_nim WHERE gnadl_awal != 0 AND gnadl_akhir = 0 ORDER BY gnadl_sign DESC";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_detail($id)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `$this->dtlbr`.`user_id` WHERE gnadl_id = :gnadl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnadl_id', $id);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_byADL($data)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id` WHERE adl_id = :adl_id ORDER BY gnadl_sign DESC";
				$this->db->kueri($kueri);
				$this->db->ikat('adl_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_byLab($data)
			{
				$kueri = "SELECT * FROM $this->gnadl JOIN $this->dtadl ON `$this->gnadl`.`gnadl_adl` = `$this->dtadl`.`adl_id` JOIN $this->dtmhs ON `$this->gnadl`.`gnadl_mhs` = `$this->dtmhs`.`mhs_nim` JOIN $this->dtdsn ON `$this->gnadl`.`gnadl_dsn` = `$this->dtdsn`.`dsn_id` JOIN $this->dtmtk ON `$this->gnadl`.`gnadl_mtk` = `$this->dtmtk`.`mtk_id` JOIN $this->dtlbr ON `$this->gnadl`.`gnadl_lbrn` = `user`.`user_id` WHERE adl_letak = :adl_letak ORDER BY gnadl_sign DESC";
				$this->db->kueri($kueri);
				$this->db->ikat('adl_letak', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnadl_cekadl($data)
			{
				$kueri = "SELECT count(adl_id) as hasil FROM $this->dtadl WHERE adl_id = :adl_id";
				$this->db->kueri($kueri);
				$this->db->ikat('adl_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
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


	// Alat Pinjam-Pakai

		// Create Data

			function gnapp_idbaru()
			{
				$kode = "GPP" . date('y') . sprintf("%03s", date('z'));
				$kueri = "SELECT max(gnapp_id) as kode_besar FROM $this->gnapp WHERE gnapp_id LIKE :kode";
				$this->db->kueri($kueri);
				$this->db->ikat('kode', "%$kode%");
				$this->db->eksekusi();
				$data = $this->db->hasil_tunggal();
				$urut = (int) substr($data['kode_besar'], 8);
				$urut = $urut + 1;

				$hasil = $kode . sprintf("%04s", $urut);
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_tambah($data)
			{
				$data['mhs'] = $data['mhs'][0];
				$data['mtk'] = $data['mtk'][0];
				$kueri = "INSERT INTO $this->gnapp VALUES (:gnapp_id, :gnapp_app, :gnapp_mhs, :gnapp_dsn, :gnapp_mtk, :gnapp_awal, :gnapp_akhir, :gnapp_rusak, :gnapp_sign, :gnapp_lbrn); UPDATE $this->dtapp SET app_kondisi = :app_kondisi WHERE app_id = :gnapp_app";
				var_dump($data);
				$this->db->kueri($kueri);
				$this->db->ikat('gnapp_id', $data['IDs']);
				$this->db->ikat('gnapp_app', $data['inv']);
				$this->db->ikat('gnapp_mhs', $data['mhs']);
				$this->db->ikat('gnapp_dsn', $data['dsn']);
				$this->db->ikat('gnapp_mtk', $data['mtk']);
				$this->db->ikat('gnapp_awal', date('Y-m-d H:i:s'));
				$this->db->ikat('gnapp_akhir', 0);
				$this->db->ikat('gnapp_rusak', 0);
				$this->db->ikat('gnapp_sign', date('Y-m-d H:i:s'));
				$this->db->ikat('gnapp_lbrn', $data['usr']);
				$this->db->ikat('app_kondisi', 'Dipakai');
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Read Data

			function gnapp_list($tgl)
			{
				$kueri = "SELECT * FROM $this->gnapp JOIN $this->dtmhs ON gnapp_mhs = mhs_nim JOIN $this->dtapp ON gnapp_app = app_id WHERE gnapp_sign LIKE :tgl ORDER BY gnapp_sign DESC";
				$this->db->kueri($kueri);
				$this->db->ikat('tgl', $tgl . '%');
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_listDipakai()
			{
				$kueri = "SELECT * FROM $this->gnapp JOIN $this->dtmhs ON gnapp_mhs = mhs_nim JOIN $this->dtapp ON gnapp_app = app_id WHERE gnapp_awal != 0 AND gnapp_akhir = 0 AND gnapp_rusak = 0";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_listRusak()
			{
				$kueri = "SELECT * FROM $this->gnapp JOIN $this->dtmhs ON gnapp_mhs = mhs_nim JOIN $this->dtapp ON gnapp_app = app_id WHERE gnapp_awal != 0 AND gnapp_akhir = 0 AND gnapp_rusak != 0";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_listDipakaiMHS($data)
			{
				$kueri = "SELECT * FROM $this->gnapp JOIN $this->dtmhs ON gnapp_mhs = mhs_nim JOIN $this->dtapp ON gnapp_app = app_id WHERE gnapp_awal != 0 AND gnapp_akhir = 0 AND gnapp_rusak = 0 AND gnapp_mhs = :gnapp_mhs";
				$this->db->kueri($kueri);
				$this->db->ikat('gnapp_mhs', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_listRusakMHS($data)
			{
				$data = explode(' - ', $data);
				$kueri = "SELECT * FROM $this->gnapp JOIN $this->dtmhs ON gnapp_mhs = mhs_nim JOIN $this->dtapp ON gnapp_app = app_id WHERE gnapp_awal != 0 AND gnapp_akhir = 0 AND gnapp_rusak = 0 AND gnapp_mhs = :gnapp_mhs";
				$this->db->kueri($kueri);
				$this->db->ikat('gnapp_mhs', $data[0]);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_cekapp($data)
			{
				$kueri = "SELECT count(app_id) as hasil FROM $this->dtapp WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('app_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				$hasil = (int) $hasil;
				return $hasil;
			}

			function gnapp_listToGraph($date, $month, $year)
			{
				$kueri = "SELECT COUNT(gnapp_id) AS jumlah FROM $this->gnapp WHERE month(gnapp_sign) = :month AND day(gnapp_sign) = :tanggal AND year(gnapp_sign) = :year";
				$this->db->kueri($kueri);
				$this->db->ikat('tanggal', $date);
				$this->db->ikat('month', $month);
				$this->db->ikat('year', $year);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

		// Update Data

			function gnapp_kembali($gnapp_id, $app_id)
			{
				// echo "$gnapp_id -> $app_id\n";
				$kueri = "UPDATE $this->gnapp SET gnapp_akhir = :gnapp_akhir WHERE gnapp_id = :gnapp_id; UPDATE $this->dtapp SET app_kondisi = :app_kondisi WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnapp_id', $gnapp_id);
				$this->db->ikat('gnapp_akhir', date('Y-m-d H:i:s'));
				$this->db->ikat('app_id', $app_id);
				$this->db->ikat('app_kondisi', 'Baik');
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

			function gnapp_rusak($gnapp_id, $app_id)
			{
				$kueri = "UPDATE $this->gnapp SET gnapp_rusak = :gnapp_rusak WHERE gnapp_id = :gnapp_id; UPDATE $this->dtapp SET app_kondisi = :app_kondisi WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('gnapp_id', $gnapp_id);
				$this->db->ikat('gnapp_rusak', date('Y-m-d H:i:s'));
				$this->db->ikat('app_id', $app_id);
				$this->db->ikat('app_kondisi', 'Rusak/Hilang');
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Delete Data

}