
<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    <div class="row">
                    	 <div class="col-sm-8">
                        	<div class="background-white p20 mb50">
                                <div class="page-title">
                                    <h1>Mi informaci&oacute;n</h1>
                                </div><!-- /.page-title -->
                                
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                           
                           
                               <div class="alert alert-icon alert-info" role="alert">
                                    <strong>Informaci&oacute;n importante.</strong> Por su seguridad e integridad de su informacion personal no es posible cambiar sus datos a tarves del sitio. Favor enviar un correo electronico solicitando los cambios y nos contactaremos en la brevedad posible.
                                </div>
                                
                                <table class="table mb0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Rut</th>
                                            <td><?php echo $user->user_rut; ?></td>
                                        </tr>	
                                        <tr>
                                            <th scope="row">Nombre</th>
                                            <td><?php echo $user->user_name; ?></td>
                                        </tr>
                        
                                        <tr>
                                            <th scope="row">Apellido</th>
                                            <td><?php echo $user->user_lastname; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><?php echo $user->user_email; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <br /><br /><br />
                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index'"><i class="fa fa-paper-plane"></i>VOLVER</button>

                            </div><!-- /.col-sm-4 -->
                            
                            
                     	</div>
                    </div><!-- /.row -->

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->