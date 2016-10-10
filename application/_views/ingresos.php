 <!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-forward"></i>Administracion de Ingresos<!--<small>Default, bordered, striped and custom.</small>--></h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('ingresos/add'); ?>">Agregar Nuevo Ingreso</a></li>
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
    <div class="panel-heading"><h6 class="panel-title">Listado de Ingresos</h6></div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Filtrar: </label>
            <div class="col-sm-10">
            	<select data-placeholder="Mes..." class="select" name="ingreso_mes" id="ingreso_mes" tabindex="2" >
                	<option value=""></option> 
                    <?php
					for($i = 1; $i <= 12; $i++){	
						if(strlen($i) == 1){
							$mes = '0'.$i;
						}else{
							$mes = $i;
						}
					
					?>
                    	<option value="<?php echo $mes ?>" <?php if($mes == date('m')){ echo 'selected="selected"'; }?> ><?php echo funcion_mes($i); ?></option>
					<?php
                    }
                    ?>   
                </select>
                <select data-placeholder="A&ntilde;o..." class="select" name="ingreso_anio" id="ingreso_anio" tabindex="2" >
                	<option value=""></option> 
                    <option value="2015" selected="selected">2015</option>    
                </select>
                <input type="button" value="Filtrar" class="btn btn-primary" onclick="carga_ingresos('ingresos/cingresos')">
            </div>
        </div>
	</div>
    
    <div class="panel-default" id="ingresos_list">
    	<?php
		if(!$getIncomes){	?>
		
			<div class="alert alert-info fade in widget-inner">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<i class="fa fa-times"></i> No existen ingresos para el periodo seleccionado.
			</div>
		<?php
		}else{
		
		?>
		
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>N&deg;</th>
							<th>Fecha Ingreso</th>
							<th>Tipo Ingreso</th>
							<th>Rut Cliente</th>
							<th>Cliente</th>
							<th>Neto</th>
							<th>IVA</th>
							<th>Total</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
				<?php
					foreach($getIncomes as $i){	
						if($i->inco_typeinco == 3){
							$multiplicador = -1;
		
						}else{
							$multiplicador = 1;
						}
					
						?>
						<tr>
							<td><?php echo $i->inco_id;?></td>
							<td><?php echo $i->inco_number;?></td>
							<td><?php echo $i->inco_date;?></td>
							<td><?php echo $i->incotype_description;?></td>
							<td><?php echo seteaRut($i->cust_rut);?></td>
							<td><?php echo $i->cust_name;?></td>
							<td><?php echo numberFormat($i->inco_subtotal * $multiplicador);?></td>
							<td><?php echo numberFormat($i->inco_iva * $multiplicador);?></td>
							<td><?php echo numberFormat($i->inco_total * $multiplicador);?></td>
							<td align="center">
								<a href="<?php echo base_url()?>ingresos/edit/<?php echo $i->inco_id; ?>" title="Editar Ingreso"><i class="fa fa-file-o"></i></a>
								<a href="javascript:void(0);" onclick="delete_ingreso('<?php echo base_url();?>ingresos/delete/<?php echo  $i->inco_id; ?>')" title="Eliminar Ingreso"><i class="fa fa-eraser"></i></a>
							</td>
						</tr>            
				<?php
						
						
						
						$neto = $neto + ($i->inco_subtotal * $multiplicador);
						$iva = $iva + ($i->inco_iva * $multiplicador);
						$total = $total + ($i->inco_total * $multiplicador);	
					}
				?>               
					</tbody>
					<tfoot>
						<tr>
							<td align="right" colspan="6"><b> Total : </b></td>
							<td><b><?php echo numberFormat($neto); ?></b></td>
							<td><b><?php echo numberFormat($iva); ?></b></td>
							<td><b><?php echo numberFormat($total); ?></b></td>
							<td>&nbsp;</td>
						</tr>
					</tfoot>
				</table>
			</div>
			 <div class="panel-body"><div class="form-actions text-right"><button class="btn btn-success" type="button" onclick="export_income();"><i class="fa fa-cloud-download"></i> Exportar a Excel</button></div></div>
		<?php	
		}
		?> 
    </div>    
</div>