
<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    <div class="row">
                        	<div class="background-white p20 mb50">
                                <div class="page-title">
                                    <h1>Publica tu anuncio</h1>
                                </div><!-- /.page-title -->
                                
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                                
                                <?php
									$atributos = array('id' => 'form_registro', 'name' => 'form_registro');
									echo form_open_multipart(null, $atributos);
									echo form_fieldset();
									echo validation_errors();
								 ?>

									 <div class="form-group">
                                        <label for="">Categoria <span class="required">*</span></label>
                                        <select class="form-control" title="Select Option" name="categories" id="categories" onchange="cargasubcategoria('publicar/getsubcategories')">
                                             <?php foreach($categories as $c){ ?>
                                                <option value="<?php echo $c->cat_id; ?>"><?php echo $c->cat_description; ?></option>
                                            <?php
                                            }
                                            ?> 
                                        </select>
                                    </div><!-- /.form-group -->
                                    
                                    <div class="form-group" id="loadsubcategories"></div>
									
                                    <div class="form-group">
                                        <label for="login-form-titulo">Titulo <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="class_title" id="login-form-titulo" value="<?php echo  set_value("class_title"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-first-descripcion">Descripcion <span class="required">*</span></label>
                                        <textarea class="form-control" rows="5" id="class_description" name="class_description" placeholder=""><?php echo  set_value("class_description"); ?></textarea>
                                    </div><!-- /.form-group -->
                                    
                                    <div class="form-group">
                                        <label for="">Comuna <span class="required">*</span></label>
                                        <select class="form-control" title="Select Opcion" name="class_comuna" id="class_comuna" >
                                             <?php foreach($comunas as $x){ ?>
                                                <option value="<?php echo $x->city_id; ?>"><?php echo $x->city_description; ?></option>
                                            <?php
                                            }
                                            ?> 
                                        </select>
                                    </div><!-- /.form-group -->
                                    
                                     <div class="form-group">
                                        <label for="login-form-direccion">Direccion</label>
                                        <input type="text" class="form-control" name="class_address" id="login-form-direccion" value="<?php echo  set_value("class_address"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <button type="submit" class="btn btn-primary pull-right">Siguiente</button>
                                
								<?php
									echo form_fieldset_close();
									echo form_close();
								?>
                            </div><!-- /.col-sm-4 -->
                    </div><!-- /.row -->

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->