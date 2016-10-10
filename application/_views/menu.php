<!-- Sidebar -->
        <?php
        /*
		Agregar las siguientes funcionalidades. 
			- Que cada menu venga con su imagen predeterminada, de manera que se vea mas ordenado
			- Agrupar los menus de manera que estos puedan ser categorizados.
        */
        ?>
        <div class="sidebar collapse">
        	<ul class="navigation">            	
                 <?php
				if($header_company_id == 1){ ?>
					<li <?php if($controller == "index"){ echo 'class="active"';}?> ><a href="<?php echo base_url('index');?>" title="administration"><i class="fa fa-laptop"></i> Inicio</a></li>
					
				<?php
				}
				?>

			<?php
            foreach($menu as $m){	
            	?><li <?php if($controller == $m->menu_name){ echo 'class="active"';}?>><a href="<?php echo base_url($m->menu_name);?>"><i class="<?php echo $m->menu_icon;?>"></i><?php echo $m->menu_description;?></a></li><?php
            }
            
            ?>
            </ul>
        </div>
        <!-- /sidebar -->
        
         <!-- Page content -->
        <div class="page-content">
        