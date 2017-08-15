<?php
	
	error_reporting(error_reporting() & ~E_NOTICE);
	
	date_default_timezone_set('America/Sao_Paulo');	

	require_once "bd/bd.php";
	require_once "classes/movie.php";
	require_once "classes/genere.php";
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}
	
?>