<?php
/* 
 * 
 */
 
class Avaliacao extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Avaliacao_model');
    } 

    /*
     * 
     */
    function listarAvaliacao()
    {
        $data['avaliacao'] = $this->Avaliacao_model->get_all_avaliacao();
        
        $data['_view'] = 'avaliacao/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * 
     */
    function inserirAvaliacao()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nota' => $this->input->post('nota'),
				'observacao' => $this->input->post('observacao'),
				'siape' => $this->input->post('siape'),
            );
            
            $avaliacao_id = $this->Avaliacao_model->add_avaliacao($params);
            redirect('avaliacao/index');
        }
        else
        {            
            $data['_view'] = 'avaliacao/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * 
     */
    function editarAvaliacao($codAvaliacao)
    {   
      
        $data['avaliacao'] = $this->Avaliacao_model->get_avaliacao($codAvaliacao);
        
        if(isset($data['avaliacao']['codAvaliacao']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nota' => $this->input->post('nota'),
					'observacao' => $this->input->post('observacao'),
					'siape' => $this->input->post('siape'),
                );

                $this->Avaliacao_model->update_avaliacao($codAvaliacao,$params);            
                redirect('avaliacao/index');
            }
            else
            {
                $data['_view'] = 'avaliacao/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('O avaliador que voce tentou excluir não existe');
    } 

    /*
     * 
     */
    function excluiAvaliacao($codAvaliacao)
    {
        $avaliacao = $this->Avaliacao_model->get_avaliacao($codAvaliacao);

       
        if(isset($avaliacao['codAvaliacao']))
        {
            $this->Avaliacao_model->delete_avaliacao($codAvaliacao);
            redirect('avaliacao/index');
        }
        else
            show_error('O avaliador que voce tentou excluir não existe');
    }
    
}

