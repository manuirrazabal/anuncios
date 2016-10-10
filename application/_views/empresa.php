 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-gears"></i>Empresa<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('empresa/add'); ?>">Agregar Nueva</a></li>
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
    <div class="panel-heading"><h6 class="panel-title">Listado de Empresas</h6></div>
    <div class="datatable">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Inicio Plan</th>
                    <th>Fin Plan</th>
                    <th >Estado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
		<?php
            foreach($company_list as $c){	?>
                <tr>
                    <td><?php echo seteaRut($c->comp_rut);?></td>
                    <td><?php echo $c->comp_name;?></td>
                    <td><?php echo returnDateBd($c->comp_planstart);?></td>
                    <td><?php echo returnDateBd($c->comp_planexpire);?></td>
                    <td>
						<?php if($c->comp_state == 1){	?>
                    				<a href="javascript:void(0);" onclick="desactivar_empresa('<?php echo base_url();?>empresa/desactivar/<?php echo $c->comp_id; ?>')"><i class="fa fa-check" style="color: #00FF00;"></i></a>
						<?php }else{ ?>
                        			<a href="javascript:void(0);" onclick="activar_empresa('<?php echo base_url();?>empresa/activar/<?php echo $c->comp_id; ?>')"><i class="fa fa-times" style="color: #FF0000;"></i></a>
                        <?php } ?>
                    </td>
                    <td align="center">
                    	<a href="<?php echo base_url()?>empresa/edit/<?php echo $c->comp_id; ?>" title="Editar Empresa"><i class="fa fa-file-o"></i></a>
                    </td>
                </tr>            
        <?php	
            }
        ?>               
            </tbody>
        </table>
    </div>
</div>