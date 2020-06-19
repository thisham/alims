<?php

/**
 * 
 */
class Kontroler
{
	
	// Fungsi Utama

		public function tampilkan($view, $data = [])
		{
			require_once DIREKTORI . '/app/tampilan/' . $view . '.php';
		}

		public function model($model)
		{
			require_once DIREKTORI . '/app/model/' . $model . '.php';
			return new $model;
		}

		public function pustaka($pustaka)
		{
			require_once DIREKTORI . '/app/pustaka/' . $pustaka . '.php';
			return new $pustaka;
		}

		public function helper($helper)
		{
			require_once DIREKTORI . '/app/helper/' . $helper . '.php';
		}

	// Fungsi Sesi

		public function mulaisesi($sesi, $data)
		{
			$_SESSION[$sesi] = $data;
			return $_SESSION;
		}

		public function akhirsesi($sesi)
		{
			if ( isset($_SESSION[$sesi]) ) {
				unset($_SESSION[$sesi]);
			}
		}

		public function datasesi($data)
		{
			if (isset($_SESSION[$data])) {
				return $_SESSION[$data];
			}
		}
}

?>