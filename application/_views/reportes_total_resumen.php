

<!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-bar-chart-o"></i>Resumen total de gastos</h5>
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
if($incomes && $expenses){	?>
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Resumen Ingresos</h6></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>N&deg;</th>
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
                    foreach($incomes as $i){	
                        if($i->inco_typeinco == 3){
                            $multiplicador = -1;
        
                        }else{
                            $multiplicador = 1;
                        }					
                        ?>
                        <tr>
                            <td><?php echo $i->inco_id;?></td>
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
                        <td align="right" colspan="4"><b> Total Ingresos: </b></td>
                        <td><b><?php echo numberFormat($neto_income); ?></b></td>
                        <td><b><?php echo numberFormat($iva_income); ?></b></td>
                        <td><b><?php echo numberFormat($total_income); ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
	
    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title">Resumen Egresos</h6></div>
        <div class="table-responsive">
        	<table class="table table-hover">
                <thead>
                    <tr>
                        <th>N&deg;</th>
                        <th>Tipo Egreso</th>
                        <th>Rut Proveedor</th>
                        <th>Proveedor</th>
                        <th>Neto</th>
                        <th>IVA</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach($expenses as $e){	?>
                    <tr>
                        <td><?php echo $e->expen_id;?></td>
                        <td><?php echo $e->expentype_description;?></td>
                        <td><?php echo seteaRut($e->provi_rut);?></td>
                        <td><?php echo $e->provi_name;?></td>
                        <td><?php echo numberFormat($e->expen_subtotal);?></td>
                        <td><?php echo numberFormat($e->expen_iva);?></td>
                        <td><?php echo numberFormat($e->expen_total);?></td>
                    </tr>            
            <?php
                    $neto_expenses = $neto_expenses + $e->expen_subtotal;
                    $iva_expenses = $iva_expenses + $e->expen_iva;
                    $total_expenses = $total_expenses + $e->expen_total;	
                }
            ?>               
                </tbody>
                <tfoot>
                    <tr>
                        <td align="right" colspan="4"><b> Total Egresos : </b></td>
                        <td><b><?php echo numberFormat($neto_expenses); ?></b></td>
                        <td><b><?php echo numberFormat($iva_expenses); ?></b></td>
                        <td><b><?php echo numberFormat($total_expenses); ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="bg-info widget-inner" align="right" style="padding:1px 10px 1px 0px;"><h3>Total Ganancia: <?php echo numberFormat($total_income - $total_expenses); ?></h3></div>
<?php	
	}else{	?>
		<div class="alert alert-info fade in widget-inner">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-times"></i> No existen suficientes datos para generar el resumen.
        </div>
	<?php
    }
	?>



            