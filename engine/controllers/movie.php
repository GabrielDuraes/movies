<?php

	require_once "../config.php";
	

	//parte1
	
	$id_movie = $_POST['id_movie'];
	$title = $_POST['title'];
	$sinopse = $_POST['sinopse'];
	$ano = $_POST['ano'];
	$nota = $_POST['nota'];
	$fk_categoria = $_POST['fk_categoria'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Movie();
	$Item->SetValues($id_movie, $title, $sinopse, $ano, $nota, $fk_categoria); 
	
	
		
	//parte4
	switch($action) {
		case 'create':
			
			
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
