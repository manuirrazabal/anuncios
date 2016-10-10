 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-users"></i>Cambiar mi Contrase&ntilde;a<!--<small>Default, bordered, striped and custom.</small>--></h5>
</div>
<!-- /page title -->

<?php 
	if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
		<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
	}
?>



<?php
     	$atributos = array('class' => 'form-horizontal', 'id' => 'form_password', 'name' => 'form_password');
		echo form_open_multipart(null, $atributos);
		echo form_fieldset();
		echo validation_errors();
	 ?>

<!-- Form components 
<form class="form-horizontal" role="form" action="#">-->
	<div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Contrase&ntilde;a</h6></div>
        <div class="panel-body">            
            <div class="form-group">
                <label class="col-sm-2 control-label">Contrase&ntilde;a Actual: </label>
                <div class="col-sm-10"><input type="password" class="form-control" name="old_password" value="<?php echo  set_value("old_password"); ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nueva Contrase&ntilde;a: </label>
                <div class="col-sm-10"><input type="password" class="form-control" name="new_password" value="<?php echo  set_value("new_password"); ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Repetir Nueva Contrase&ntilde;a: </label>
                <div class="col-sm-10"><input type="password" class="form-control" name="new_password2" value="<?php echo  set_value("new_password2"); ?>" /></div>
            </div>
            
            
            <div class="form-actions text-right">
                <input type="submit" value="Cambiar" class="btn btn-primary">
            </div>
        </div>
    </div>
<!--</form>-->

<?php
        echo form_fieldset_close();
        echo form_close();
    ?>