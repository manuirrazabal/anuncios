

    <label class="col-sm-2 control-label">Regiones: </label>
    <div class="col-sm-10">
        <select data-placeholder="Seleccione una Region..." class="select-search" name="empresa_state" id="empresa_state" tabindex="2" onchange="cargacomunas('getcomunas')">
            <option value=""></option>  
            <?php foreach($getRegiones as $c){ ?>
                <option value="<?php echo $c->state_id; ?>"><?php echo $c->state_description; ?></option>
            <?php }?>                        
        </select>
    </div>
