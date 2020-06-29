<?php 

/**
 * 
 */
class m_inventaris extends Kontroler
{
	private $lab = 'daftar_lab';
	private $adl = 'daftar_adl';
	private $app = 'daftar_app';
	private $laboran = 'user';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Laboratorium

		function lab_idbaru()
		{
			$kueri = "SELECT max(lab_id) as kode_besar FROM $this->lab";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$data = $this->db->hasil_tunggal();
			$urut = (int) substr($data['kode_besar'], 3);
			$kode = "LAB";
			$urut = $urut + 1;

			$hasil = $kode . sprintf("%03s", $urut);
			$this->db->tutup();
			return $hasil;
		}
	
		function lab_tambah($data)
		{
			$kueri = "INSERT INTO $this->lab VALUES (:lab_id, :lab_nama, :lab_lokasi, :lab_laboran)";
			$this->db->kueri($kueri);
			$this->db->ikat('lab_id', $data['lab_id']);
			$this->db->ikat('lab_nama', $data['lab_nama']);
			$this->db->ikat('lab_lokasi', $data['lab_lokasi']);
			$this->db->ikat('lab_laboran', $data['lab_laboran']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function lab_list()
		{
			$kueri = "SELECT * FROM $this->lab JOIN $this->laboran ON `$this->lab`.`lab_laboran` = `$this->laboran`.`user_id`";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function lab_detail($data)
		{
			$kueri = "SELECT * FROM $this->lab JOIN $this->laboran ON `$this->lab`.`lab_laboran` = `$this->laboran`.`user_id` WHERE lab_id = :lab_id";
			$this->db->kueri($kueri);
			$this->db->ikat('lab_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function lab_edit($data)
		{
			$kueri = "UPDATE $this->lab SET lab_nama = :lab_nama, lab_lokasi = :lab_lokasi, lab_laboran = :lab_laboran WHERE lab_id = :lab_id";
			$this->db->kueri($kueri);
			$this->db->ikat('lab_id', $data['lab_id']);
			$this->db->ikat('lab_nama', $data['lab_nama']);
			$this->db->ikat('lab_lokasi', $data['lab_lokasi']);
			$this->db->ikat('lab_laboran', $data['lab_laboran']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function lab_hapus($data)
		{
			$kueri = "DELETE FROM $this->lab WHERE lab_id = :lab_id";
			$this->db->kueri($kueri);
			$this->db->ikat('lab_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

	// Alat Paten

		function adl_idbaru()
		{
			$kueri = "SELECT max(adl_id) as kode_besar FROM $this->adl";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$data = $this->db->hasil_tunggal();
			$urut = (int) substr($data['kode_besar'], 3);
			$kode = "ADL";
			$urut = $urut + 1;

			$hasil = $kode . sprintf("%05s", $urut);
			$this->db->tutup();
			return $hasil;
		}

		function adl_tambah($data, $nomor)
		{
			if ($data['adl_tanggal'] == '') {
				$data['adl_tanggal'] = '0000-00-00';
			}
			
			$kueri = "INSERT INTO $this->adl VALUES (:adl_id, :adl_nama, :adl_anggaran, :adl_letak, :adl_merek, :adl_tipe, :adl_spesifikasi, :adl_tanggal, :adl_noinv)";
			$this->db->kueri($kueri);
			$this->db->ikat('adl_id', $nomor);
			$this->db->ikat('adl_nama', $data['adl_nama']);
			$this->db->ikat('adl_anggaran', $data['adl_anggaran']);
			$this->db->ikat('adl_letak', $data['adl_letak']);
			$this->db->ikat('adl_merek', $data['adl_merek']);
			$this->db->ikat('adl_tipe', $data['adl_tipe']);
			$this->db->ikat('adl_spesifikasi', $data['adl_spesifikasi']);
			$this->db->ikat('adl_tanggal', $data['adl_tanggal']);
			$this->db->ikat('adl_noinv', $data['adl_noinv']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function adl_list()
		{
			$kueri = "SELECT * FROM $this->adl JOIN $this->lab ON `$this->adl`.`adl_letak` = `$this->lab`.`lab_id`";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function adl_detail($data)
		{
			$kueri = "SELECT * FROM $this->adl JOIN $this->lab ON `$this->adl`.`adl_letak` = `$this->lab`.`lab_id` WHERE adl_id = :adl_id";
			$this->db->kueri($kueri);
			$this->db->ikat('adl_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function adl_byLab($data)
		{
			$kueri = "SELECT * FROM $this->adl JOIN $this->lab ON `$this->adl`.`adl_letak` = `$this->lab`.`lab_id` WHERE adl_letak = :adl_letak";
			$this->db->kueri($kueri);
			$this->db->ikat('adl_letak', $data);
			$this->db->eksekusi();
			$hasil = array(
				'angka'	=> $this->db->hit_baris(),
				'jamak'	=> $this->db->hasil_jamak()
			);
			$this->db->tutup();
			return $hasil;
		}

		function adl_edit($data)
		{
			$kueri = "UPDATE $this->adl SET adl_nama = :adl_nama, adl_anggaran = :adl_anggaran, adl_letak = :adl_letak, adl_merek = :adl_merek, adl_tipe = :adl_tipe, adl_spesifikasi = :adl_spesifikasi, adl_tanggal = :adl_tanggal, adl_noinv = :adl_noinv WHERE adl_id = :adl_id";
			$this->db->kueri($kueri);
			$this->db->ikat('adl_id', $data['adl_id']);
			$this->db->ikat('adl_nama', $data['adl_nama']);
			$this->db->ikat('adl_anggaran', $data['adl_anggaran']);
			$this->db->ikat('adl_letak', $data['adl_letak']);
			$this->db->ikat('adl_merek', $data['adl_merek']);
			$this->db->ikat('adl_tipe', $data['adl_tipe']);
			$this->db->ikat('adl_spesifikasi', $data['adl_spesifikasi']);
			$this->db->ikat('adl_tanggal', $data['adl_tanggal']);
			$this->db->ikat('adl_noinv', $data['adl_noinv']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function adl_hapus($data)
		{
			$kueri = "DELETE FROM $this->adl WHERE adl_id = :adl_id";
			$this->db->kueri($kueri);
			$this->db->ikat('adl_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

	// Alat Pinjam-Pakai

		// Create Data

			function app_idbaru($label)
			{
				$kode = "APP" . $label . '-';
				$kueri = "SELECT max(app_id) as kode_besar FROM $this->app WHERE app_id LIKE :kode";
				$this->db->kueri($kueri);
				$this->db->ikat('kode', "%$kode%");
				$this->db->eksekusi();
				$data = $this->db->hasil_tunggal();
				$urut = (int) substr($data['kode_besar'], 10);
				
				$urut = $urut + 1;

				$hasil = $kode . sprintf("%03s", $urut);
				$this->db->tutup();
				return $hasil;
			}

			function app_tambah($data, $noid)
			{
				$data['app_volume'] = sprintf("%03s", $data['app_volume']);
				$kueri = "INSERT INTO $this->app VALUES (:app_id, :app_nama, :app_label, :app_kondisi)";
				$this->db->kueri($kueri);
				$this->db->ikat('app_id', $noid);
				$this->db->ikat('app_nama', $data['app_nama']);
				$this->db->ikat('app_label', $data['app_label'] . $data['app_volume']);
				$this->db->ikat('app_kondisi', 'Baik');
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Read Data

			function app_list()
			{
				$kueri = "SELECT * FROM $this->app";
				$this->db->kueri($kueri);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_jamak();
				$this->db->tutup();
				return $hasil;
			}

			function app_detail($data)
			{
				$kueri = "SELECT * FROM $this->app WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('app_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hasil_tunggal();
				$this->db->tutup();
				return $hasil;
			}

		// Update Data 

			function app_edit($data, $id)
			{
				$kueri = "UPDATE $this->app SET app_nama = :app_nama, app_kondisi = :app_kondisi WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('app_id', $id);
				$this->db->ikat('app_nama', $data['app_nama']);
				$this->db->ikat('app_kondisi', $data['app_kondisi']);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}

		// Delete Data

			function app_hapus($data)
			{
				$kueri = "DELETE FROM $this->app WHERE app_id = :app_id";
				$this->db->kueri($kueri);
				$this->db->ikat('app_id', $data);
				$this->db->eksekusi();
				$hasil = $this->db->hit_baris();
				$this->db->tutup();
				return $hasil;
			}
}