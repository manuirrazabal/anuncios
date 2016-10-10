    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="hidden-lg pull-right">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-right">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-chevron-down"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- /navbar -->


    <!-- Page container -->
    <div class="page-container container-fluid">
    
        <!-- Page content -->
        <div class="page-content">
            <!-- Login wrapper -->
            <div class="login-wrapper">
            
            	 <?php 
					echo validation_errors();
					$atributos = array('class' => 'mainForm', 'id' => 'valid', 'name' => 'form');
					echo form_open(null, $atributos);
					echo form_fieldset();
				?>
                

                    <div class="panel panel-default">
                        <div class="panel-heading"><h6 class="panel-title"><i class="fa fa-user"></i> Iniciar Sesion</h6></div>
                        <div class="panel-body">
                            <div class="form-group has-feedback">
                                <label>Usuario</label>                                
                                <?php echo form_input(array('name' => 'login', 'id' => 'login', 'class' => 'form-control', 'placeholder' => 'Usuario')); ?>
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>

                            <div class="form-group has-feedback">
                                <label>Contrase&ntilde;a</label>
                                <?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Contrase&ntilde;a')); ?>
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>

                            <div class="row form-actions">
                                <div class="col-xs-6">
                                    <!--<div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="styled">
                                        Remember me
                                    </label>
                                    </div>-->
                                </div>

                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-warning pull-right">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
					echo form_fieldset_close();
					echo form_close();
				?>
            </div>  
            <!-- /login wrapper -->      

        
        </div>
        <!-- /page content -->

    </div>
    <!-- page container -->