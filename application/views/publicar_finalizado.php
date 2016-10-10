
<div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">
                    <div class="row background-white">
                        	<div class="p20 mb50">
                                <div class="page-title">
                                    <h1>Resumen de su publicaci&oacute;n</h1>
                                </div><!-- /.page-title -->
                                
                                
								<?php 
                                    if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
                                        <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                                <?php 
                                    }
                                ?>
                                
                                <div class="col-sm-7">
                                	<div class="detail-gallery">
                                        <div class="detail-gallery-preview">
                                            <a href="#">
                                              <img src="<?php echo '../../public/uploads/'.$publicacion->img_route; ?>">
                                                  <!--<img src="<?php //echo base_url('/images/'.thumb('../../public/uploads/'.$publicacion->img_route,'200','100')); ?>"> -->
                                            </a>
                                        </div>
                                    </div>
									<!--<img src="<?php //echo base_url('/images/'.thumb('../../public/uploads/'.$publicacion->img_route,'200','100')); ?>">
                                    <img src="<?php //echo '../../public/uploads/'.$publicacion->img_route; ?>">-->
                                </div>
                                
                                <div class="col-sm-5">
                                	<h2><?php echo $publicacion->class_title; ?></h2>
									<table class="table mb0">
                                        <tbody>
                                        	<tr>
                                                <th scope="row">Categoria</th>
                                                <td><?php echo $publicacion->cat_description; ?></td>
                                            </tr>	
                                            <tr>
                                                <th scope="row">Subcategoria</th>
                                                <td><?php echo $publicacion->subc_description; ?></td>
                                            </tr>
                            
                            				<tr>
                                                <th scope="row">Regi&oacute;n</th>
                                                <td><?php echo $publicacion->state_description; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ciudad</th>
                                                <td><?php echo $publicacion->city_description; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?php echo $publicacion->class_description; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                            </div><!-- /.col-sm-4 -->
                    </div><!-- /.row -->
                    <div class="row background-white p20 mb50" align="right">
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>index'"><i class="fa fa-paper-plane"></i>Finalizar</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url();?>misanuncios'"><i class="fa fa-paper-plane"></i>Ir a Mis Anuncios</button>
                    </div>

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->