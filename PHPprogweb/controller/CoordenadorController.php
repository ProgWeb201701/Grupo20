<?php

/*
 * Classe controller de Coordenador
 */

class Coordenador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Coordenador_model');
    }

    /*
     * Método responsavel por buscar todos coordenadores.
     */

    function listarCoordenador() {
        $data['coordenador'] = $this->Coordenador_model->get_all_coordenador();

        $data['_view'] = 'coordenador/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Método responsavel por inserir coordenador
     */

    function inserirCoordenador() {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'nomeCoordenador' => $this->input->post('nomeCoordenador'),
            );

            $coordenador_id = $this->Coordenador_model->add_coordenador($params);
            redirect('coordenador/index');
        } else {
            $data['_view'] = 'coordenador/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Método responsavel por editar coordenador.
     */

    function editarCoordenador($siapeProfCoordenador) {

        $data['coordenador'] = $this->Coordenador_model->get_coordenador($siapeProfCoordenador);

        if (isset($data['coordenador']['siapeProfCoordenador'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nomeCoordenador' => $this->input->post('nomeCoordenador'),
                );

                $this->Coordenador_model->update_coordenador($siapeProfCoordenador, $params);
                redirect('coordenador/index');
            } else {
                $data['_view'] = 'coordenador/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The coordenador you are trying to edit does not exist.');
    }
    /*
     * Método responsavel por excluir coordenador
     */
    function excluirCoordenador($siapeProfCoordenador) {
        $coordenador = $this->Coordenador_model->get_coordenador($siapeProfCoordenador);
        
        if (isset($coordenador['siapeProfCoordenador'])) {
            $this->Coordenador_model->delete_coordenador($siapeProfCoordenador);
            redirect('coordenador/index');
        } else
            show_error('The coordenador you are trying to delete does not exist.');
    }

}
