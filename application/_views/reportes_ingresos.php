

<!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-bar-chart-o"></i>Ingresos: Consultas por estado</h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('reportes'); ?>">Volver</a></li>
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
if($getReportIncomes){	?>
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Resumen Ingresos</h6></div>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($getReportIncomes as $i){	
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
                        </tr>
                        
                        <?php						
                        $neto_income = $neto_income + ($i->inco_subtotal * $multiplicador);
                        $iva_income = $iva_income + ($i->inco_iva * $multiplicador);
                        $total_income = $total_income + ($i->inco_total * $multiplicador);	
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td align="right" colspan="6"><b> Total Ingresos: </b></td>
                        <td><b><?php echo numberFormat($neto_income); ?></b></td>
                        <td><b><?php echo numberFormat($iva_income); ?></b></td>
                        <td><b><?php echo numberFormat($total_income); ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="panel-body">
        	<div class="form-actions text-right">
            	<input type="hidden" name="ingresos_mes" id="ingreso_mes" value="<?php echo $mes; ?>" />
                <input type="hidden" name="ingresos_anio" id="ingreso_anio" value="<?php echo $year; ?>" />
                <input type="hidden" name="ingreso_status" id="ingreso_status" value="<?php echo $status; ?>" />
                <input type="hidden" name="ingreso_tipo" id="ingreso_tipo" value="<?php echo $type; ?>" />
            	<button class="btn btn-success" type="button" onclick="export_income_report();"><i class="fa fa-cloud-download"></i> Exportar a Excel</button>
            </div>
        </div>
    </div>
<?php	
	}else{	?>
		<div class="alert alert-info fade in widget-inner">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-times"></i> No existen suficientes datos para generar el reporte.
        </div>
	<?php
    }
	?>



            