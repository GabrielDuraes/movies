<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Movie {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_movie;
		private $title;
		private $sinopse;
		private $ano;
		private $nota;
		private $fk_categoria;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_movie, $title, $sinopse, $ano, $nota, $fk_categoria) { 
			$this->id_movie = $id_movie;
			$this->title = $title;
			$this->sinopse = $sinopse;
			$this->ano = $ano;
			$this->nota = $nota;
			$this->fk_categoria = $fk_categoria;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO movie 
						  (
				 			id_movie,
				 			title,
				 			sinopse,
				 			ano,
				 			nota,
				 			fk_categoria
						  )  
				VALUES 
					(
				 			'$this->id_movie',
				 			'$this->title',
				 			'$this->sinopse',
				 			'$this->ano',
				 			'$this->nota',
				 			'$this->fk_categoria'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT *
				FROM
					movie AS t1
				WHERE
					t1.id_movie  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		public function pesq_all($pesq){
			$sql = "
				SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
			WHERE t1.title LIKE '%$pesq%'
			ORDER BY t1.title
				
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
		
		public function pesq_cat($pesq, $cate){
			$sql = "
				SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
			WHERE t1.title LIKE '%$pesq%' AND t2.genere = '$cate'
			ORDER BY t1.title
				
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

		public function ReadAllMovies(){
			$sql = "
				SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
				
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
		
		public function ReadAllMoviesCategoria($categoria){
			$sql = "
				SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
				WHERE t2.genere = '$categoria'
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

		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($item_por_pag, $pagina) {
			$sql = "
			SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
				ORDER BY t1.title
				LIMIT $item_por_pag OFFSET $pagina
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}

		public function ReadAll_Paginacao_Categoria($item_por_pag, $pagina, $categoria) {
			$sql = "
			SELECT *
				FROM
					movie AS t1
				INNER JOIN genere AS t2 ON t1.fk_categoria = t2.id_genere
				WHERE t2.genere = '$categoria'
				ORDER BY t1.title
				LIMIT $item_por_pag OFFSET $pagina
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
				
		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE movie SET
				
				  title = '$this->title',
				  sinopse = '$this->sinopse',
				  ano = '$this->ano',
				  nota = '$this->nota',
				  fk_categoria = '$this->fk_categoria'
				
				WHERE id_movie = '$this->id_movie';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM movie
				WHERE id_movie = '$this->id_movie';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_movie;
			$this->title;
			$this->sinopse;
			$this->ano;
			$this->nota;
			$this->fk_categoria;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_movie;
			$this->title;
			$this->sinopse;
			$this->ano;
			$this->nota;
			$this->fk_categoria;
			
			
		}
			
	};

?>
