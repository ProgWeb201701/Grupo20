
<?php
 	/**
 	* Classe Banca Avaliadora
 	*/
 	class BancaAvaliadora{
 		private $nomeProfessor1;
                private $nomeProfessor2;
                private $NomeProfessor3;
 		
                /**
                 * Construtor da Classe Aluno
                 * @param type $nomeProfessor1
                 * @param type $nomeProfessor2
                 * @param type $nomeProfessor3
                 */
 		
 		function __construct($nomeProfessor1, $nomeProfessor2, $nomeProfessor3){
 			$this->nomeProfessor1 = $nomeProfessor1;
 			$this->nomeProfessor2 = $nomeProfessor2;
 			$this->nomeProfessor3 = $nomeProfessor3;
			
 		}
 
 		public function get_nomeProfessor1(){
 			return $this->nomeProfessor1;
 		}

 		public function get_nomeProfessor2(){
 			return $this->nomeProfessor2;
 		}
 
 		public function get_nomeProfessor3(){
 			return $this->nomeProfessor3;
 		}

 		
 
 		public function set_nomeProfessor1($nomeProfessor1){
 			$this->nome = $nomeProfessor1;
 
 		}
 
 		public function set_nomeProfessor2($nomeProfessor2){
 			$this->matricula = $nomeProfessor2;
 		}
 
 		public function set_nomeProfessor3($nomeProfessor3){
 			$this->curso = $nomeProfessor3;
 		}
 
 
 
 	}
 
  