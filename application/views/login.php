



<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="content">
                    <div class="row">
                        
                        <div class="col-sm-6">
                        	<div class="p30 mb30 background-white">
                            <div class="page-title">
                                <h1>Iniciar Sesion</h1>
                            </div><!-- /.page-title -->
							<?php 
								if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
									<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
							<?php 
								}
							?>
							
							
							<?php 
                                echo validation_errors();
                                $atributos = array('class' => 'mainForm', 'id' => 'valid', 'name' => 'form');
                                echo form_open(null, $atributos);
                                echo form_fieldset();
                            ?>
                                <div class="form-group">
                                	<label for="login-form-email">Email</label>
                                    <?php echo form_input(array('name' => 'login', 'id' => 'login', 'class' => 'form-control')); ?>
                                    
                                </div><!-- /.form-group -->
                    
                                <div class="form-group">
                                    <label for="login-form-password">Contrase&ntilde;a</label>
                                    <?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control')); ?>
                                </div><!-- /.form-group -->
                    
                                <button type="submit" class="btn btn-primary pull-right">Iniciar</button>
                            </form>
                            
                            </div>	
                        </div><!-- /.col-sm-6 -->
                        
                        <div class="col-sm-6">
                            <div class="p30 mb30 background-white">
                            	<form class="mainForm">
                                <fieldset>
                                <div class="page-title">
                                    <h1>Registrarse</h1>
                                </div><!-- /.page-title -->
                                <p>Si no tienes una cuenta en nuestro sitio favor registrate aqui.</p>
                               
                                <br />
                                <button type="button" class="btn btn-primary pull-right" onclick="link_registro('<?php echo base_url();?>registro')">Registrarme</button>
                                </fieldset>
                                </form>
                            </div>
                        </div><!-- /.col-6 -->
                        
                    </div><!-- /.row -->

            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->
