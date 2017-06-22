<?php

/**
 * Classe Coordenador
 */
class Coordenador {

    private $nomeCoordenador;
    private $siape;
    private $curso;
    private $instituicaoCord;

    /**
     * Construtor da Classe Coordenador
     * @param type $nomeCoordenador
     * @param type $siape
     * @param type $curso
     * @param type $instituicaoCord
     */
    function __construct($nomeCoordenador, $siape, $curso, $instituicaoCord) {
        $this->nomeCoordenador = $nomeCoordenador;
        $this->siape = $siape;
        $this->curso = $curso;
        $this->instituicaoCord = $instituicaoCord;
    }

    public function get_nomeCoordenador() {
        return $this->nomeCoordenador;
    }

    public function get_siape() {
        return $this->siape;
    }

    public function get_curso() {
        return $this->curso;
    }

    public function get_instituicaoCord() {
        return $this->instituicaoCord;
    }

    public function set_nomeCoordenador($nomeCoordenador) {
        $this->nome = $nomeCoordenador;
    }

    public function set_siape($siape) {
        $this->siape = $siape;
    }

    public function set_curso($curso) {
        $this->curso = $curso;
    }

    public function set_instituicaoCord($instituicaoCord) {
        $this->instituicaoCord = $instituicaoCord;
    }

}
