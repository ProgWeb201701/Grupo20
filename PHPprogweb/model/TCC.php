<?php

/**
 * Classe TCC.
 */
class TCC {

    public $tituloTCC;
    public $temaTCC;

    //Validar 
    /**
     * Construtor da Classe TCC
     * @param type $tituloTCC
     * @param type $temaTCC
     */
    function __construct($tituloTCC, $temaTCC) {
        $this->tituloTCC = $tituloTCC;
        $this->temaTCC = $temaTCC;
    }

    public function get_tituloTCC() {
        return $this->tituloTCC;
    }

    public function get_temaTCC() {
        return $this->temaTCC;
    }

    public function set_tituloTCC($tituloTCC) {
        $this->tituloTCC = $tituloTCC;
    }

    public function set_temaTCC($temaTCC) {
        $this->temaTCC = $temaTCC;
    }

}
?> 

