
<?php
if(!$getExpenses){	?>

	<div class="alert alert-info fade in widget-inner">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <i class="fa fa-times"></i> No existen egresos para el periodo seleccionado.
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
                    <th>Fecha Egreso</th>
                    <th>Tipo Egreso</th>
                    <th>Rut Proveedor</th>
                    <th>Proveedor</th>
                    <th>Neto</th>
                    <th>IVA</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
		<?php
            foreach($getExpenses as $e){	?>
                <tr>
                    <td><?php echo $e->expen_id;?></td>
                    <td><?php echo $e->expen_number;?></td>
                    <td><?php echo $e->expen_date;?></td>
                    <td><?php echo $e->expentype_description;?></td>
                    <td><?php echo seteaRut($e->provi_rut);?></td>
                    <td><?php echo $e->provi_name;?></td>
                    <td><?php echo numberFormat($e->expen_subtotal);?></td>
                    <td><?php echo numberFormat($e->expen_iva);?></td>
                    <td><?php echo numberFormat($e->expen_total);?></td>
                    <td align="center">
                    	<a href="<?php echo base_url()?>egresos/edit/<?php echo $e->expen_id; ?>" title="Editar Egreso"><i class="fa fa-file-o"></i></a>
                        <a href="javascript:void(0);" onclick="delete_egreso('<?php echo base_url();?>egresos/delete/<?php echo  $e->expen_id; ?>')" title="Eliminar Egreso"><i class="fa fa-eraser"></i></a>
                    </td>
                </tr>            
        <?php
				$neto = $neto + $e->expen_subtotal;
				$iva = $iva + $e->expen_iva;
				$total = $total + $e->expen_total;	
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
    <div class="panel-body"> <div class="form-actions text-right"><button class="btn btn-success" type="button" onclick="export_expense();"><i class="fa fa-cloud-download"></i> Exportar a Excel</button></div></div>
   
    
    
<?php	
}
?> 