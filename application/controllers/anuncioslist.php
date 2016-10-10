<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Anuncioslist extends CI_Controller {

	public function __construct(){    
        parent::__construct();
       
	   	//$this->general_model->login_active();
	    $this->layout->setLayout('default');
		$this->layout->setTitle("Anuncios");
		
    }
	
	
	private function header_information(){
				
		// ----> HEADER	
		$getCategories = $this->general_model->getCategories();
		$getSubcategories = $this->general_model->listSubcategoriesAll();
		$name_user = $this->session->userdata('login_user_name');
		$this->layout->view('header_myaccount', compact("name_user", "getCategories", "getSubcategories"));
	}
	
	
	public function busqueda($id = null){
		if(!$id) show_404(); 
		
		$aux = decryptURL($id, 'anuncios');

		$this->load->library('pagination');

		//$config['base_url'] = base_url().'anuncioslist/busqueda/';
		//$config['total_rows'] = 200;
		//$config['per_page'] = 20;

		//$this->pagination->initialize($config);

		// ----> HEADER
		$this->header_information();
				
		$getAnuncios = $this->general_model->getProductList($aux);
		$getSubcategorieName = $this->general_model->getSubcategorieName($aux);
		$getResultNumber = $this->general_model->getTotalResultList($aux);

		//PAGINATION
		//$this->load->library('PAGINATION');



		$this->layout->alernative_view('anuncios_list', compact("getAnuncios", "getSubcategorieName", "getResultNumber"));
		$this->layout->alernative_view('footer');		
	
	}
	
	
	
	
}