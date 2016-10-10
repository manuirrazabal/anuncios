 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-truck"></i>Proveedores<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('proveedores'); ?>">Volver</a></li>
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



<?php
     	$atributos = array('class' => 'form-horizontal', 'id' => 'form_proveedores', 'name' => 'form_proveedores');
		echo form_open_multipart(null, $atributos);
		echo form_fieldset();
		echo validation_errors();
	 ?>

<!-- Form components 
<form class="form-horizontal" role="form" action="#">-->
	<div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Agregar Nuevo Proveedor</h6></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Rut: </label>
                <div class="col-sm-4"><input type="text" class="form-control" name="proveedor_rut" placeholder="Ej. 12345678-9" value="<?php echo  set_value("proveedor_rut"); ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre: </label>
                <div class="col-sm-10"><input type="text" class="form-control"  name="proveedor_nombre" value="<?php echo  set_value("proveedor_nombre"); ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Direccion: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="proveedor_direccion" value="<?php echo  set_value("proveedor_direccion"); ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Fono: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="proveedor_fono" value="<?php echo  set_value("proveedor_fono"); ?>" /></div>
            </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">Email: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="proveedor_email" value="<?php echo  set_value("proveedor_email"); ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pais: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Seleccione un Pais..." class="select-search" name="empresa_pais" id="empresa_pais" tabindex="2" onchange="cargaregiones('getregiones')">
                        <option value=""></option>  
                        <?php foreach($countries as $c){ ?>
							<option value="<?php echo $c->country_id; ?>"><?php echo $c->country_name; ?></option>
						<?php }?>                        
                    </select>
                </div>
            </div>
            
            <div class="form-group" id="loadregiones"></div>
            
            <div class="form-group" id="loadcomunas"></div>
            
            <div class="form-actions text-right">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </div>
    </div>
<!--</form>-->

<?php
        echo form_fieldset_close();
        echo form_close();
    ?>