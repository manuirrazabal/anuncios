 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa  fa-backward"></i>Nuevo Egreso<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('egresos'); ?>">Volver</a></li>
            <!--<li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">One more line</a></li>-->
        </ul>
    </div>
</div>
<!-- /page title -->
<?php
if(count($providersList) == 0){
	?>
	<div class="alert alert-danger fade in widget-inner">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<i class="fa fa-times"></i>Lo sentimos. Para poder crear un egreso necesitas tener al menos un proveedor creado. Ir a <a href="<?php echo base_url('proveedores'); ?>">Proveedores</a>
	</div>
	<?php 
}else{



 
		if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
			<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	<?php 
		}
	?>
	
	
	
	<?php
			$atributos = array('class' => 'form-horizontal', 'id' => 'form_egreso', 'name' => 'form_egreso');
			echo form_open_multipart(null, $atributos);
			echo form_fieldset();
			echo validation_errors();
		 ?>
	
	<!-- Form components 
	<form class="form-horizontal" role="form" action="#">-->
		<div class="panel panel-default">
			<div class="panel-heading"><h6 class="panel-title">Nuevo Egreso</h6></div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Proveedor: </label>
					<div class="col-sm-10">
						<select data-placeholder="Seleccione un Proveedor..." class="select-search select-full" name="expen_provider" tabindex="2" >
							<option value=""></option>  
							<?php foreach($providersList as $p){ ?>
								<option value="<?php echo $p->provi_id; ?>"><?php echo $p->provi_name; ?></option>
							<?php }?>                        
						</select>
					</div>
				</div>
                                
                <div class="form-group">
					<label class="col-sm-2 control-label">Tipo de Egreso: </label>
					<div class="col-sm-4">
						<select data-placeholder="Tipo de Egreso..." class="select" name="expen_type" tabindex="2" >
							<option value=""></option>  
							<?php foreach($expensesType as $t){ ?>
								<option value="<?php echo $t->expentype_id; ?>"><?php echo $t->expentype_description; ?></option>
							<?php }?>                        
						</select>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">N&deg; Documento: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="expen_number" value="<?php echo  set_value("expen_number"); ?>" /></div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha: </label>
					<div class="col-sm-4">
                    	<input type="datetime" class="form-control"  name="expen_date" value="<?php echo  set_value("expen_date"); ?>" data-mask="99/99/9999" />
                        <span class="help-block">DD/MM/YYYY</span>
                    </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Detalle: </label>
					<div class="col-sm-10"><input type="text" class="form-control"  name="expen_detail" value="<?php echo  set_value("expen_detail"); ?>" /></div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label">Exento: </label>
					<div class="col-sm-10"><div class="checkbox"><input type="checkbox" class="styled" name="expen_exempt" id="expen_exempt" onclick="check_egresos()"></div></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Neto: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="expen_subtotal" id="expen_subtotal" value="<?php echo  set_value("expen_subtotal"); ?>" /></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">IVA: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="expen_iva" id="expen_iva" value="<?php echo  set_value("expen_iva"); ?>" /></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Total: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="expen_total" id="expen_total" value="<?php echo  set_value("expen_total"); ?>" onchange="calcula_valor()"/></div>
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
			
}
        ?>