<?php

/**
 * 
 */
class p_captcha
{
	private $operand1;
	private $operand2;
	private $operator;

	function inisial()
	{
		$this->operand1 = rand(1, 20);
		$this->operand2 = rand(1, 20);
		$this->operator = '+';
	}

	function buatrumus()
	{
		$hasil = $this->operand1 + $this->operand2;
		$_SESSION['kode'] = $hasil;
	}

	function tampilkanrumus()
	{
		$this->inisial();
		$this->buatrumus();
		$baru = array(
			'a' => $this->operand1,
			'b' => $this->operand2,
			'o' => $this->operator
		);

		return $baru;
	}

	function hasilrumus()
	{
		return $_SESSION['kode'];
	}
}