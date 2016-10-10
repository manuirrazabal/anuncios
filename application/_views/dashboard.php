

<!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-laptop"></i> Dashboard <small>Bienvenido <?php echo $this->session->userdata('login_user_name') . ' (' . $getTypeUser . ')';?></small></h5>
    <!--<div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">One more line</a></li>
        </ul>
    </div>-->
</div>
<!-- /page title -->


<?php 
// If the user is Root, Show aditional Information.
if($this->session->userdata('login_usertype') == 1){?>
<!-- Statistics -->
<ul class="row stats">
    <li class="col-xs-3"><a href="#" class="btn btn-default"><?php echo $totalCompanies; ?></a> <span>Total Empresas</span></li>
    <li class="col-xs-3"><a href="#" class="btn btn-default"><?php echo $activeCompanies; ?></a> <span>Empresas Activas</span></li>
    <li class="col-xs-3"><a href="#" class="btn btn-default"><?php echo $inactiveCompanies; ?></a> <span>Empresas Inactivas</span></li>
    <li class="col-xs-3"><a href="#" class="btn btn-default"><?php echo $expireCompanies; ?></a> <span>Empresas por Expirar</span></li>
</ul>
<!-- /statistics -->

<?php }?>


<?php 
	if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
		<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
	}
?>

<div class="row">           
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Resumen de Ingresos y Egresos (<?php echo funcion_mes(date('m')); ?>)</h6></div>
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#panel-pill1" data-toggle="tab"><i class="fa fa-forward"></i> Ingresos</a></li>
                        <li><a href="#panel-pill2" data-toggle="tab"><i class="fa fa-backward"></i> Egresos</a></li>
                    </ul>
    
                    <div class="tab-content pill-content">
                        <div class="tab-pane fade in active" id="panel-pill1">
                            <?php if($getExpenses){ ?>
                                <div class="datatable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Empresa</th>
                                                <th>Subtotal</th>
                                                <th>IVA</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getIncomes as $i){
												if($i->inco_typeinco == 3){
													$multiplicador = -1;								
												}else{
													$multiplicador = 1;
												}
												
												?> 
                                            <tr>
                                                <td><?php echo $i->inco_id; ?></td>
                                                <td><?php echo $i->incotype_description; ?></td>
                                                <td><?php echo $i->cust_name; ?></td>
                                                <td><?php echo numberFormat($i->inco_subtotal * $multiplicador); ?></td>
                                                <td><?php echo numberFormat($i->inco_iva * $multiplicador);?></td>
                    							<td><?php echo numberFormat($i->inco_total * $multiplicador);?></td>
                                            </tr>
                                            <?php 
												$netoIncome = $netoIncome + ($i->inco_subtotal * $multiplicador);
												$ivaIncome = $ivaIncome + ($i->inco_iva * $multiplicador);
												$totalIncome = $totalIncome + ($i->inco_total * $multiplicador);
											
												} ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td align="right" colspan="3"><b> Total : </b></td>
                                                <td ><b><?php echo numberFormat($netoIncome); ?></b></td>
                                                <td><b><?php echo numberFormat($ivaIncome); ?></b></td>
                                                <td><b><?php echo numberFormat($totalIncome); ?></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php }else{ ?>
                                    <div class="alert alert-warning fade in widget-inner">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="fa fa-times"></i> No existen Ingresos para el mes en curso
                                    </div>
                            <?php } ?>                            
                            
                        </div>
    
                        <div class="tab-pane fade" id="panel-pill2">
                        	<?php if($getExpenses){ ?>
            
                                <div class="datatable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Empresa</th>
                                                <th>Subtotal</th>
                                                <th>IVA</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($getExpenses as $e){?> 
                                            <tr>
                                                <td><?php echo $e->expen_id; ?></td>
                                                <td><?php echo $e->expentype_description; ?></td>
                                                <td><?php echo $e->provi_name; ?></td>
                                                <td><?php echo numberFormat($e->expen_subtotal);?></td>
                                                <td><?php echo numberFormat($e->expen_iva);?></td>
                                                <td><?php echo numberFormat($e->expen_total);?></td>
                                            </tr>
                                            <?php 
												$neto = $neto + $e->expen_subtotal;
												$iva = $iva + $e->expen_iva;
												$total = $total + $e->expen_total;
											
												} ?>
                                        </tbody>
                                         <tfoot>
                                            <tr>
                                                <td align="right" colspan="3"><b> Total : </b></td>
                                                <td><b><?php echo numberFormat($neto); ?></b></td>
                                                <td><b><?php echo numberFormat($iva); ?></b></td>
                                                <td><b><?php echo numberFormat($total); ?></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                              <?php }else{ ?>
                                   <div class="alert alert-warning fade in widget-inner">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="fa fa-times"></i> No existen Egresos para el mes en curso
                                    </div>
                              <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
    	<!-- Default panel --> 
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Resumen de Usuarios</h6></div>
            <div class="panel-body">
            	<div class="datatable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rut</th>
                    			<th>Nombre</th>
                                <th>Tipo Usuario</th>                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach($getUsers as $u){?>
                            <tr>
                                <td><?php echo seteaRut($u->user_rut);?></td>
                                <td><?php echo $u->user_name .' '. $u->user_lastname;?></td>
                                <td><?php echo $u->utype_description;?></td>
                            </tr>
                            
                            <?php }?>
                        </tbody>
                  	</table>
            	</div>
            </div>
        </div>
        <!-- /default panel -->
    </div>
</div>





            