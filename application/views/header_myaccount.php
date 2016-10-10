<div class="page-wrapper">
    
    <header class="header">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="<?php echo base_url('index'); ?>">
                            <img src="<?php echo base_url();?>public/images/logo.png" alt="Logo">
                            <span>Mis Anuncios</span>
                        </a>
                    </div><!-- /.header-logo -->
    
                    <div class="header-content">
                        <div class="header-bottom">
                            <div class="header-action">
                                <a href="<?php echo base_url('publicar'); ?>" class="header-action-inner" title="Agregar Nuevo Anuncio" data-toggle="tooltip" data-placement="bottom">
                                    <i class="fa fa-plus"></i>
                                </a><!-- /.header-action-inner -->
                            </div><!-- /.header-action -->
    
                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
        						<li class="active"><a href="<?php echo base_url('index'); ?>">Inicio</a></li>
        						<!--HACER MEGA MENU DESPUES -->
                               <li>
                                	<a href="#">Categorias <i class="fa fa-chevron-down"></i></a>
                                    
                                    <ul class="sub-menu">
                                      <?php foreach($getCategories as $cat){	?>
                                       
                                        <li><a href="<?php echo base_url();?>categorias/<?php echo encryptURL($cat->cat_id,'anuncios'); ?>"><?php echo $cat->cat_description; ?></a></li>
										
                                        <?php
										}
                                        ?>
                                    </ul>                                
                                </li>
                                
                                
                                
                                
    							<?php
                                    if ($this->session->userdata('login_state') == FALSE ){ ?>
                                		<li><a href="<?php echo base_url('registro'); ?>">Registrate</a></li>
                                <?php
									}
									?>
                                <!--<li><a href="#">Admin <i class="fa fa-chevron-down"></i></a></li>-->
    
        						<li>
									<?php
                                    if ($this->session->userdata('login_state') == TRUE ){
                                        ?><a href=""><?php echo $name_user; ?><i class="fa fa-chevron-down"></i></a>
										
										<ul class="sub-menu">
                                            <li><a href="<?php echo base_url('misanuncios'); ?>">Mis Anuncios</a></li>
                                            <li><a href="<?php echo base_url('misdatos'); ?>">Mis Datos</a></li>
                                            <li><a href="<?php echo base_url('login/logout'); ?>">Cerrar Sesion</a></li>
                                        </ul>
										
										
										
										<?php
                                    }else{ 
                                        ?><a href="<?php echo base_url('login'); ?>">Ingresa</a> <?php
                                    }
                                    ?>
            
           
                                    <!--<ul class="sub-menu">
                                        <li><a href="contact-1.html">Contact v1</a></li>
                                        <li><a href="contact-2.html">Contact v2</a></li>
                                        <li><a href="contact-3.html">Contact v3</a></li>
                                    </ul>-->
                                </li>
    						</ul>
    
                           <!-- <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>-->
    
                        </div><!-- /.header-bottom -->
                    </div><!-- /.header-content -->
                </div><!-- /.header-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-wrapper -->
    </header><!-- /.header -->
