<?php 

/**
 * 
 */
class m_inventaris extends Kontroler
{
	private $lab = 'daftar_lab';
	private $aap = 'daftar_aap';
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

		function aap_idbaru()
		{
			$kueri = "SELECT max(aap_id) as kode_besar FROM $this->aap";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$data = $this->db->hasil_tunggal();
			$urut = (int) substr($data['kode_besar'], 3);
			$kode = "AAP";
			$urut = $urut + 1;

			$hasil = $kode . sprintf("%05s", $urut);
			$this->db->tutup();
			return $hasil;
		}

		function aap_tambah($data, $nomor)
		{
			$kueri = "INSERT INTO $this->aap VALUES (:aap_id, :aap_nama, :aap_anggaran, :aap_letak, :aap_merek, :aap_tipe, :aap_spesifikasi, :aap_tanggal, :aap_noinv)";
			$this->db->kueri($kueri);
			$this->db->ikat('aap_id', $nomor);
			$this->db->ikat('aap_nama', $data['aap_nama']);
			$this->db->ikat('aap_anggaran', $data['aap_anggaran']);
			$this->db->ikat('aap_letak', $data['aap_letak']);
			$this->db->ikat('aap_merek', $data['aap_merek']);
			$this->db->ikat('aap_tipe', $data['aap_tipe']);
			$this->db->ikat('aap_spesifikasi', $data['aap_spesifikasi']);
			$this->db->ikat('aap_tanggal', $data['aap_tanggal']);
			$this->db->ikat('aap_noinv', $data['aap_noinv']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function aap_list()
		{
			$kueri = "SELECT * FROM $this->aap JOIN $this->lab ON `$this->aap`.`aap_letak` = `$this->lab`.`lab_id`";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function aap_detail($data)
		{
			$kueri = "SELECT * FROM $this->aap JOIN $this->lab ON `$this->aap`.`aap_letak` = `$this->lab`.`lab_id` WHERE aap_id = :aap_id";
			$this->db->kueri($kueri);
			$this->db->ikat('aap_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function aap_edit($data)
		{
			$kueri = "UPDATE $this->aap SET aap_nama = :aap_nama, aap_anggaran = :aap_anggaran, aap_letak = :aap_letak, aap_merek = :aap_merek, aap_tipe = :aap_tipe, aap_spesifikasi = :aap_spesifikasi, aap_tanggal = :aap_tanggal, aap_noinv = :aap_noinv WHERE aap_id = :aap_id";
			$this->db->kueri($kueri);
			$this->db->ikat('aap_id', $data['aap_id']);
			$this->db->ikat('aap_nama', $data['aap_nama']);
			$this->db->ikat('aap_anggaran', $data['aap_anggaran']);
			$this->db->ikat('aap_letak', $data['aap_letak']);
			$this->db->ikat('aap_merek', $data['aap_merek']);
			$this->db->ikat('aap_tipe', $data['aap_tipe']);
			$this->db->ikat('aap_spesifikasi', $data['aap_spesifikasi']);
			$this->db->ikat('aap_tanggal', $data['aap_tanggal']);
			$this->db->ikat('aap_noinv', $data['aap_noinv']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function aap_hapus($data)
		{
			$kueri = "DELETE FROM $this->aap WHERE aap_id = :aap_id";
			$this->db->kueri($kueri);
			$this->db->ikat('aap_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}
}