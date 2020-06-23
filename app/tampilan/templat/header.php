<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $data['judul']; ?> - ALIMS</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASIS_URL; ?>/aset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASIS_URL; ?>/aset/css/bootstrap.css">
	<script src="<?php echo BASIS_URL; ?>/aset/js/jquery-3.4.1.slim.min.js"></script>
	<script src="<?php echo BASIS_URL; ?>/aset/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo BASIS_URL; ?>/aset/js/jquery.autocomplete.js"></script>
	<style>
		body {
			font-family: 'Roboto', Arial, Sans-serif;
			font-size: 15px;
			font-weight: 400;
		}
		
		.autocomplete-suggestions {
			border: 1px solid #999;
			background: #FFF;
			overflow: auto;
		}
		
		.autocomplete-suggestion {
			padding: 2px 5px;
			white-space: nowrap;
			overflow: hidden;
		}
		
		.autocomplete-selected {
			background: #F0F0F0;
		}
		
		.autocomplete-suggestions strong {
			font-weight: normal;
			color: #3399FF;
		}
		
		.autocomplete-group {
			padding: 2px 5px;
		}
		
		.autocomplete-group strong {
			display: block;
			border-bottom: 1px solid #000;
		}
	</style>
</head>
<body>