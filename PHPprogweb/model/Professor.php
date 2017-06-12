<?php
 	/**
 	* Classe Professor
 	*/
 	class Professor{
 		
 		private $nomeProf;
 		private $instituicao;
 		private $email;
 		private $titulacao;
 		private $areaAtuacao;
                // validar SIAPE
                /**
                 * Construtor da classe Professor
                 * @param type $nomeProf
                 * @param type $instituicao
                 * @param type $email
                 * @param type $titulacao
                 * @param type $areaAtuacao
                 */
 
 		function __construct($nomeProf, $instituicao, $email, $titulacao, $areaAtuacao){
 			$this->nomeProf = $nomeProf;
 			$this->instituicao = $instituicao;
 			$this->email = $email;
 			$this->titulacao = $titulacao;
 			$this->area_atuacao = $areaAtuacao;
 		}
 
 		public function get_nomeProf(){
 			return $this->nomeProf;
 		}
 
 		public function get_instituicao(){
 			return $this->instituicao;
 		}
 
 		public function get_email(){
 			return $this->email;
 		}
 
 		public function get_titulacao(){
 			return $this->titulacao;
 		}
 
 		public function get_areAtuacao(){
 			return $this->areaAtuacao;
 		}
 
		public function set_nomeProf($nomeProf){
 			$this->nome = $nomeProf;
 		}
 
 		public function set_instituicao($instituicao){
 			$this->instituicao = $instituicao;
 		}
 
 		public function set_email($email){
 			$this->email = $email;
 		}
 
 		public function set_titulacao($titulacao){
 			$this->titulacao = $titulacao;
 		}
 
 		public function set_areAtuacao($areaAtuacao){
			$this->areaAtuacao = $areaAtuacao;
 		}
 
 
 	}
  