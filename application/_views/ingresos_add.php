 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-forward"></i>Nuevo Ingreso<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('ingresos'); ?>">Volver</a></li>
            <!--<li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">One more line</a></li>-->
        </ul>
    </div>
</div>
<!-- /page title -->
<?php
if(count($customersList) == 0){
	?>
	<div class="alert alert-danger fade in widget-inner">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<i class="fa fa-times"></i>Lo sentimos. Para poder crear un ingreso necesitas tener al menos un cliente creado. Ir a <a href="<?php echo base_url('clientes'); ?>">Clientes</a>
	</div>
	<?php 
}else{



 
		if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
			<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
	<?php 
		}
	?>
	
	
	
	<?php
			$atributos = array('class' => 'form-horizontal', 'id' => 'form_ingreso', 'name' => 'form_ingreso');
			echo form_open_multipart(null, $atributos);
			echo form_fieldset();
			echo validation_errors();
		 ?>
	
	<!-- Form components 
	<form class="form-horizontal" role="form" action="#">-->
		<div class="panel panel-default">
			<div class="panel-heading"><h6 class="panel-title">Nuevo Ingreso</h6></div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Cliente: </label>
					<div class="col-sm-10">
						<select data-placeholder="Seleccione un Cliente..." class="select-search select-full" name="inco_customerid" tabindex="2" >
							<option value=""></option>  
							<?php foreach($customersList as $c){ ?>
								<option value="<?php echo $c->cust_id; ?>"><?php echo $c->cust_name; ?></option>
							<?php }?>                        
						</select>
					</div>
				</div>
                                
                <div class="form-group">
					<label class="col-sm-2 control-label">Tipo de Ingreso: </label>
					<div class="col-sm-4">
						<select data-placeholder="Tipo de Ingreso..." class="select" name="inco_typeinco" tabindex="2" >
							<option value=""></option>  
							<?php foreach($incomesType as $t){ ?>
								<option value="<?php echo $t->incotype_id; ?>"><?php echo $t->incotype_description; ?></option>
							<?php }?>                        
						</select>
					</div>
				</div>
                
                <div class="form-group">
					<label class="col-sm-2 control-label">N&deg; Documento: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="inco_number" value="<?php echo  set_value("inco_number"); ?>" /></div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label">Fecha: </label>
					<div class="col-sm-4">
                    	<input type="datetime" class="form-control"  name="inco_date" value="<?php echo  set_value("inco_date"); ?>" data-mask="99/99/9999" />
                        <span class="help-block">DD/MM/YYYY</span>
                    </div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Detalle: </label>
					<div class="col-sm-10"><input type="text" class="form-control"  name="inco_detail" value="<?php echo  set_value("inco_detail"); ?>" /></div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label">Exento: </label>
					<div class="col-sm-10"><div class="checkbox"><input type="checkbox" class="styled" name="inco_exempt" id="inco_exempt" onclick="check_ingresos()"></div></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Neto: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="inco_subtotal" id="inco_subtotal" value="<?php echo  set_value("inco_subtotal"); ?>" /></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">IVA: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="inco_iva" id="inco_iva" value="<?php echo  set_value("inco_iva"); ?>" /></div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Total: </label>
					<div class="col-sm-4"><input type="text" class="form-control" name="inco_total" id="inco_total" value="<?php echo  set_value("inco_total"); ?>" onchange="calcula_valor_ingreso()"/></div>
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