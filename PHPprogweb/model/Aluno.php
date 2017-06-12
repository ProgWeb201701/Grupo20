<?php
 	/**
 	* Classe Aluno 
 	*/
 	class Aluno{
 		private $nomeAl;
 		private $matricula;
 		private $curso;
 		private $instituicaoAl;
                /**
                 * Construtor da Classe Aluno
                 * @param type $nomeAl
                 * @param type $matricula
                 * @param type $curso
                 * @param type $instituicao
                 */
 		
 		function __construct($nomeAl, $matricula, $curso, $instituicaoAl){
 			$this->nomeAl = $nomeAl;
 			$this->matricula = $matricula;
 			$this->curso = $curso;
			$this->instituicaoAl = $instituicaoAl;
 		}
 
 		public function get_nomeAl(){
 			return $this->nome;
 		}

 		public function get_matricula(){
 			return $this->matricula;
 		}
 
 		public function get_curso(){
 			return $this->curso;
 		}

 		public function get_instituicaoAl(){
 			return $this->instituicaoAl;
 		}
 
 		public function set_nomeAl($nome){
 			$this->nome = $nomeAl;
 
 		}
 
 		public function set_matricula($matricula){
 			$this->matricula = $matricula;
 		}
 
 		public function set_curso($curso){
 			$this->curso = $curso;
 		}
 
 		public function set_instituicao($instituicaoAl){
 			$this->instituicao = $instituicaoAl;
 
 		}
 
 
 	}
 
  