<?php 

/**
 * 
 */
class m_user extends Kontroler
{
	private $dtusr = 'user';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	// Baca Data

		function detail_user($usr)
		{
			$kueri = "SELECT * FROM $this->dtusr WHERE user_id = :usr";
			$this->db->kueri($kueri);
			$this->db->ikat('usr', $usr);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_tunggal();
			$this->db->tutup();
			return $hasil;
		}

		function daftar_user()
		{
			$kueri = "SELECT * FROM $this->dtusr";
			$this->db->kueri($kueri);
			$this->db->eksekusi();
			$hasil = $this->db->hasil_jamak();
			$this->db->tutup();
			return $hasil;
		}

	// Update Data

		function u_datadiri($data, $user)
		{
			$kueri = "UPDATE $this->dtusr SET nama = :nama, gender = :gender, bio = :bio, email = :email, hp = :hp WHERE user_id = :user_id";
			$this->db->kueri($kueri);
			$this->db->ikat('nama', $data['nama']);
			$this->db->ikat('gender', $data['gender']);
			$this->db->ikat('bio', $data['bio']);
			$this->db->ikat('hp', $data['hp']);
			$this->db->ikat('email', $data['email']);
			$this->db->ikat('user_id', $user);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}

		function u_dataakun($data, $user)
		{
			$kueri = "UPDATE $this->dtusr SET status = :status, hak_akses = :hak_akses WHERE user_id = :user_id";
			$this->db->kueri($kueri);
			$this->db->ikat('hak_akses', $data['hak_akses']);
			$this->db->ikat('status', $data['status']);
			$this->db->eksekusi();
			$hasil = $this->db->hit_baris();
			$this->db->tutup();
			return $hasil;
		}
}