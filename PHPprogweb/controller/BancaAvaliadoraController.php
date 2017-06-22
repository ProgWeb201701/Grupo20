<?php

/*
 * Classe controller da Banca Avaliadora
 */
class Bancaavaliadora extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Bancaavaliadora_model');
    }
    /*
     * Método responsavel por listar todas as bancas avaliadoras.
     */
    function listarBancaAvaliadora() {
        $data['bancaavaliadora'] = $this->Bancaavaliadora_model->get_all_bancaavaliadora();

        $data['_view'] = 'bancaavaliadora/index';
        $this->load->view('layouts/main', $data);
    }
    /*
     * Método responsavel por inserir uma banca avaliadora.
     */
    function inserirBancaAvaliadora() {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'siapeBanca1' => $this->input->post('siapeBanca1'),
                'siapeBanca2' => $this->input->post('siapeBanca2'),
            );

            $bancaavaliadora_id = $this->Bancaavaliadora_model->add_bancaavaliadora($params);
            redirect('bancaavaliadora/index');
        } else {
            $data['_view'] = 'bancaavaliadora/add';
            $this->load->view('layouts/main', $data);
        }
    }
    /*
     * Método responsavel por editar uma banca avaliadora.
     */
    function editarBancaAvaliadora() {
        //Ainda eu não fiz o método get banca avaliadora por isso esta comentado.
        //  $data['bancaavaliadora'] = $this->Bancaavaliadora_model->get_bancaavaliadora($);

        if (isset($data['bancaavaliadora'][''])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'siapeBanca1' => $this->input->post('siapeBanca1'),
                    'siapeBanca2' => $this->input->post('siapeBanca2'),
                );

                //    $this->Bancaavaliadora_model->update_bancaavaliadora($,$params);            
                redirect('bancaavaliadora/index');
            } else {
                $data['_view'] = 'bancaavaliadora/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('A banca avaliadora que voce deseja editar, não existe');
    }
    /*
     * Método responsavel por excluir uma banca avaliadora.
     */
    function excluirBancaAvaliadora() {
        //Ainda eu não fiz o método get banca avaliadora por isso esta comentado.
        //   $bancaavaliadora = $this->Bancaavaliadora_model->get_bancaavaliadora($);

        if (isset($bancaavaliadora[''])) {
            //   $this->Bancaavaliadora_model->delete_bancaavaliadora($);
            redirect('bancaavaliadora/index');
        } else
            show_error('A banca avaliadora que voce deseja excluir, não existe');
    }

}
