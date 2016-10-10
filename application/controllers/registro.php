<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct(){    
        parent::__construct();
        $this->layout->setLayout('default');
		$this->layout->setTitle("Anuncios - Registro");
		
    }
	
	public function index(){
		if ($this->session->userdata('login_state') == TRUE ){
			redirect('index', 'refresh');

		}else{
			
			//IF THE FORM IS SEND
			if($this->input->post()){
				if($this->form_validation->run("register")){
					$data=array
                   (
                        'user_rut'			=>$this->input->post("user_rut",true),
						'user_name'			=>$this->input->post("user_name",true),
						'user_lastname'		=>$this->input->post("user_lastname",true),
						'user_email'		=>$this->input->post("user_email",true),						
						'user_password'		=>md5($this->input->post("user_password",true)),
						'user_confirmation'	=>2, // Solo ahora marcarlo como confirmado
						'user_id_tipuser'	=>1,
						'user_active'		=>1, //Marcar Activo por el momento. 
						
                   );
				   
				   // Chequear si el correo existe. 
					$check_mail = $this->general_model->checkMailExists($this->input->post('user_email', TRUE));
					
					if($check_mail == true){
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> El correo ingresado ya existe en nuestros registros.</div>');
						redirect(base_url().'registro',  301);
						
					}else{
						// Ingresar el registro a la base de datos.
						$save = $this->general_model->addNewUser($data);
						
						if($save){
							
							//PASO 2 GENERAR CORREO DE CONFIRMACION PARA CREAR EL NUEVO USUARIO
							//VER LUEGO
							
							redirect(base_url().'registro/success',  301);
						}else{
							$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> Pero no se pudo procesar la solicitud</div>');
							redirect(base_url().'registro',  301);
						}
					}
				}
				
				
			}
				
			$this->layout->view('header_login');	
			$this->layout->alernative_view('registro');
			$this->layout->alernative_view('footer');		
				
		} // endif session
	}
	
	public function success(){
		//Generar el link de accion, en donde se mandara una respuesta de confrmacion.
		$this->layout->view('registro_success');
		$this->layout->alernative_view('footer');
	}
	
	
}