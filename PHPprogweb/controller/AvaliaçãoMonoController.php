<?php
/* 
 * Classe controller de Avaliação Monografia
 */
 
class Avaliamono extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Avaliamono_model');
    } 

    /*
     * Método responsavel por listar todas monografias.
     */
    function listarAvaliacaoMono()
    {
        $data['avaliamono'] = $this->Avaliamono_model->get_all_avaliamono();
        
        $data['_view'] = 'avaliamono/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Método responsavel por adicionar uma avaliacao de monografia.
     */
    function adicionarAvaliacaoMono()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'codAvaliacao' => $this->input->post('codAvaliacao'),
				'codMono' => $this->input->post('codMono'),
            );
            
            $avaliamono_id = $this->Avaliamono_model->add_avaliamono($params);
            redirect('avaliamono/index');
        }
        else
        {            
            $data['_view'] = 'avaliamono/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Método responsavel por editar uma avaliacao de monografia.
     */
    function editarAvaliacaoMono()
    {   
        
       // $data['avaliamono'] = $this->Avaliamono_model->get_avaliamono($);
        
        if(isset($data['avaliamono']['']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'codAvaliacao' => $this->input->post('codAvaliacao'),
					'codMono' => $this->input->post('codMono'),
                );

              //  $this->Avaliamono_model->update_avaliamono($,$params);            
                redirect('avaliamono/index');
            }
            else
            {
                $data['_view'] = 'avaliamono/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('A avaliacao monografia que voce escolheu para editar, não existe');
    } 

    /*
     * Método responsavel por excluir uma avaliacao de monografia.
     */
    function excluirAvaliacaoMono()
    {
     //   $avaliamono = $this->Avaliamono_model->get_avaliamono($);

        // check if the avaliamono exists before trying to delete it
        if(isset($avaliamono['']))
        {
          //  $this->Avaliamono_model->delete_avaliamono($);
            redirect('avaliamono/index');
        }
        else
            show_error('A avaliacao monografia que voce escolheu para excluir, não existe');
    }
    
}

