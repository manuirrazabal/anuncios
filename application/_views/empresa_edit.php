 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-gears"></i>Editar Empresa<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('empresa'); ?>">Volver</a></li>
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
     	$atributos = array('class' => 'form-horizontal', 'id' => 'form_empresa', 'name' => 'form_empresa');
		echo form_open_multipart(null, $atributos);
		echo form_fieldset();
		echo validation_errors();
	 ?>

<!-- Form components 
<form class="form-horizontal" role="form" action="#">-->
	<div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Form elements</h6></div>
        <div class="panel-body">
           <input type="hidden" name="id_empresa" value="<?php echo $id; ?>" />
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Rut: </label>
                <div class="col-sm-4"><input type="text" class="form-control" name="empresa_rut" readonly="readonly" value="<?php echo  seteaRut($info_company->comp_rut); ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre: </label>
                <div class="col-sm-10"><input type="text" class="form-control"  name="empresa_nombre" value="<?php echo  $info_company->comp_name; ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Direccion: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="empresa_direccion" value="<?php echo  $info_company->comp_address; ?>" /></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Codigo Postal: </label>
                <div class="col-sm-10"><input type="text" class="form-control" name="empresa_cpostal" value="<?php echo  $info_company->comp_postalcode; ?>" /></div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Pais: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Seleccione un Pais..." class="select-search" name="empresa_pais" id="empresa_pais" tabindex="2" onchange="cargaregiones('<?php echo base_url('empresa')."/getregiones"; ?>')">
                        <option value=""></option>  
                        <?php foreach($countries as $c){ ?>
							<option value="<?php echo $c->country_id; ?>" <?php if($info_company->state_idcountry == $c->country_id){ echo 'selected="selected"'; }?>><?php echo $c->country_name; ?></option>
						<?php }?>                        
                    </select>
                </div>
            </div>
            
            <div class="form-group" id="loadregiones">
            	<label class="col-sm-2 control-label">Region: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Seleccione una Region..." class="select-search" name="empresa_state" id="empresa_state" tabindex="2" onchange="cargacomunas('<?php echo base_url('empresa')."/getcomunas"; ?>')">
                        <option value=""></option>  
                        <?php foreach($regiones as $r){ ?>
                            <option value="<?php echo $r->state_id; ?>" <?php if($info_company->state_id == $r->state_id){ echo 'selected="selected"'; }?>><?php echo $r->state_description; ?></option>
                        <?php }?>                        
                    </select>
                </div>
            </div>
            
            <div class="form-group" id="loadcomunas">
            	<label class="col-sm-2 control-label">Comuna: </label>
                <div class="col-sm-10">
                    <select data-placeholder="Seleccione una Comuna..." class="select-search" name="empresa_city" id="empresa_city" tabindex="2">
                        <option value=""></option>  
                        <?php foreach($comunas as $co){ ?>
                            <option value="<?php echo $co->city_id; ?>" <?php if($info_company->comp_city == $co->city_id){ echo 'selected="selected"'; }?>><?php echo $co->city_description; ?></option>
                        <?php }?>                        
                    </select>
                </div>

            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Inicio Plan: </label>
                <div class="col-sm-10">
                	<input type="datetime" class="form-control" name="empresa_creation" value="<?php echo returnDateBd($info_company->comp_planstart); ?>" data-mask="99/99/9999" />
                    <span class="help-block">DD/MM/YYYY</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Fin Plan: </label>
                <div class="col-sm-10">
                	<input type="datetime" class="form-control" name="empresa_endplan" value="<?php echo returnDateBd($info_company->comp_planexpire); ?>" data-mask="99/99/9999" />
                    <span class="help-block">DD/MM/YYYY</span>
               	</div>
            </div>
            
            <div class="form-actions text-right">
                <input type="submit" value="Editar" class="btn btn-primary">
            </div>
        </div>
    </div>
<!--</form>-->

<?php
        echo form_fieldset_close();
        echo form_close();
    ?>