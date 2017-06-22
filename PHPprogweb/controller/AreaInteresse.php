<?php

/*
 * Classe controller de Area de Interesse
 */
class Areainteresse extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Areainteresse_model');
    }
    /*
     * Método responsavel por listar as areas de interesse
     */
    function listarAreaInteresse() {
        $data['areainteresse'] = $this->Areainteresse_model->get_all_areainteresse();

        $data['_view'] = 'areainteresse/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Método responsavel por inserir uma area de interesse
     */
    function inserirAreaInteresse() {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'descricao' => $this->input->post('descricao'),
            );

            $areainteresse_id = $this->Areainteresse_model->add_areainteresse($params);
            redirect('areainteresse/index');
        } else {
            $data['_view'] = 'areainteresse/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Método responsavel por editar uma area de interesse
     */

    function editarAreaInteresse($codInteresse) {

        $data['areainteresse'] = $this->Areainteresse_model->get_areainteresse($codInteresse);

        if (isset($data['areainteresse']['codInteresse'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                Ïdescricao' => $this->input->post('descricao'),
                );

                $this->Areainteresse_model->update_areainteresse($codInteresse,$params);            
                redirect('areainteresse/index');
            }
            else
            {
                $data['_view'] = 'areainteresse/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('A area de interesse que voce deseja editar, não existe.');
    } 

    /*
     * Método responsavel por excluir uma area de interesse
     */
    function excluirAreaInteresse($codInteresse)
    {
        $areainteresse = $this->Areainteresse_model->get_areainteresse($codInteresse);

        if(isset($areainteresse['codInteresse']))
        {
            $this->Areainteresse_model->delete_areainteresse($codInteresse);
            redirect('areainteresse/index');
        }
        else
            show_error('A area de interesse que voce deseja excluir, não existe.');
    }
}
