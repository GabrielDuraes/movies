<?php

	require_once "../config.php";
	

	//parte1
	
	$id_genere = $_POST['id_genere'];
	$genere = $_POST['genere'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Genere();
	$Item->SetValues($id_genere, $genere); 
	
	
		
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
