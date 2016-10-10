

    <label class="col-sm-2 control-label">Comuna: </label>
    <div class="col-sm-10">
        <select data-placeholder="Seleccione una Comuna..." class="select-search" name="empresa_city" id="empresa_city" tabindex="2">
            <option value=""></option>  
            <?php foreach($getComunas as $c){ ?>
                <option value="<?php echo $c->city_id; ?>"><?php echo $c->city_description; ?></option>
            <?php }?>                        
        </select>
    </div>
