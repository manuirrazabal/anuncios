
			<?php if($userGetType== 1){ ?>
                    <div class="alert alert-info fade in widget-inner">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        No es necesario visitar este modulo ya que tu usuario es ROOT, por ende tienes todas las empresas asignadas automaticamente.
                    </div>
        
        	<?php }?> 

    <label class="col-sm-2 control-label">Empresas Asignadas: </label>
    <div class="col-sm-10">
        <?php foreach($companyList as $c){ ?>        
        <div class="checkbox">
            <label>
                <input type="checkbox" class="styled" name="usuarios[]" value="<?php echo $c->comp_id; ?>"
                	<?php 
                    if($userGetType != 1){
                        foreach($usersToCompany as $u){ 
                            if($c->comp_id == $u->company_id){
                                echo 'checked="checked"';
                            }
                        }
                    }else{
                        echo 'checked="checked"';
                    }
                     ?>
                >
                <?php echo $c->comp_name; ?>
            </label>
        </div>
       <?php }?>  

    </div>
