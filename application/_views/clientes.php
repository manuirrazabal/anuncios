 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-user"></i>Clientes<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('clientes/add'); ?>">Agregar Nuevo</a></li>
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
    <div class="panel-heading"><h6 class="panel-title">Listado de Clientes</h6></div>
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
            foreach($customersList as $c){	?>
                <tr>
                    <td><?php echo seteaRut($c->cust_rut);?></td>
                    <td><?php echo $c->cust_name;?></td>
                    <td><?php echo $c->city_description;?></td>
                    <td><?php echo $c->cust_phone;?></td>
                    <td><?php echo $c->cust_email;?></td>
                    <td align="center">
                    	<a href="<?php echo base_url()?>clientes/edit/<?php echo $c->cust_id; ?>" title="Editar Cliente"><i class="fa fa-file-o"></i></a>
                        
                    </td>
                </tr>            
        <?php	
            }
        ?>               
            </tbody>
        </table>
    </div>
</div>