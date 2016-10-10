 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-users"></i>Usuarios<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('usuarios/add'); ?>">Agregar Nuevo</a></li>
            <?php 
			if($this->session->userdata('login_usertype') == 1){
				?><li><a href="<?php echo base_url('usuarios/addempresa'); ?>">Asignar Empresa</a></li><?php
			}
			
			?>
            
            <!--<li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">One more line</a></li>-->
        </ul>
    </div>
</div>
<!-- /page title -->

<?php 
	if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
		<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
	}
?>

<!-- Hover rows datatable inside panel -->
<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title">Listado de Usuarios</h6></div>
    <div class="datatable">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido(s)</th>
                    <th>Email</th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
		<?php
            foreach($users_list as $u){	?>
                <tr>
                    <td><?php echo seteaRut($u->user_rut);?></td>
                    <td><?php echo $u->user_name;?></td>
                    <td><?php echo $u->user_lastname;?></td>
                    <td><?php echo $u->user_email;?></td>
                    <td><?php echo $u->utype_description;?></td>
                    <td>
						<?php if($u->user_active == 1){	?>
                    				<a href="javascript:void(0);" onclick="desactivar_usuario('<?php echo base_url();?>usuarios/desactivar/<?php echo $u->user_id; ?>')"><i class="fa fa-check" style="color: #00FF00;"></i></a>
						<?php }else{ ?>
                        			<a href="javascript:void(0);" onclick="activar_usuario('<?php echo base_url();?>usuarios/activar/<?php echo $u->user_id; ?>')"><i class="fa fa-times" style="color: #FF0000;"></i></a>
                        <?php } ?>
                    </td>
                    <td align="center">
                    	<a href="<?php echo base_url()?>usuarios/edit/<?php echo $u->user_id; ?>" title="Editar Usuario"><i class="fa fa-file-o"></i></a>
                    </td>
                </tr>            
        <?php	
            }
        ?>               
            </tbody>
        </table>
    </div>
</div>