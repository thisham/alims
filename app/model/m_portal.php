<?php

/**
 * 
 */
class m_portal extends Kontroler
{
	private $tabel = 'user';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	function daftarkan($data)
	{
		$kueri = "INSERT INTO $this->tabel VALUES (:user_id, :password, :nama, :gender, :email, :hp, :bio, :hak_akses, :status)";
		$this->db->kueri($kueri);
		$this->db->ikat(':user_id', $data['username']);
		$this->db->ikat(':password', base64_encode($data['password']));
		$this->db->ikat(':nama', $data['nama']);
		$this->db->ikat(':gender', '');
		$this->db->ikat(':email', $data['email']);
		$this->db->ikat(':hp', $data['hp']);
		$this->db->ikat(':bio', '');
		$this->db->ikat(':hak_akses', '');
		$this->db->ikat(':status', 'Inaktif');
		$this->db->eksekusi();
		$hasil = $this->db->hit_baris();
		$this->db->tutup();
		return $hasil;
	}

	function masukkan($data)
	{
		$kueri = "SELECT * FROM $this->tabel WHERE user_id = :username AND password = :password";
		$this->db->kueri($kueri);
		$this->db->ikat('username', $data['username']);
		$this->db->ikat('password', base64_encode($data['password']));
		$this->db->eksekusi();
		$hasil = $this->db->hasil_tunggal();
		$this->db->tutup();
		return $hasil;
	}

	function list_user()
	{
		$kueri = "SELECT * FROM $this->tabel";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}
}