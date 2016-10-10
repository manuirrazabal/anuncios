<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="content">
                <div class="col-sm-12">
                    <div class="page-title">
                        <h1>Categorias</h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="p30 mb30 background-white">
                               <?php	
							   foreach($getCategories as $cat){	?>
								 
                                    <div class="widget">
                                        <ul class="menu">
                                            <h2 class="widgettitle"><?php echo $cat->cat_description; ?></h2>
                                             <?php	
							   					foreach($getSubcategories as $sub){	
                                                	if($sub->subc_id_cat == $cat->cat_id){	?>
                                                    	 <li><a href="<?php echo base_url('anuncioslist').'/'.encryptURL($sub->subc_id, 'anuncios'); ?>"><?php echo $sub->subc_description; ?></a></li>
                                                    
                                                     <?php 
                                                    }
							  					}
						   						?>
                                            
                                         </ul><!-- /.menu -->
                                     </div><!-- /.wifget -->
                               <?php    
							   }
						   		?>
                               
                               
                            </div>
                        </div><!-- /.col-* -->
    				</div>

				</div><!-- /.col-* -->

           	</div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->