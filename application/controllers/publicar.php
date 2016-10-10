<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// Set the date because the local server doesnt have it.
date_default_timezone_set('UTC');

class Publicar extends CI_Controller {

	public function __construct(){    
        parent::__construct();
        $this->layout->setLayout('login');
		$this->layout->setTitle("Anuncios - Publicar nuevo aviso");
		
    }
	
	private function header_information(){
\		// ----> HEADER	
		$getCategories = $this->general_model->getCategories();
		$getSubcategories = $this->general_model->listSubcategoriesAll();
		$name_user = $this->session->userdata('login_user_name');
		$this->layout->view('header', compact("name_user", "getCategories", "getSubcategories"));
		
	}
	
	
	public function index(){
		
		// ----> HEADER
		$this->header_information();
		
		if ($this->session->userdata('login_state') == FALSE ){
			$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-info" role="alert"><strong>Lo sentimos!</strong> Debe registrase para poder publicar</div>');
			redirect(base_url().'login',  301);

		}else{
			
			//IF THE FORM IS SEND
			if($this->input->post()){
				if($this->form_validation->run("publicar")){
					
					$data=array
                   (
						'class_category'	=>$this->input->post("subcategories",true),
						'class_title'		=>$this->input->post("class_title",true),
						'class_description'	=>$this->input->post("class_description",true),						
						'class_id_city'		=>$this->input->post("class_comuna",true),
						'class_address'		=>$this->input->post("class_address",true),
						'class_datestart'	=>date('Y-m-d H:i:s'),
						'class_user_id'		=>$this->session->userdata('login_iduser'),
						'class_state'		=>0 //0 Inactivo, 1 Activo 
						
                   );
				   
					// Ingresar el registro a la base de datos.
					$save = $this->general_model->addPublicacion($data);
					
					if($save){
						//REDIRECCIONAR A LA SIGUIENTE PAGINA PARA AGREGAR LAS IMAGENES. 
						$encrypyUrl = encryptURL($save, 'anuncios');
						
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-success" role="alert"><strong>Felicidades!</strong> Tu publicacion ha sido creada. Ahora debes agregar las imagenes. </div>');
						//echo base_url().'publicar/imagenes/'.$encrypyUrl;
						redirect(base_url().'publicar/imagenes/'.$encrypyUrl, 301);
					}else{
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> Pero no se pudo procesar la solicitud</div>');
						redirect(base_url().'publicar',  301);
					}
				}// enf if validation
			} // end if post
			
			
			$categories = $this->general_model->getCategories();	
			$comunas = $this->general_model->getComunas();
				
			$this->layout->alernative_view('publicar', compact("categories", "comunas"));
			$this->layout->alernative_view('footer');		
				
		} // endif session*/
	}
	
	
	
	
	//Ajax para obtener las subcategorias.
	public function getsubcategories(){
		
		$this->layout->setLayout('template_ajax');				
		$id = $this->input->post("category",true);
		$getSubcategory = $this->general_model->listSubcategories($id);
		$this->layout->alernative_view('ajaxview/subcategories', compact('getSubcategory', 'id'));
	}
	
	
	//Publicar Imagenes luego de crear el aviso.
	public function imagenes($id = null){
		if(!$id){	show_404();	}
		
		$aux = decryptURL($id, 'anuncios');
		
		// ----> HEADER
		$this->header_information();
		
		if ($this->session->userdata('login_state') == FALSE ){
			$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-info" role="alert"><strong>Lo sentimos!</strong> Debe registrase para poder publicar</div>');
			redirect(base_url().'login',  301);

		}else{
			
			if($this->input->post()){
				
				if(isset($_FILES)){
				
					$ruta = $_SERVER['DOCUMENT_ROOT']."/anuncios/public/uploads/";
					
					$nombre_archivo = strtolower($_FILES['class_imagen']['name']);
					$nombre_imagen = $this->input->post("class_id",true).'_'.date('YmdHis');
					
					if(substr($nombre_archivo, -3) == 'jpg' || substr($nombre_archivo, -3) == 'png' || substr($nombre_archivo, -3) == 'gif'){
						$extension = substr($nombre_archivo, -3);
						$nombre_imagen = $nombre_imagen.'.'.$extension;
						
					}elseif(substr($nombre_archivo, -4) == 'jpeg'){
						$extension = substr($nombre_archivo, -4);
						$nombre_imagen = $nombre_imagen.'.'.$extension;
					}	
					
					if(@move_uploaded_file($_FILES['class_imagen']['tmp_name'], $ruta.$nombre_imagen)){
						//Una vez creada, se graba la imagen en la base de datos. 
						$data=array (
							'img_class_id'		=>$this->input->post("class_id",true),
							'img_route'			=>$nombre_imagen,							
					   );
						
						$save = $this->general_model->addImagenCalssified($data);
						
						if($save){
							$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-success" role="alert"><strong>Felicidades!</strong> Su publicacion ha sido finalizada.</div>');
							redirect(base_url().'publicar/finalizado/'.$id,  301);
						
						}else{
							$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> la imagen no se ha podido procesar	<br /> '.$ruta.$nombre_imagen.'<br />'.$_FILES['class_imagen']['error'].'</div>');
							redirect(base_url().'publicar/imagenes/'.$id,  301);
						}
											
					}else{
						$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> la imagen no se ha podido procesar	<br /> '.$ruta.$nombre_imagen.'<br />'.$_FILES['class_imagen']['error'].'</div>');
						redirect(base_url().'publicar/imagenes/'.$id,  301);
					}
					
				}else{
					$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-danger" role="alert"><strong>Lo sentimos!</strong> ha ocurrido un error.<br /></div>');
					redirect(base_url().'publicar/imagenes/'.$id,  301);
				}
				
			}
				
				//Obtiene la informacion ingresada Recientemente. 
				$publicacion = $this->general_model->getClassifiedId($aux);	
				
				$this->layout->alernative_view('publicar_images', compact("publicacion", "id"));
				//$this->layout->view('publicar_images');
				$this->layout->alernative_view('footer');
			
		}
	}
	
	public function finalizado($id = null){
		$aux = decryptURL($id, 'anuncios');

		// ----> HEADER
		$this->header_information();

		if ($this->session->userdata('login_state') == FALSE ){
			$this->session->set_flashdata('ControllerMessage', '<div class="alert alert-info" role="alert"><strong>Lo sentimos!</strong> Debe registrase para poder publicar</div>');
			redirect(base_url().'login',  301);

		}else{
			//Obtiene la informacion ingresada Recientemente. 
			$publicacion = $this->general_model->getClassifiedAll($aux);	
			$this->layout->alernative_view('publicar_finalizado', compact("publicacion"));
			$this->layout->alernative_view('footer');
		}
	}
}