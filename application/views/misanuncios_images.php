
<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    <div class="row">
                        	<div class="background-white p20 mb50">
                                <div class="page-title">
                                    <h1>Modifica tu Imagen</h1>
                                </div><!-- /.page-title -->
                                
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                                
                                <?php
									$atributos = array('id' => 'form_registro_images', 'name' => 'form_registro_images');
									echo form_open_multipart(null, $atributos);
									echo form_fieldset();
									echo validation_errors();
																		
								 ?>
                                    <input type="hidden" value="<?php echo $publicacion->class_id; ?>" name="class_id" id="class_id" />
                                    <input type="hidden" value="<?php echo $id; ?>" name="id" />
                                    
                                    <div class="form-group">
                                        <label for="exampleInputFile">Subir Imagen</label>
                                        <input type="file" id="class_imagen" name="class_imagen">
                                    </div>
									
                                    
                                   	
                        
                                    
                                    <button type="button" class="btn btn-primary pull-right" onclick="window.location.href='..'" style="margin-left:5px;">No Realizar Cambios</button>
                                    <button type="submit" class="btn btn-primary pull-right">Finalizar</button>
                                
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