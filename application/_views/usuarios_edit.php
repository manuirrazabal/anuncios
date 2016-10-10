 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-users"></i>Editar Usuario<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('usuarios'); ?>">Volver</a></li>
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
     	$atributos = array('class' => 'form-horizontal', 'id' => 'form_usuario', 'name' => 'form_usuario');
		echo form_open_multipart(null, $atributos);
		echo form_fieldset();
		echo validation_errors();
	 ?>

<!-- Form components 
<form class="form-horizontal" role="form" action="#">-->
	<div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Usuario</h6></div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Rut: </label>
                <div class="col-sm-4"><input type="text" class="form-control" name="user_rut" readonly="readonly" value="<?php echo  seteaRut($user_data->user_rut); ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Usuario: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="user_nickname" readonly="readonly" value="<?php echo  $user_data->user_nickname; ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre: </label>
                <div class="col-sm-10"><input type="text" class="form-control"  name="user_name" value="<?php echo  $user_data->user_name; ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos: </label>
                <div class="col-sm-10"><input type="text" class="form-control"  name="user_lastname" value="<?php echo  $user_data->user_lastname; ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="user_email" value="<?php echo  $user_data->user_email; ?>" /></div>
            </div>
                        
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Contrase&ntilde;a: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="user_password" value="<?php echo  set_value("user_password"); ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Repetir Contrase&ntilde;a: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="user_password2" value="<?php echo  set_value("user_password2"); ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Usuario: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Seleccione un Usuario..." class="select-search" name="user_typeuser" tabindex="2" >
                        <option value=""></option>  
                        <?php foreach($type_user as $t){ ?>
							<option value="<?php echo $t->utype_id; ?>" <?php if($t->utype_id == $user_data->user_id_tipuser){ echo 'selected="selected"'; }?>><?php echo $t->utype_description; ?></option>
						<?php }?>                        
                    </select>
                </div>
            </div>
            
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