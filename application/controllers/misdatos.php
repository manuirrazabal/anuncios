<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// Set the date because the local server doesnt have it.
date_default_timezone_set('UTC');

class Misdatos extends CI_Controller {

	public function __construct(){    
        parent::__construct();
        $this->layout->setLayout('login');
		$this->layout->setTitle("Anuncios - Mis Datos");
		
    }
	
	private function header_information(){
				
		// ----> HEADER	
		$getCategories = $this->general_model->getCategories();
		$getSubcategories = $this->general_model->listSubcategoriesAll();
		$name_user = $this->session->userdata('login_user_name');
		$this->layout->view('header', compact("name_user", "getCategories", "getSubcategories"));
	}
	
	public function index(){
		
	
		if ($this->session->userdata('login_state') == FALSE ){
			$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-info" role="alert"><strong>Lo sentimos!</strong> Debe registrase para poder modificar tus datos</div>');
			redirect(base_url().'login',  301);

		}else{
			
			
			// ----> HEADER
			$this->header_information();
			
			$user = $this->general_model->getDataUser($this->session->userdata('login_iduser'));	
				
			$this->layout->alernative_view('misdatos', compact("user"));
			$this->layout->alernative_view('footer');		
				
		} // endif session*/
	}
	
}