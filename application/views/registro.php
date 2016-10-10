
<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    <div class="row">
                        	<div class="background-white p20 mb50">
                                <div class="page-title">
                                    <h1>Registro</h1>
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
                                        <label for="login-form-rut">Rut</label>
                                        <input type="text" class="form-control" name="user_rut" id="login-form-rut" value="<?php echo  set_value("user_rut"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-first-name">Nombre</label>
                                        <input type="text" class="form-control" name="user_name" id="login-form-first-name" value="<?php echo  set_value("user_name"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-last-name">Apellido(s)</label>
                                        <input type="text" class="form-control" name="user_lastname" id="login-form-last-name" value="<?php echo  set_value("user_lastname"); ?>">
                                    </div><!-- /.form-group -->
                                    
                                    <div class="form-group">
                                        <label for="login-form-email">E-mail</label>
                                        <input type="email" class="form-control" name="user_email" id="login-form-email" value="<?php echo  set_value("user_email"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-password">Contrase&ntilde;a</label>
                                        <input type="password" class="form-control" name="user_password" id="login-form-password" value="<?php echo  set_value("user_password"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <div class="form-group">
                                        <label for="login-form-password-retype">Repetir Contrase&ntilde;a</label>
                                        <input type="password" class="form-control" name="user_password2" id="login-form-password-retype" value="<?php echo  set_value("user_password2"); ?>">
                                    </div><!-- /.form-group -->
                        
                                    <button type="submit" class="btn btn-primary pull-right">Registrarme</button>
                                
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