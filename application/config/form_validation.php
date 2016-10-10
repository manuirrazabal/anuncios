<?php

$config=array

(
	 
	 
	 'register'
		=> array(			
            array('field' => 'user_rut',		'label' => 'Rut Usuario',				'rules' => 'is_valid_rut|trim'),
            array('field' => 'user_name',		'label' => 'Nombre Usuario',			'rules' => 'required|is_string'),
            array('field' => 'user_lastname',	'label' => 'Apellido Usuario',			'rules' => 'required|is_string|trim'),
			array('field' => 'user_email',		'label' => 'Email Usuario',				'rules' => 'required|valid_email|trim'),
			array('field' => 'user_password',	'label' => 'Contrase&ntilde;a',			'rules' => 'required|min_length[6]|matches[user_password2]'),
			array('field' => 'user_password2',	'label' => 'Repetir Contrase&ntilde;a',	'rules' => 'required'),
		),


	'publicar'
		=> array(			
            array('field' => 'categories',			'label' => 'Categoria',		'rules' => 'required'),
            array('field' => 'subcategories',		'label' => 'Subcategoria',	'rules' => 'required'),
			array('field' => 'class_title',			'label' => 'Titulo',		'rules' => 'required'),
			array('field' => 'class_description',	'label' => 'Descripcion',	'rules' => 'required'),
			array('field' => 'class_comuna',		'label' => 'Comuna',		'rules' => 'required'),
			array('field' => 'class_address',		'label' => 'Direccion',		'rules' => 'is_string'),
		),
		
			/*

	'login'
		=> array(			
            array('field' => 'login',			'label' => 'Usuario',	'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'password',		'label' => 'Contrase&ntilde;a',	'rules' => 'required|xss_clean'),
		),
		
	'password'
		 => array(		
				array('field' => 'old_password',	'label' => 'Contrase&ntilde;a Antigua',			'rules' => 'required'),
				array('field' => 'new_password',	'label' => 'Nueva Contrase&ntilde;a',			'rules' => 'required|min_length[6]|matches[new_password2]'),
				array('field' => 'new_password2',	'label' => 'Repetir Nueva Contrase&ntilde;a',	'rules' => 'required'),
			),

	
	 // Company Form
	

	'company/add'
		=> array(			
            array('field' => 'company_name',		'label' => 'Nombre Empresa',			'rules' => 'required|is_string|trim'),
            array('field' => 'company_address',		'label' => 'Direccion',		'rules' => 'required|is_string'),
            array('field' => 'company_phone',		'label' => 'Telefono',			'rules' => 'required|numeric|trim'),
			array('field' => 'company_contact',		'label' => 'Contacto',		'rules' => 'required|is_string|trim'),
			array('field' => 'company_email',		'label' => 'Email',			'rules' => 'required|valid_email|trim'),
			array('field' => 'company_planstart',	'label' => 'Inicio Plan',		'rules' => 'required'),
			array('field' => 'company_planexpire',	'label' => 'Expiracion Plan',	'rules' => 'required'),
		),

	'company/edit'
		=> array(			
            array('field' => 'company_name',		'label' => 'Nombre Empresa',			'rules' => 'required|is_string|trim'),
            array('field' => 'company_address',		'label' => 'Direccion',		'rules' => 'required|is_string'),
            array('field' => 'company_phone',		'label' => 'Telefono',			'rules' => 'required|numeric|trim'),
			array('field' => 'company_contact',		'label' => 'Contacto',		'rules' => 'required|is_string|trim'),
			array('field' => 'company_email',		'label' => 'Email',			'rules' => 'required|valid_email|trim'),
			array('field' => 'company_planstart',	'label' => 'Inicio Plan',		'rules' => 'required'),
			array('field' => 'company_planexpire',	'label' => 'Expiracion Plan',	'rules' => 'required'),
		),
	
	
	// Guestlist Form
	 

	'guestlist/add'
		=> array(			
            array('field' => 'glist_name',		'label' => 'Nombre Lista',		'rules' => 'required|is_string'),
            array('field' => 'glist_event',		'label' => 'Fecha Evento',		'rules' => 'required'),
		),
		
	

	 // Guestlist Guest Form
	
		
	'glist_invites/add'
		=> array(			
            array('field' => 'glist_name',		'label' => 'Nombre Invitado',		'rules' => 'required|is_string'),
            array('field' => 'glist_lastname',	'label' => 'Apellido Invitado',	'rules' => 'required|is_string'),
            array('field' => 'glist_phone',		'label' => 'Telefono Invitado',		'rules' => 'trim|numeric'),
			array('field' => 'glist_email',		'label' => 'Email Invitado',		'rules' => 'trim|valid_email'),
		),
	
	
	 
	*/
); 