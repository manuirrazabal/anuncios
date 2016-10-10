<div class="main">
	<div class="main-inner">
        <div class="container">
            <div class="content">
                    
                <?php 
					if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
						<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
				<?php 
					}
				?>    
                    
                <div class="document-title">
                    <h1><?php echo $getSubcategorieName; ?></h1>
                </div><!-- /.document-title -->

				<?php
					if($getResultNumber > 0){	 ?>
                    	
                        <h2 class="page-title">
                            <?php  echo $getResultNumber; ?> Resultados
                            
                                <form method="get" action="?" class="filter-sort">
                                    <div class="form-group">
                                        <select title="Sort by">
                                            <option name="price">Price</option>
                                            <option name="rating">Rating</option>
                                            <option name="title">Title</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                            
                                    <div class="form-group">
                                        <select title="Order">
                                            <option name="ASC">Asc</option>
                                            <option name="DESC">Desc</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </form>
                            
                        </h2><!-- /.page-title -->
        
                        <div class="cards-row">                    
                            <?php 
							foreach($getAnuncios as $x){	?>
                            	<div class="card-row">
                                    <div class="card-row-inner">
								<?php if($x->img_route){	?>
                                        <div class="card-row-image" data-background-image="<?php echo base_url().'public/uploads/'.$x->img_route; ?>">    
                                    
                                <?php }else{	?>
                                        <div class="card-row-image" data-background-image="<?php echo base_url().'public/images/tmp/noimagen.png'; ?>">
                                   
                                <?php } ?>
                                
                                <?php
                                    
                                        /*	NO USE FOR THE MOMENT
										<div class="card-row-label"><a href="listing-detail.html">Vacation</a></div><!-- /.card-row-label -->
                                       	<div class="card-row-price">$100 / night</div><!-- -->*/
								?>
                                            
                                 	</div><!-- /.card-row-image -->
                        
                                    <div class="card-row-body">
                                        <h2 class="card-row-title"><a href="<?php echo base_url().''; ?>"><?php echo $x->class_title; ?></a></h2>
                                        <div class="card-row-content"><p><?php echo substring($x->class_description, 100); ?></p></div><!-- /.card-row-content -->
                                    </div><!-- /.card-row-body -->
                        
                                    <div class="card-row-properties">
                                        <dl>
                                            <dd>Categoria</dd><dt><?php echo $x->cat_description; ?></dt>
                                            <dd>Ciudad</dd><dt><?php echo $x->city_description; ?></dt>
                                            <dd>Publicado</dd><dt><?php echo returnDateBd($x->class_datestart); ?></dt>
                                            <?php 
                                            /*
                                            <dd>Rating</dd>
                                            <dt>
                                                <div class="card-row-rating">
                                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                </div><!-- /.card-row-rating -->
                                            </dt>
                                            */ ?>
                                        </dl>
                                    </div><!-- /.card-row-properties -->
                              	</div><!-- /.card-row-inner -->
                         	</div><!-- /.card-row -->
                          
                            <?php
							}
							?>
                        </div><!-- /.cards-row -->
        
                        <?php //echo $this->pagination->create_links(); ?>
        
                        <div class="pager">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">5</a></li>
                                <li class="active"><a>6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div><!-- /.pagination -->
                
                <?php
					}else{	?>
                    	
                        <h2 class="page-title">
                            <?php  echo $getResultNumber; ?> Resultados
                        </h2><!-- /.page-title -->
        
                        <div class="cards-row center">                    
                            <h2>No existen regristos para esta seleccion</h2>
                        </div><!-- /.cards-row -->
        
				<?php		
					}	?>


            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->













