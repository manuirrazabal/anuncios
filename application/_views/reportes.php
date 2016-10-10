

<!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-bar-chart-o"></i> Reportes</h5>
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
	if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
		<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
	}
?>

<div class="row">           
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Resumen total de gastos</h6></div>
            <div class="panel-body">
               	<?php
					$atributos = array('class' => 'form-horizontal', 'id' => 'form_gastos', 'name' => 'form_gastos');
					echo form_open_multipart(null, $atributos);
					echo form_fieldset();
					echo validation_errors();
				?>
               
                    <input type="hidden" name="reporte" value="1" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Seleccionar periodo: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Mes..." class="select" name="gastos_mes" id="gastos_mes" tabindex="1" >
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
                            <select data-placeholder="A&ntilde;o..." class="select" name="gastos_anio" id="gastos_anio" tabindex="2" >
                                <option value=""></option> 
                                <option value="2015" selected="selected">2015</option>    
                            </select>                        
                        </div>
                    </div>
                    <div class="form-actions text-right"><input type="submit" value="Generar Resumen" class="btn btn-primary" tabindex="3"></div>
               <?php
					echo form_fieldset_close();
					echo form_close();
				?>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
    	<!-- Default panel --> 
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Ingresos: Consultas por estado</h6></div>
            <div class="panel-body">
            		<?php
					$atributos = array('class' => 'form-horizontal', 'id' => 'form_ingresos', 'name' => 'form_ingresos');
					echo form_open_multipart(null, $atributos);
					echo form_fieldset();
					echo validation_errors();
				?>
               
                    <input type="hidden" name="reporte" value="2" />
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Periodo Desde: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Mes..." class="select" name="ingresos_mes" id="ingresos_mes" tabindex="4" >
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
                            <select data-placeholder="A&ntilde;o..." class="select" name="ingresos_anio" id="ingresos_anio" tabindex="5" >
                                <option value=""></option> 
                                <option value="2015" selected="selected">2015</option>    
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Seleccionar Estado: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Seleccione Estado..." class="select" name="ingreso_status" tabindex="6" >
                                <option value=""></option>
                                <option value="0">Todos</option>   
                                <?php foreach($income_status as $i){ ?>
                                    <option value="<?php echo $i->incstatus_id; ?>"><?php echo $i->incstatus_description; ?></option>
                                <?php }?>                        
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Seleccionar Tipo: </label>
                        <div class="col-sm-10">
                            <select data-placeholder="Seleccione Tipo..." class="select" name="ingreso_tipo" tabindex="6" >
                                <option value=""></option>  
                                <option value="0">Todos</option> 
                                <?php foreach($income_type as $t){ ?>
                                    <option value="<?php echo $t->incotype_id; ?>"><?php echo $t->incotype_description; ?></option>
                                <?php }?>                        
                            </select>
                        </div>
                    </div>
                    <div class="form-actions text-right"><input type="submit" value="Generar Reporte" class="btn btn-primary" tabindex="7"></div>
               <?php
					echo form_fieldset_close();
					echo form_close();
				?>
            </div>
        </div>
        <!-- /default panel -->
    </div>
</div>

<div class="row">           
    <div class="col-lg-6">
    	<div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">Resumenes Anuales</h6></div>
            <div class="panel-body">
            	<?php
					$atributos = array('class' => 'form-horizontal', 'id' => 'form_anuales', 'name' => 'form_anuales');
					echo form_open_multipart(null, $atributos);
					echo form_fieldset();
					echo validation_errors();
				?>
                <input type="hidden" name="reporte" value="3" />
                <div class="form-group">
                    <label class="col-sm-2 control-label">Seleccionar a&ntilde;o: </label>
                    <div class="col-sm-10">
                    	<select data-placeholder="A&ntilde;o..." class="select" name="anual_anio" id="anual_anio" tabindex="8" >
                            <option value=""></option> 
                            <option value="2015" selected="selected">2015</option>    
                        </select> 
                    </div>
               	</div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Seleccionar Tipo: </label>
                    <div class="col-sm-10">
                    	<select data-placeholder="Seleccionar opci&oacute;n" class="select" name="anual_opcion" id="anual_opcion" tabindex="9" >
                            <option value=""></option> 
                            <option value="1" selected="selected">Resumen de Ingresos</option> 
                            <option value="2" selected="selected">Resumen de Egresos</option>
                            <option value="3" selected="selected">Resumen de Ganancias</option>   
                        </select> 
                    </div>
               	</div>
                <div class="form-actions text-right"><input type="submit" value="Generar Reporte" class="btn btn-primary" tabindex="10"></div>
                
                <?php
					echo form_fieldset_close();
					echo form_close();
				?>
            </div>
       	</div>
    </div>
</div>





            