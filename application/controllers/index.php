<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Index extends CI_Controller {
	
	public function __construct(){    

        parent::__construct();
        $this->layout->setLayout('default');
		
		//Verifica la session si esta activa o no
		$this->layout->setTitle("Anuncios");
		$this->layout->setDescripcion("Anuncios - Index");	
    }
	
	private function header_information(){
				
		// ----> HEADER	
		$getCategories = $this->general_model->getCategories();
		$getSubcategories = $this->general_model->listSubcategoriesAll();
		$name_user = $this->session->userdata('login_user_name');
		$this->layout->view('header', compact("name_user", "getCategories", "getSubcategories"));
		
		//$menu = $this->general_model->getMenu($this->session->userdata('login_usertype'));
		//$controller = $this->session->userdata('controller');
		//$this->layout->alernative_view('menu', compact("menu", "controller"));	
	}
	
	
	public function index(){		
		// ----> HEADER
		$this->header_information();
		
		// ----> MAIN
		
		/*// Contaadores Administrador (ROOT)
		$totalCompanies = $this->general_model->getTotalCompanies();
		$activeCompanies = $this->general_model->getStatusCompanies(1);
		$inactiveCompanies = $this->general_model->getStatusCompanies(0);
		$expireCompanies = $this->general_model->getCompaniesToExpire();
		$totalGuestlist = $this->general_model->getTotalGuestlist($this->session->userdata('login_idcompany'));
		$expireGuestlist = $this->general_model->getGuestlistExpire($this->session->userdata('login_idcompany'));
		$activeGuestlist = $this->general_model->getGuestlistActive($this->session->userdata('login_idcompany'));
		$deactivateGuestlist = $this->general_model->getDeactivateGuestlist($this->session->userdata('login_idcompany'));
		
		
		$getTypeUser = $this->general_model->getTypeUser($this->session->userdata('login_usertype'));
		$this->layout->alernative_view('dashboard', compact("getTypeUser", "totalCompanies", "activeCompanies", "inactiveCompanies", "expireCompanies", "totalGuestlist", "expireGuestlist", "activeGuestlist", "deactivateGuestlist"));
		*/
		
		$this->layout->alernative_view('index');
		
		// ----> FOOTER
		$this->layout->alernative_view('footer');
	
	}
	
	/*public function change_password(){
		if ($this->input->post()){
			
			if($this->form_validation->run("password")){
				$old_password = md5($this->input->post("old_password",true));
				$check = $this->general_model->checkPassword($old_password, $this->session->userdata('login_iduser'));
				
				if($check){
					$data=array
				   (	'user_password'=>md5($this->input->post("new_password",true)),
				   );
				
				
					$save = $this->general_model->changePassword($data, $this->session->userdata('login_iduser'));
					   
				   if($save){
						redirect(base_url('login/logout'),  301);
					}else{
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger fade in widget-inner">
																			<button type="button" class="close" data-dismiss="alert">×</button>
																			<i class="fa fa-times"></i> Se ha producido un error. Inténtelo nuevamente por favor.
																		</div>');
						redirect(base_url().'index/change_password',  301);
					}
				}else{
					$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger fade in widget-inner">
																			<button type="button" class="close" data-dismiss="alert">×</button>
																			<i class="fa fa-times"></i> El password es incorrecto
																		</div>');
					redirect(base_url('index/change_password'),  301);
				}
				
			}
		}
		
		
		
		// ----> HEADER
		$this->header_information();		
		
		// ----> MAIN
		$this->layout->alernative_view('change_password');		
		
		// ----> FOOTER
		$this->layout->alernative_view('footer');
	}*/
	
	
}