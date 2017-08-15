<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Genere {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_genere;
		private $genere;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_genere, $genere) { 
			$this->id_genere = $id_genere;
			$this->genere = $genere;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO genere 
						  (
				 			id_genere,
				 			genere
						  )  
				VALUES 
					(
				 			'$this->id_genere',
				 			'$this->genere'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_genere,
					 t1.genere
				FROM
					genere AS t1
				ORDER BY t1.genere

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM genere
				WHERE id_genere = '$this->id_genere';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//constructor 
		
		function __construct() { 
			$this->id_genere;
			$this->genere;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_genere;
			$this->genere;
			
			
		}
			
	};

?>
