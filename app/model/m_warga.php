<?php 

/**
 * 
 */
class m_warga extends Kontroler
{
	private $siswa = 'daftar_mhs';
	private $prodi = 'daftar_prodi';
	private $dosen = 'daftar_dsn';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Mahasiswa

		function mhs_tambah($data)
		{
			$kueri = "INSERT INTO $this->siswa VALUES (:mhs_nim, :mhs_nama, :mhs_prodi, :mhs_angkatan, :mhs_kelas)";
			$this->db->kueri($kueri);
			$this->db->ikat('mhs_nim', $data['mhs_nim']);
			$this->db->ikat('mhs_nama', $data['mhs_nama']);
			$this->db->ikat('mhs_prodi', $data['mhs_prodi']);
			$this->db->ikat('mhs_angkatan', $data['mhs_angkatan']);
			$this->db->ikat('mhs_kelas', $data['mhs_kelas']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mhs_edit($data)
		{
			$kueri = "UPDATE $this->siswa SET mhs_nama = :mhs_nama, mhs_prodi = :mhs_prodi, mhs_angkatan = :mhs_angkatan, mhs_kelas = :mhs_kelas WHERE mhs_nim = :mhs_nim";
			$this->db->kueri($kueri);
			$this->db->ikat('mhs_nim', $data['mhs_nim']);
			$this->db->ikat('mhs_nama', $data['mhs_nama']);
			$this->db->ikat('mhs_prodi', $data['mhs_prodi']);
			$this->db->ikat('mhs_angkatan', $data['mhs_angkatan']);
			$this->db->ikat('mhs_kelas', $data['mhs_kelas']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function mhs_list()
		{
			$kueri = "SELECT * FROM $this->siswa JOIN $this->prodi ON `$this->siswa`.`mhs_prodi` = `$this->prodi`.`kode`";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function mhs_detail($data)
		{
			$kueri = "SELECT * FROM $this->siswa JOIN $this->prodi ON `$this->siswa`.`mhs_prodi` = `$this->prodi`.`kode` WHERE mhs_nim = :mhs_nim";
			$this->db->kueri($kueri);
			$this->db->ikat('mhs_nim', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function mhs_cari($data)
		{
			$kueri = "SELECT * FROM $this->siswa WHERE nama LIKE :kueri OR mhs_nim LIKE :kueri";
			$this->db->kueri($kueri);
			$this->db->ikat('kueri', '%' . $data . '%');
			$this->db->eksekusi();
			$hasil = array(
				'hasil'	=> $this->db->hasil_jamak(),
				'baris'	=> $this->db->hit_baris(),
				'kueri' => $data
			);
			$this->db->tutup();
			return $hasil;
		}

		function mhs_hapus($data)
		{
			$kueri = "DELETE FROM $this->siswa WHERE mhs_nim = :mhs_nim";
			$this->db->kueri($kueri);
			$this->db->ikat('mhs_nim', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

	// Dosen

		function dsn_idbaru()
		{
			$kueri = "SELECT max(dsn_id) as kode_besar FROM $this->dosen";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$data = $this->db->hasil_tunggal();
			$urut = (int) substr($data['kode_besar'], 3);
			$kode = "DSN";
			$urut = $urut + 1;

			$hasil = $kode . sprintf("%05s", $urut);
			$this->db->tutup();
			return $hasil;
		}

		function dsn_tambah($data)
		{
			$kueri = "INSERT INTO $this->dosen VALUES (:dsn_id, :dsn_nipd, :dsn_nama, :dsn_gelar)";
			$this->db->kueri($kueri);
			$this->db->ikat('dsn_id', $data['dsn_id']);
			$this->db->ikat('dsn_nipd', $data['dsn_nipd']);
			$this->db->ikat('dsn_nama', $data['dsn_nama']);
			$this->db->ikat('dsn_gelar', $data['dsn_gelar']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function dsn_edit($data)
		{
			$kueri = "UPDATE $this->dosen SET dsn_nipd = :dsn_nipd, dsn_nama = :dsn_nama, dsn_gelar = :dsn_gelar WHERE dsn_id = :dsn_id";
			$this->db->kueri($kueri);
			$this->db->ikat('dsn_id', $data['dsn_id']);
			$this->db->ikat('dsn_nipd', $data['dsn_nipd']);
			$this->db->ikat('dsn_nama', $data['dsn_nama']);
			$this->db->ikat('dsn_gelar', $data['dsn_gelar']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function dsn_list()
		{
			$kueri = "SELECT * FROM $this->dosen";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

		function dsn_detail($data)
		{
			$kueri = "SELECT * FROM $this->dosen WHERE dsn_id = :dsn_id";
			$this->db->kueri($kueri);
			$this->db->ikat('dsn_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function dsn_cari($data)
		{
			$kueri = "SELECT * FROM $this->dosen WHERE dsn_nama LIKE :kueri OR dsn_id LIKE :kueri";
			$this->db->kueri($kueri);
			$this->db->ikat('kueri', '%' . $data['cari'] . '%');
			$this->db->eksekusi();
			$hasil = array(
				'hasil'	=> $this->db->hasil_jamak(),
				'baris'	=> $this->db->hit_baris(),
				'kueri' => $data['cari']
			);
			$this->db->tutup();
			return $hasil;
		}

		function dsn_hapus($data)
		{
			$kueri = "DELETE FROM $this->dosen WHERE dsn_id = :dsn_id";
			$this->db->kueri($kueri);
			$this->db->ikat('dsn_id', $data);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

}