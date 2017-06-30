<?php
/* 
 * Classe controller de Professor
 */
 
class Professor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Professor_model');
    } 

    /*
     * Método responsavel por listar todos professores
     */
    function listaProfessores()
    {
        $data['professor'] = $this->Professor_model->get_all_professor();
        
        $data['_view'] = 'professor/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Método responsavel por adicionar professor.
     */
    function adicionaProfessor()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nome' => $this->input->post('nome'),
				'senha' => $this->input->post('senha'),
            );
            
            $professor_id = $this->Professor_model->add_professor($params);
            redirect('professor/index');
        }
        else
        {            
            $data['_view'] = 'professor/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Método responsavel por editar professor
     */
    function editaProfessor($siape)
    {   
        
        $data['professor'] = $this->Professor_model->get_professor($siape);
        
        if(isset($data['professor']['siape']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nome' => $this->input->post('nome'),
					'senha' => $this->input->post('senha'),
                );

                $this->Professor_model->update_professor($siape,$params);            
                redirect('professor/index');
            }
            else
            {
                $data['_view'] = 'professor/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('O professor que voce está tentando excluir, não existe');
    } 

    /*
     * Método responsavel por excluir professor.
     */
    function excluiProfessor($siape)
    {
        $professor = $this->Professor_model->get_professor($siape);

    
        if(isset($professor['siape']))
        {
            $this->Professor_model->delete_professor($siape);
            redirect('professor/index');
        }
        else
            show_error('O professor que voce está tentando excluir, não existe');
    }
    
}

