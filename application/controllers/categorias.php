<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorias extends CI_Controller {

	public function __construct(){    
        parent::__construct();
       
	   	//$this->general_model->login_active();
	    $this->layout->setLayout('default');
		$this->layout->setTitle("Anuncios - Categorias");
		
    }
	
	
	private function header_information(){
				
		// ----> HEADER	
		$getCategories = $this->general_model->getCategories();
		$getSubcategories = $this->general_model->listSubcategoriesAll();
		$name_user = $this->session->userdata('login_user_name');
		$this->layout->view('header_myaccount', compact("name_user", "getCategories", "getSubcategories"));
	}
	
	
	public function busqueda($id = null){
		$aux = decryptURL($id, 'anuncios');

		// ----> HEADER
		$this->header_information();
		
		//Display to kind of categories, one with id and the other one without.
		if($id){
			//Show id Category. 
			$getCategoryName = $this->general_model->getCategoryName($aux);
			$getSubcategories = $this->general_model->listSubcategories($aux);
			
			$this->layout->alernative_view('categorias_id', compact("getCategoryName", "getSubcategories"));
		}else{
			//Without category
			$getCategories = $this->general_model->getCategories();
			$getSubcategories = $this->general_model->listSubcategoriesAll();
			
			$this->layout->alernative_view('categorias', compact("getCategories", "getSubcategories"));
		}
		
		$this->layout->alernative_view('footer');		
	
	}
	
	
	
	
}