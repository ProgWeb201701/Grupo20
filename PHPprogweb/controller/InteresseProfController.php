<?php
/* 
 * Classe controller de Interesse do Professor
 */
 
class Interesseprof extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Interesseprof_model');
    } 

    /*
     * Método que lista todos os interesses de um professor.
     */
    function listarInteresseProf()
    {
        $data['interesseprof'] = $this->Interesseprof_model->get_all_interesseprof();
        
        $data['_view'] = 'interesseprof/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Método responsavel por adicionar interesse de um professor.
     */
    function adicionarInteresseProf()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'codInteresse' => $this->input->post('codInteresse'),
				'siape' => $this->input->post('siape'),
            );
            
            $interesseprof_id = $this->Interesseprof_model->add_interesseprof($params);
            redirect('interesseprof/index');
        }
        else
        {            
            $data['_view'] = 'interesseprof/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Método responsavel por editar interesse de um professor.
     */
    function editarInteresseProf()
    {   
        // check if the interesseprof exists before trying to edit it
     //   $data['interesseprof'] = $this->Interesseprof_model->get_interesseprof($);
        
        if(isset($data['interesseprof']['']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'codInteresse' => $this->input->post('codInteresse'),
					'siape' => $this->input->post('siape'),
                );

        //        $this->Interesseprof_model->update_interesseprof($,$params);            
                redirect('interesseprof/index');
            }
            else
            {
                $data['_view'] = 'interesseprof/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('O interesse de um professor que voce escolheu para editar, não existe.');
    } 

    /*
     * Método responsavel por excluir um interesse de um determinado professor.
     */
    function excluirInteresseProf()
    {
      //  $interesseprof = $this->Interesseprof_model->get_interesseprof($);

        // check if the interesseprof exists before trying to delete it
        if(isset($interesseprof['']))
        {
        //    $this->Interesseprof_model->delete_interesseprof($);
            redirect('interesseprof/index');
        }
        else
            show_error('O interesse de um professor que voce escolheu para excluir, não existe.');
    }
    
}

