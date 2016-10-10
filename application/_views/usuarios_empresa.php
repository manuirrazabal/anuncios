 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-users"></i>Administracion de Usuarios <small>Dar autorizaci&oacute;n para poder administrar empresas</small></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('usuarios'); ?>">Volver</a></li>
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
     	$atributos = array('class' => 'form-horizontal', 'id' => 'form_usuario', 'name' => 'form_usuario');
		echo form_open_multipart(null, $atributos);
		echo form_fieldset();
		echo validation_errors();
	 ?>

	<div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Usuarios a Empresa</h6></div>
        <div class="panel-body">
			
             <div class="form-group">
                <label class="col-sm-2 control-label">Usuario: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Selecciona un usuario..." class="select-search select-full" name="select_user" id="select_user" tabindex="2" onchange="cargarusempresa('getempresasuser')">
                        <option value=""></option> 
                        <?php foreach($usersList as $u){ ?>
                        	<option value="<?php echo $u->user_id; ?>" ><?php echo $u->user_name .' '. $u->user_lastname .' ('. $u->utype_description.')'; ?></option>
                        <?php }?> 
                    </select>
                </div>
            </div>
            
            <div class="form-group" id="empresas_usuario">
            </div>

            
            <div class="form-actions text-right">
                <input type="submit" value="Agregar" class="btn btn-primary">
            </div>
        </div>
    </div>

<?php
        echo form_fieldset_close();
        echo form_close();
    ?>