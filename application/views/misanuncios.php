
<div class="main">
	<div class="main-inner">
            <div class="container">
                <div class="content">                                            
                    <div class="row">
                    	<div class="col-sm-12">
                        	<div class="background-white p30 mb50">
                                <div class="page-title">
                                    <h1>Mis Anuncios</h1>
                                </div><!-- /.page-title -->
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                                
                                <div class="cards-system">
                                    <?php
									
                                    foreach($publicaciones as $p){	
										//Encriptar Anuncio ID. 
										$encrypyUrl = encryptURL($p->class_id, 'anuncios');
									
									?>
                                    	 <div class="card-system">
                                            <div class="card-system-inner">
                                                <?php
												if($p->img_route){	?>
                                                
                                                <div class="card-system-image" data-background-image="<?php echo 'public/uploads/'.$p->img_route; ?>">
                                                    <a href="#"></a>
                                                </div><!-- /.card-system-image -->
                                                
												<?php
												}else{	?>
                                                
                                                <div class="card-system-image" data-background-image="<?php echo 'public/images/tmp/noimagen.png'; ?>">
                                                    <a href="#"></a>
                                                </div><!-- /.card-system-image -->
                                                
                                                <?php
												}
												?>
                                                
                                                
                            
                                                <div class="card-system-content">
                                                    <h2><a href="listing-detail.html"><?php echo $p->class_title; ?></a></h2>
                                                    <h3>Posteado <?php echo $p->class_datestart; ?></h3>
                                                    <a href="<?php echo base_url()?>misanuncios/edit/<?php echo $encrypyUrl; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-xs" onclick="eliminar_anuncio('<?php echo base_url();?>misanuncios/delete/<?php echo $encrypyUrl; ?>')"><i class="fa fa-trash"></i> Eliminar</a>
                                                </div>
                                            </div>
                                        </div><!-- /.card-system -->
                                         
                                    
                                    <?php
									}
									
									?>
									
									<?php
									//EJEMPLO DE COMO LISTAR PUBLICACIONES.
									/*
                                    <div class="card-system">
                                        <div class="card-system-inner">
                                            <div class="card-system-image" data-background-image="assets/img/tmp/product-2.jpg">
                                                <a href="listing-detail.html"></a>
                                            </div><!-- /.card-system-image -->
                        
                                            <div class="card-system-content">
                                                <h2><a href="listing-detail.html">Tasty Brazil Coffee</a></h2>
                                                <h3>Posted sever hours ago</h3>
                                                <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="#" class="btn btn-secondary btn-xs">Ban</a>
                                            </div>
                                        </div>
                                    </div><!-- /.card-system -->
                            
                                    <div class="card-system">
                                        <div class="card-system-inner">
                                            <div class="card-system-image" data-background-image="assets/img/tmp/product-3.jpg">
                                                <a href="listing-detail.html"></a>
                                            </div><!-- /.card-system-image -->
                        
                                            <div class="card-system-content">
                                                <h2><a href="listing-detail.html">Healthy Breakfast</a></h2>
                                                <h3>Posted sever hours ago</h3>
                                                <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="#" class="btn btn-secondary btn-xs">Ban</a>
                                            </div>
                                        </div>
                                    </div><!-- /.card-system -->
                                
                                    <div class="card-system">
                                        <div class="card-system-inner">
                                            <div class="card-system-image" data-background-image="assets/img/tmp/product-4.jpg">
                                                <a href="listing-detail.html"></a>
                                            </div><!-- /.card-system-image -->
                        
                                            <div class="card-system-content">
                                                <h2><a href="listing-detail.html">Coffee &amp; Newspaper</a></h2>
                                                <h3>Posted sever hours ago</h3>
                                                <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="#" class="btn btn-secondary btn-xs">Ban</a>
                                            </div>
                                        </div>
                                    </div><!-- /.card-system -->
                                
                                    <div class="card-system">
                                        <div class="card-system-inner">
                                            <div class="card-system-image" data-background-image="assets/img/tmp/product-5.jpg">
                                                <a href="listing-detail.html"></a>
                                            </div><!-- /.card-system-image -->
                        
                                            <div class="card-system-content">
                                                <h2><a href="listing-detail.html">Boat Trip</a></h2>
                                                <h3>Posted sever hours ago</h3>
                                                <a href="#" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="#" class="btn btn-secondary btn-xs">Ban</a>
                                            </div>
                                        </div>
                                    </div><!-- /.card-system -->
									
									*/
									?>
                            
                        		</div><!-- /.cards-system -->
                    		</div><!-- background-white p30 mb50 -->
                    	</div><!-- /.col-* -->
                    </div><!-- /.row -->
                    
                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->