<?php
/* 
 * Classe controller de Monografia
 */
 
class Monografia extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Monografia_model');
    } 

    /*
     * Método responsavel por listar todas monografias
     */
    function listarMonografia()
    {
        $data['monografia'] = $this->Monografium_model->get_all_monografia();
        
        $data['_view'] = 'monografium/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Método responsavel por adicionar as monografias
     */
    function adicionarMonografias()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'versao' => $this->input->post('versao'),
				'titulo' => $this->input->post('titulo'),
				'matricula' => $this->input->post('matricula'),
            );
            
            $monografium_id = $this->Monografium_model->add_monografium($params);
            redirect('monografium/index');
        }
        else
        {            
            $data['_view'] = 'monografium/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Método responsavel por editar monografia
     */
    function editarMonografia($codMono)
    {   
        
        $data['monografium'] = $this->Monografium_model->get_monografium($codMono);
        
        if(isset($data['monografium']['codMono']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'versao' => $this->input->post('versao'),
					'titulo' => $this->input->post('titulo'),
					'matricula' => $this->input->post('matricula'),
                );

                $this->Monografium_model->update_monografium($codMono,$params);            
                redirect('monografium/index');
            }
            else
            {
                $data['_view'] = 'monografium/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('A monografia que voce está tentando editar, não existe.');
    } 

    /*
     * Método responsavel por excluir monografia.
     */
    function excluirMonografia($codMono)
    {
        $monografium = $this->Monografium_model->get_monografium($codMono);

        // check if the monografium exists before trying to delete it
        if(isset($monografium['codMono']))
        {
            $this->Monografium_model->delete_monografium($codMono);
            redirect('monografium/index');
        }
        else
            show_error('A monografia que voce esta tentando excluir, não existe.');
    }
    
}
