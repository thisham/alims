<?php 

/**
 * 
 */
class m_akademik extends Kontroler
{
	private $prodi = 'daftar_prodi';
	private $mtkul = 'daftar_mtk';
	private $dosen = 'daftar_dsn';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Program Studi

		function prodi_tambah($data)
		{
			$kueri = "INSERT INTO $this->prodi VALUES (:kode, :prodi)";
			$this->db->kueri($kueri);
			$this->db->ikat('kode', $data['kode']);
			$this->db->ikat('prodi', $data['prodi']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function prodi_edit($data)
		{
			$kueri = "UPDATE $this->prodi SET prodi = :prodi WHERE kode = :kode";
			$this->db->kueri($kueri);
			$this->db->ikat('kode', $data['kode']);
			$this->db->ikat('prodi', $data['prodi']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function prodi_list()
		{
			$kueri = "SELECT * FROM $this->prodi";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function prodi_detail($data)
		{
			$kueri = "SELECT * FROM $this->prodi WHERE kode = :kode";
			$this->db->kueri($kueri);
			$this->db->ikat('kode', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function prodi_hapus($data)
		{
			$kueri = "DELETE FROM $this->prodi WHERE kode = :kode";
			$this->db->kueri($kueri);
			$this->db->ikat('kode', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

	// Mata Kuliah

		function mtk_idbaru()
		{
			$kueri = "SELECT max(mtk_id) as kode_besar FROM $this->mtkul";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$data = $this->db->hasil_tunggal();
			$urut = (int) substr($data['kode_besar'], 6);
			$kode = "MTK";
			switch (date('m')) {
				case 3: case 4: case 5: case 6: case 7: case 8:
					$semester = 2;
					break;

				case 9: case 10: case 11: case 12: case 1: case 2:
					$semester = 1;
					break;
				
				default:
					$semester = 0;
					break;
			}
			$year = date('y') . $semester;
			$urut = $urut + 1;

			$hasil = $kode . $year . sprintf("%03s", $urut);
			$this->db->tutup();
			return $hasil;
		}

		function mtk_periodebaru()
		{
			switch (date('m')) {
				case 3: case 4: case 5: case 6: case 7: case 8:
					$semester = 'Genap';
					break;

				case 9: case 10: case 11: case 12: case 1: case 2:
					$semester = 'Ganjil';
					break;
				
				default:
					$semester = 0;
					break;
			}
			$tahun = date('Y') . '-' . $semester;
			return $tahun;
		}
		
		function mtk_tambah($data)
		{
			$kueri = "INSERT INTO $this->mtkul VALUES (:mtk_id, :mtk_kode, :mtk_nama, :mtk_akronim, :mtk_periode, :mtk_dosen, :mtk_buka, :mtk_tutup)";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data['mtk_id']);
			$this->db->ikat('mtk_kode', $data['mtk_kode']);
			$this->db->ikat('mtk_akronim', $data['mtk_akronim']);
			$this->db->ikat('mtk_nama', $data['mtk_nama']);
			$this->db->ikat('mtk_periode', $data['mtk_periode']);
			$this->db->ikat('mtk_dosen', $data['mtk_dosen']);
			$this->db->ikat('mtk_buka', 0);
			$this->db->ikat('mtk_tutup', 0);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_edit($data)
		{
			$kueri = "UPDATE $this->mtkul SET mtk_kode = :mtk_kode, mtk_nama = :mtk_nama, mtk_periode = :mtk_periode, mtk_dosen = :mtk_dosen, mtk_buka = :mtk_buka, mtk_tutup = :mtk_tutup WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data['mtk_id']);
			$this->db->ikat('mtk_kode', $data['mtk_kode']);
			$this->db->ikat('mtk_nama', $data['mtk_nama']);
			$this->db->ikat('mtk_periode', $data['mtk_periode']);
			$this->db->ikat('mtk_dosen', $data['mtk_dosen']);
			$this->db->ikat('mtk_buka', $data['mtk_buka']);
			$this->db->ikat('mtk_tutup', $data['mtk_tutup']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_buka($data)
		{
			$kueri = "UPDATE $this->mtkul SET mtk_buka = :mtk_buka WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data);
			$this->db->ikat('mtk_buka', date('Y-m-d H:i:s'));
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_bukaulang($data)
		{
			$kueri = "UPDATE $this->mtkul SET mtk_tutup = :mtk_tutup WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data);
			$this->db->ikat('mtk_tutup', 0);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_tutup($data)
		{
			$kueri = "UPDATE $this->mtkul SET mtk_tutup = :mtk_tutup WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data);
			$this->db->ikat('mtk_tutup', date('Y-m-d H:i:s'));
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_list($data = '', $order = '')
		{
			switch ($data) {
				case 'aktif':
					switch ($order) {
						case 'list':
							$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_buka != 0 AND mtk_tutup = 0 ORDER BY mtk_akronim";
							break;
						
						default:
							$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_buka != 0 AND mtk_tutup = 0";
							break;
					}
					break;

				case 'pasca':
					$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_buka != 0 AND mtk_tutup != 0";
					break;

				case 'pra':
					$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_buka = 0 AND mtk_tutup = 0";
					break;
				
				case 'invalid':
					$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_buka = 0 AND mtk_tutup != 0";
					break;

				default:
					$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id`";
					break;
			}
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_detail($data)
		{
			$kueri = "SELECT * FROM $this->mtkul JOIN $this->dosen ON `$this->mtkul`.`mtk_dosen` = `$this->dosen`.`dsn_id` WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function mtk_hapus($data)
		{
			$kueri = "DELETE FROM $this->mtkul WHERE mtk_id = :mtk_id";
			$this->db->kueri($kueri);
			$this->db->ikat('mtk_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}
}