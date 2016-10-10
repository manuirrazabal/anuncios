<?php

//error_reporting ('E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR');

/***********************************************
*	Model	: General_Model.php
*	Creator	: Manuel Irrazabal
************************************************
*
*	Modelo utilizado para la creacion de todos
*	los metodos que se utilzaran en el sistema
*	tales como, insertar informacion, editar, 
*	eliminar, listados, etc.
*
************************************************/


class General_model extends CI_Model {	
    public function __construct(){
        parent::__construct();
		
    }	

	// -------> REGISTRO / LOGIN <--------
	
	// Check si el usuario ingresado existe
	public function checkMailExists($email){
		$query = $this->db->query("SELECT *
								   FROM an_users
								   WHERE user_email = '$email' LIMIT 1");
		
		if ($query->num_rows() > 0){
			 return true;
		}else{
			return false;
		}
	}
	
	//Ver si el usuario esta activo
	public function activeUsuario($email){
		$query = $this->db->query("SELECT *
								   FROM an_users
								   WHERE user_email = '$email'
								   AND user_active = 1 LIMIT 1");
		
		if ($query->num_rows() > 0){
			 return true;
		}else{
			return false;
		}
	}

	public function addNewUser($array=array()){
		$this->db->insert("an_users",$array);
        return true;
	}


	//CREATE USER'S SESSION
	public function login_user($email, $password){	
		// User data
		$this->session->unset_userdata('login_state');		//GENERAL STATE. if the session user is active.
		$this->session->unset_userdata('login_email');		//Nickname
		$this->session->unset_userdata('login_iduser');		//User ID
		$this->session->unset_userdata('login_usertype');	//Type of user
		$this->session->unset_userdata('login_user_name'); 	//Complete user name	


		$query = $this->db->query("SELECT * FROM an_users WHERE user_email = '$email' AND user_password = '$password' LIMIT 1");

		if ($query->num_rows() > 0){

			$row = $query->row();			
			$name = $row->user_name .' '. $row->user_lastname;
			
			
			//if the user is founded -> Start Session. 
			$this->session->set_userdata('login_state', TRUE);
			$this->session->set_userdata('login_email', $row->user_email);
			$this->session->set_userdata('login_iduser', $row->user_id);
			$this->session->set_userdata('login_usertype', $row->user_id_tipuser);
			$this->session->set_userdata('login_user_name', $name);
				
			return true;
		}else{
			return false;
		}
	}
	
	//Reviso si la session esta activa.
	public function login_active(){
		if ($this->session->userdata('login_state') == FALSE ){
			redirect('login', 'refresh');
			return true;
		}
	}
	
	
	// -------> PUBLICAR ANUNCIO <--------
	
	//Obtiene las categorias
	public function getCategories(){
		$query = $this->db->query("SELECT * FROM an_categories ORDER BY cat_order ASC");
		return $query->result();
	}
	
	public function getCategoryName($id){
		$query = $this->db->query("SELECT * FROM an_categories WHERE cat_id = $id LIMIT 1");
		
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->cat_description;
		}
	}
	
	//Obtiene subcategorias por ID categoria
	public function listSubcategories($id){
		$query = $this->db->query("SELECT * FROM an_subcategory WHERE subc_id_cat =  $id ORDER BY subc_order ASC");
		return $query->result();
	}
	
	//obtiene Todas las Subcategorias. 
	public function listSubcategoriesAll(){
		$query = $this->db->query("SELECT * FROM an_subcategory");
		return $query->result();
	}
	
	//Obtiene todas las comunas de la region metropilitana. 
	//VERSION 2.0 AGREGAR A TODO CHILE.
	
	public function getComunas(){
		$query = $this->db->query("SELECT * FROM an_cities WHERE city_idstate = 13 ORDER BY city_description ASC");
		return $query->result();
	}
	
	// Agregar Publicacion.
	public function addPublicacion($array=array()){
		$this->db->insert("an_classified",$array);
        
		if($this->db->insert_id()){
			return $this->db->insert_id();
		}else{
			return 0;
		}
	}
	
	//Editar Publicacion.
	public function editPublicacion($datos=array() ,$id){
		$this->db->where('class_id	', $id);
        $this->db->update('an_classified', $datos); 
        return true; 
	}
	
	//Obtener clasificado por ID
	public function getClassifiedId($id){
		$query = $this->db->query("SELECT * FROM an_classified WHERE class_id = ".$id);
		return $query->row();
	}
	
	public function addImagenCalssified($array=array()){
		$this->db->insert("an_class_images",$array);
        return true;
	}
	
	public function getClassifiedAll($id){
		/*echo "SELECT * 
									FROM an_classified c 
									LEFT JOIN an_class_images i ON c.class_id = i.img_class_id 
									LEFT JOIN an_cities cy ON c.class_id_city = cy.city_id
									LEFT JOIN an_states s ON cy.city_idstate = s.state_id
									LEFT JOIN an_subcategory sub ON c.class_category = sub.subc_id
									LEFT JOIN an_categories cat ON sub.subc_id_cat = cat.cat_id
									WHERE c.class_id = ".$id;*/
									
		$query = $this->db->query("SELECT * 
									FROM an_classified c 
									LEFT JOIN an_class_images i ON c.class_id = i.img_class_id 
									LEFT JOIN an_cities cy ON c.class_id_city = cy.city_id
									LEFT JOIN an_states s ON cy.city_idstate = s.state_id
									LEFT JOIN an_subcategory sub ON c.class_category = sub.subc_id
									LEFT JOIN an_categories cat ON sub.subc_id_cat = cat.cat_id
									WHERE c.class_id = ".$id);
		return $query->row();
	}
	
	
	// -------> ADMINISTRACION MIS DATOS <--------
	// PARA CAMBIAR LA INFORMACION PERSONAL SE DEBERA ENVIAR UN CORREO EN EL FUTURO SE HABILITARA LA OPCION. 
	
	public function getDataUser($id){
		$query = $this->db->query("SELECT * FROM an_users WHERE user_id = ".$id);
		return $query->row();
	}
	
	
	// -------> ADMINISTRACION MIS PUBLICACIONES <--------
	public function getPublicaciones($id){
		$query = $this->db->query("SELECT * FROM an_classified c LEFT JOIN an_class_images i  ON  c.class_id = i.img_class_id  WHERE c.class_user_id = ".$id);
		return $query->result();
	}
	
	public function deleteAnuncio($id){
		//Borrar imagen y registro de todas las imagenes. 
		
		//Leer Imagenes.
		$query = $this->db->query("SELECT * FROM an_class_images  WHERE img_class_id = ".$id);
		$data = $query->row();
		$ruta = $_SERVER['DOCUMENT_ROOT']."/anuncios/public/uploads/";
		$count = 0;
		
		if($query->num_rows() > 0){
			//echo 'rows='. $query->num_rows() .'<br />';
			//If is over 0 delete images and record.
			foreach($data as $d){
				//Delete imagenes.
				$path= $ruta.$d->img_route;
				if(unlink($path))
					$count = $count + 1; 
					//echo $count .'<br />';
					 				
			}
			
			if($count > 0){
				$this->db->delete('an_class_images', array('class_img_id' => $id));
				$this->db->delete('an_classified', array('class_id' => $id));
				return true;
				
			}else{
				return false;
			}
		
		}else{
			//echo 'NO rows '.$id.'<br />';
			//If isnt, just delete classified
			 $this->db->delete('an_classified', array('class_id' => $id));
			 return true;
		}
		       
	}
	
	// -------> PRODUCTOS POR CATEGORIA. <--------
	public function getProductList($id){
		$query = $this->db->query("SELECT * FROM an_classified c 
									LEFT JOIN an_class_images i  ON  c.class_id = i.img_class_id  
									LEFT JOIN an_subcategory s ON c.class_category = s.subc_id
									LEFT JOIN an_categories cat ON s.subc_id_cat = cat.cat_id
									LEFT JOIN an_cities ci ON c.class_id_city = ci.city_id
									WHERE c.class_category = ".$id);
		return $query->result();
		
	}
	
	public function getSubcategorieName($id){
		$query = $this->db->query("SELECT * FROM an_subcategory WHERE subc_id = $id LIMIT 1");
		
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->subc_description;
		}
	}
	
	public function getTotalResultList($id){
		$query = $this->db->query("SELECT * FROM an_classified WHERE class_category = $id");
		
		if ($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return 0;
		}
	}
	
	
	/*
	public function activeEmpresa($login){
		//BUSCO SI LA EMPRESA A LA QUE PERTENECE EL USUARIO ESTA ACTIVA.
		$query = $this->db->query("SELECT c.comp_activate
								   FROM gl_users u LEFT JOIN  gl_company c ON u.user_idcompany = c.comp_id
								   WHERE u.user_nickname = '$login'
								   AND '".date('Y-m-d')."' BETWEEN c.comp_planstart AND  c.comp_planexpire LIMIT 1");
		
		if ($query->num_rows() > 0){
			 $row = $query->row(); 
			 if($row->comp_activate == 1){
			 	return true;
			 }else{
			 	return false;
			 }
		}else{
			return false;
		}
	}
	
	public function login_active(){
		if ($this->session->userdata('login_state') == FALSE ){
			redirect('login', 'refresh');
			return true;
		}
	}
	
	// CHANGE PASSWORD WITH LOGIN ON.
	 
	public function checkPassword($pass, $id){
		$query = $this->db->query("SELECT *
								   FROM gl_users
								   WHERE user_password = '$pass'
								   AND user_id = $id");
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function changePassword($datos=array() , $id){		
		$this->db->where('user_id', $id);
        $this->db->update('gl_users', $datos); 
        return true; 
	}
	
	
	// GET MENUS
	public function getMenu($type_id){
		$query = $this->db->query("SELECT * FROM gl_menu_to_usertype mt 
									LEFT JOIN gl_menu m ON mt.menu_id = m.menu_id 
									WHERE utype_id = $type_id
									ORDER BY menu_order ASC");
		return $query->result();
	}
	
	public function getIconActive($controler){
		$query = $this->db->query("SELECT * FROM gl_menu WHERE menu_name = '$controler'");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->menu_icon;
		}
	}
	
	public function getCompanyName($id_company){
		$query = $this->db->query("SELECT * FROM gl_company WHERE comp_id = $id_company LIMIT 1");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->comp_name;
		}
	}
	
	public function getTypeUser($id){
		$query = $this->db->query("SELECT * FROM gl_user_type WHERE utype_id = $id");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->utype_description;
		}
	}
		
	public function getCountries(){
		$query = $this->db->query("SELECT * FROM gl_country WHERE country_lang = 1 AND country_active = 1");
		return $query->result();
	}
	
	// -------> DASHBOARD MODULE (PRINCIPAL PAGE INDEX) <--------
	
	
	public function getTotalCompanies(){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_company");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getStatusCompanies($num){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_company WHERE comp_activate = $num");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getCompaniesToExpire(){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_company WHERE comp_activate = 1 AND SUBSTRING( comp_planexpire, 1, 7 ) = '".date('Y-m')."'");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getTotalGuestlist($id){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getGuestlistExpire($id){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id AND glist_event < '".date('Y-m-d')."'");
		//$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id AND SUBSTRING( glist_event, 1, 7 ) = '".date('Y-m')."'");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getGuestlistActive($id){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id AND glist_event > '".date('Y-m-d')."'");
		//$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id AND SUBSTRING( glist_event, 1, 7 ) = '".date('Y-m')."'");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	public function getDeactivateGuestlist($id){
		$query = $this->db->query("SELECT COUNT(*) AS total FROM gl_guestlist WHERE glist_compid = $id AND glist_status = 0");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->total;
		}
	}
	
	
	//
	// -------> COMPANY METHODS <--------
	
	
	public function getCompanies(){
		$query = $this->db->query("SELECT * FROM gl_company");
		return $query->result();
	}
	
	public function addCompany($array=array()){
		$this->db->insert("gl_company",$array);
        return true;
	}
	
	public function editCompany($datos=array() ,$id){    
        $this->db->where('comp_id', $id);
        $this->db->update('gl_company', $datos); 
        return true;       
    }
	
	public function deleteCompany($id){
		//Also delete, guestlist, and guestlist's invite
		
		$this->db->delete('gl_company', array('comp_id' => $id));
        return true;
	}
	
	public function DeactivateCompany($datos=array() ,$id){
		$this->db->where('comp_id', $id);
        $this->db->update('gl_company', $datos); 
        return true;
	}
	
	public function ActivateCompany($datos=array() ,$id){
		$this->db->where('comp_id', $id);
        $this->db->update('gl_company', $datos); 
        return true;
	}
	
	public function getCompanyId($id){
		$query = $this->db->query("SELECT * FROM gl_company WHERE comp_id = $id");
		return $query->row();
	}
	
	
	//
	// -------> GUESTLIST METHODS <--------
	
	public function getGuestlist($id){
		$query = $this->db->query("SELECT * FROM gl_guestlist WHERE glist_compid = $id");
		return $query->result();
	}
	
	public function addGuestlist($array=array()){
		$this->db->insert("gl_guestlist",$array);
        return true;
	}
	
	public function getGuestlistId($id){
		$query = $this->db->query("SELECT * FROM gl_guestlist WHERE glist_id = $id");
		return $query->row();
	}
	
	public function editGuestlist($datos=array() ,$id){    
        $this->db->where('glist_id', $id);
        $this->db->update('gl_guestlist', $datos); 
        return true;       
    }
	
	public function deactivateGuestlist($datos=array() ,$id){
		$this->db->where('glist_id', $id);
        $this->db->update('gl_guestlist', $datos); 
        return true;
	}
	
	public function activateGuestlist($datos=array() ,$id){
		$this->db->where('glist_id', $id);
        $this->db->update('gl_guestlist', $datos); 
		return true;
	}
       
	public function deleteGuestlist($id){
		//Also delete, guestlist's invites
		
		$this->db->delete('gl_guestlist', array('glist_id' => $id));
        return true;
	}
	
	
	//
	// -------> GUESTLIST'S INVITES METHODS <--------
	
	public function getGuestlistByid($id){
		$query = $this->db->query("SELECT * FROM gl_guestlist WHERE glist_compid = $id");
		return $query->result();
	}
	
	public function changeGuestlist($id){
		$query = $this->db->query("SELECT * FROM gl_guestlist WHERE glist_id = $id");
		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row->glist_name;
		}
	}
	
	public function getInvitesId($id){
		$query = $this->db->query("SELECT * FROM gl_guest WHERE guest_listid = $id");
		return $query->result();
	}
	
	
	public function addInvites($array=array()){
		$this->db->insert("gl_guest",$array);
        return true;
	}
	
	public function editInvites($datos=array() ,$id){    
        $this->db->where('guest_id', $id);
        $this->db->update('gl_guest', $datos); 
        return true;       
    }
	
	public function getInviteId($id){
		$query = $this->db->query("SELECT * FROM gl_guest WHERE guest_id = $id");
		return $query->row();
	}
	
	public function deleteGuest($id){
		$this->db->delete('gl_guest', array('guest_id' => $id));
        return true;
	}
	
	public function deleteGuestAll($id){
		$this->db->delete('gl_guest', array('guest_listid' => $id));
        return true;
		
	}
	
	public function updateGuest($guestlist, $guest_name, $guest_lastname, $guest_email, $guest_phone, $guest_note){
		$this->db->set('guest_listid', $guestlist);
		$this->db->set('guest_name', $guest_name);
		$this->db->set('guest_lastname', $guest_lastname);
		$this->db->set('guest_email', $guest_email);
		$this->db->set('guest_phone', $guest_phone);
		$this->db->set('guest_note', $guest_note);
		$this->db->insert('gl_guest');
		
		return true;
	}
	
	public function deactivateInvite($datos=array() ,$id){
		$this->db->where('guest_id', $id);
        $this->db->update('gl_guest', $datos); 
        return true;
	}
	
	public function activateInvite($datos=array() ,$id){
		$this->db->where('guest_id', $id);
        $this->db->update('gl_guest', $datos); 
		return true;
	}
	
	
	//
	// -------> USERS METHODS <--------
	
	public function getUsersCompany($id){
		$query = $this->db->query("SELECT * FROM gl_users u LEFT JOIN gl_user_type t ON u.user_id_tipuser = t.utype_id WHERE u.user_idcompany = $id");
		return $query->result();
	}
	
	public function DeactivateUser($datos=array() ,$id){
		$this->db->where('user_id', $id);
        $this->db->update('gl_users', $datos); 
        return true;
	}
	
	public function ActivateUser($datos=array() ,$id){
		$this->db->where('user_id', $id);
        $this->db->update('gl_users', $datos); 
		return true;
	}
	
	public function getTypeUsers(){
		$query = $this->db->query("SELECT * FROM gl_user_type WHERE utype_id != 1");
		return $query->result();
	}
	
	public function addUser($array=array()){
		$this->db->insert("gl_users",$array);
        return true;
	}
	
	public function users_exists($key){

		$this->db->where('user_nickname',$key);
		$query = $this->db->get('gl_users');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	*/
}