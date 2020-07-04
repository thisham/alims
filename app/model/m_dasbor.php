<?php 

/**
 * 
 */
class m_dasbor extends Kontroler
{
	private $app	= 'daftar_app';
	private $lab	= 'daftar_lab';
	private $adl	= 'daftar_adl';
	private $mhs	= 'daftar_mhs';
	private $usr	= 'user';
	private $gpp	= 'guna_app';
	private $glb	= 'guna_lab';
	private $gdl	= 'guna_adl';
	private $db;
	
	function __construct()
	{
		$this->db = new pangkalan_data();
	}

	function data_lab()
	{
		$kueri = "SELECT * FROM $this->lab";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function data_adl()
	{
		$kueri = "SELECT * FROM $this->adl";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function data_app()
	{
		$kueri = "SELECT * FROM $this->app";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function data_mhs()
	{
		$kueri = "SELECT * FROM $this->mhs";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function guna_lab()
	{
		$kueri = "SELECT * FROM $this->glb";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function guna_adl()
	{
		$kueri = "SELECT * FROM $this->gdl";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function guna_app()
	{
		$kueri = "SELECT * FROM $this->gpp";
		$this->db->kueri($kueri);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function contribution_lab($usr)
	{
		$kueri = "SELECT * FROM $this->glb WHERE gnlab_lbrn = :usr";
		$this->db->kueri($kueri);
		$this->db->ikat('usr', $usr);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function contribution_adl($usr)
	{
		$kueri = "SELECT * FROM $this->gdl WHERE gnadl_lbrn = :usr";
		$this->db->kueri($kueri);
		$this->db->ikat('usr', $usr);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function contribution_app($usr)
	{
		$kueri = "SELECT * FROM $this->gpp WHERE gnapp_lbrn = :usr";
		$this->db->kueri($kueri);
		$this->db->ikat('usr', $usr);
		$this->db->eksekusi();
		$hasil = $this->db->hasil_jamak();
		$this->db->tutup();
		return $hasil;
	}

	function data_usr($usr)
	{
		$a = count($this->contribution_app($usr));
		$b = count($this->contribution_adl($usr));
		$c = count($this->contribution_lab($usr));
		return $a + $b + $c;
	}
}