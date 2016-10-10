
<div class="main">
	<div class="main-inner">
            <div class="container">
                <div class="content">                                            
                    <div class="row">
                    	<div class="col-sm-12">
                        	<div class="background-white p30 mb50">
                                <div class="page-title">
                                    <h2>Mis Anuncios Editar</h2>
                                </div><!-- /.page-title -->
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                                
                                <?php
									$atributos = array('id' => 'form_anuncios', 'name' => 'form_anuncios');
									echo form_open_multipart(null, $atributos);
									echo form_fieldset();
									echo validation_errors();
									
									
								 ?>

                                    <div class="form-group">
                                        <label for="">Categoria <span class="required">*</span></label>
                                        <select class="form-control" title="Select Option" name="categories" id="categories" onchange="cargasubcategoria('../getsubcategories')">
                                             <?php foreach($categories as $c){ ?>
                                                <option value="<?php echo $c->cat_id; ?>" <?php if($c->cat_id == $anuncioData->subc_id_cat){echo 'selected="selected"';} ?> ><?php echo $c->cat_description; ?></option>
                                            <?php
                                            }
                                            ?> 
                                        </select>
                                    </div><!-- /.form-group -->
                                    
                                    <div class="form-group" id="loadsubcategories">
                                    	<label for="">Subcategoria <span class="required">*</span></label>
                                        <select class="form-control" title="Select Opcion" name="subcategories" id="subcategories">
                                             <?php foreach($subcategories as $s){ ?>
                                                <option value="<?php echo $s->subc_id; ?>" <?php if($s->subc_id == $anuncioData->class_category){echo 'selected="selected"';} ?> ><?php echo  $s->subc_description; ?></option>
                                            <?php
                                            }
                                            ?> 
                                        </select>
                                    </div>
									
                                    <div class="form-group">
                                        <label for="login-form-titulo">Titulo <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="class_title" id="login-form-titulo" value="<?php echo  $anuncioData->class_title; ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-first-descripcion">Descripcion <span class="required">*</span></label>
                                        <textarea class="form-control" rows="5" id="class_description" name="class_description" placeholder=""><?php echo  $anuncioData->class_description; ?></textarea>
                                    </div><!-- /.form-group -->
                                    
                                    <div class="form-group">
                                        <label for="">Comuna <span class="required">*</span></label>
                                        <select class="form-control" title="Select Opcion" name="class_comuna" id="class_comuna" >
                                             <?php foreach($comunas as $x){ ?>
                                                <option value="<?php echo $x->city_id; ?>" <?php if($x->city_id == $anuncioData->class_id_city){echo 'selected="selected"';} ?>><?php echo $x->city_description; ?></option>
                                            <?php
                                            }
                                            ?> 
                                        </select>
                                    </div><!-- /.form-group -->
                                    
                                     <div class="form-group">
                                        <label for="login-form-direccion">Direccion</label>
                                        <input type="text" class="form-control" name="class_address" id="login-form-direccion" value="<?php echo  $anuncioData->class_address; ?>">
                                    </div><!-- /.form-group -->
                        
                                    <button type="submit" class="btn btn-primary pull-right">Siguiente</button>
                                
								<?php
									echo form_fieldset_close();
									echo form_close();
								?>
                    		</div><!-- background-white p30 mb50 -->
                    	</div><!-- /.col-* -->
                    </div><!-- /.row -->
                    
                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->