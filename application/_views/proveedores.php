 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-truck"></i>Proveedores<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('proveedores/add'); ?>">Agregar Nueva</a></li>
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
    <div class="panel-heading"><h6 class="panel-title">Listado de Proveedores</h6></div>
    <div class="datatable">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Comuna</th>
                    <th>Fono</th>
                    <th>Correo</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
		<?php
            foreach($providersList as $p){	?>
                <tr>
                    <td><?php echo seteaRut($p->provi_rut);?></td>
                    <td><?php echo $p->provi_name;?></td>
                    <td><?php echo $p->city_description;?></td>
                    <td><?php echo $p->provi_phone;?></td>
                    <td><?php echo $p->provi_email;?></td>
                    <td align="center">
                    	<a href="<?php echo base_url()?>proveedores/edit/<?php echo $p->provi_id; ?>" title="Editar Proveedor"><i class="fa fa-file-o"></i></a>
                        
                    </td>
                </tr>            
        <?php	
            }
        ?>               
            </tbody>
        </table>
    </div>
</div>