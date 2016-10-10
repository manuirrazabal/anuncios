
<?php
if(!$getIncomes){	?>

	<div class="alert alert-info fade in widget-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="fa fa-times"></i> No existen ingresos para el periodo seleccionado.
    </div>
<?php
}else{

?>

	<div class="datatable">
        <table class="table table-hover">
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