<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){    
        parent::__construct();
        $this->layout->setLayout('default');
		$this->layout->setTitle("Anuncios - Login");
    }
	
	public function index(){
		if ($this->session->userdata('login_state') == TRUE ){
			redirect('index', 'refresh');

		}else{
			
			
			//IF THE FORM IS SEND
			if ($this->input->post()){
				
				$id_login = addslashes(strip_tags(htmlspecialchars($this->input->post('login', TRUE))));					
				$is_active = $this->general_model->activeUsuario($id_login);
				
				if($is_active == false){
					$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-icon alert-dismissible alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button><strong>ERROR: </strong>Empresa Inactiva, Favor Contactarse con su administrador del sistema.</div>');
                	redirect(base_url().'login',  301);
					
				}else{
					$login = $this->general_model->login_user($id_login, md5($this->input->post('password', TRUE)));		
					//Si el login fue exitoso, redirecciono segun corresponda.
					if($login == true){
						redirect('index', 'refresh');
					}else{
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-icon alert-dismissible alert-error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button><strong>ERROR: </strong>User or Password incorrect.</div>');	
						redirect(base_url().'login',  301);
					}
				}
			}
				
				
			$this->layout->view('header_login');	
			$this->layout->alernative_view('login');
			$this->layout->alernative_view('footer');		
				
		}
		
		
	}
	
	
	public function logout(){
		if ($this->session->userdata('login_state') == TRUE ){

			//Borrando los datos de la session activa
			$this->session->unset_userdata('login_state');
			$this->session->unset_userdata('login_email');
			$this->session->unset_userdata('login_iduser');
			$this->session->unset_userdata('login_usertype');
			$this->session->unset_userdata('login_user_name');
			
			//Destruyendo la session

			$this->session->sess_destroy();
			redirect('index', 'refresh');

		}

	}
}