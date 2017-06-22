<?php
/* 
 *
 */
 
class Aluno extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aluno_model');
    } 

    /*
     * Lista os Alunos
     */
    function listarAlunos()
    {
        $data['aluno'] = $this->Aluno_model->get_all_aluno();
        
        $data['_view'] = 'aluno/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * 
     */
    function inserirAlunos()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','required|alpha');
		$this->form_validation->set_rules('login','Login','required|valid_email');
		$this->form_validation->set_rules('curso','Curso','required');
		$this->form_validation->set_rules('senha','Senha','required|min_length[6]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'login' => $this->input->post('login'),
				'senha' => $this->input->post('senha'),
				'nome' => $this->input->post('nome'),
				'curso' => $this->input->post('curso'),
            );
            
            $aluno_id = $this->Aluno_model->add_aluno($params);
            redirect('aluno/index');
        }
        else
        {            
            $data['_view'] = 'aluno/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * 
     */
    function editarAlunos($matricula)
    {   
        
        $data['aluno'] = $this->Aluno_model->get_aluno($matricula);
        
        if(isset($data['aluno']['matricula']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required|alpha');
			$this->form_validation->set_rules('login','Login','required|valid_email');
			$this->form_validation->set_rules('curso','Curso','required');
			$this->form_validation->set_rules('senha','Senha','required|min_length[6]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'login' => $this->input->post('login'),
					'senha' => $this->input->post('senha'),
					'nome' => $this->input->post('nome'),
					'curso' => $this->input->post('curso'),
                );

                $this->Aluno_model->update_aluno($matricula,$params);            
                redirect('aluno/index');
            }
            else
            {
                $data['_view'] = 'aluno/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The aluno you are trying to edit does not exist.');
    } 

    /*
     *
     */
    function remove($matricula)
    {
        $aluno = $this->Aluno_model->get_aluno($matricula);

        if(isset($aluno['matricula']))
        {
            $this->Aluno_model->delete_aluno($matricula);
            redirect('aluno/index');
        }
        else
            show_error('O aluno que voce deseja excluir não existe.');
    }
    
}
