
    
    
    
    <label for="">Subcategoria</label>
    <select class="form-control" title="Select Opcion" name="subcategories" id="subcategories">
         <?php foreach($getSubcategory as $s){ ?>
            <option value="<?php echo $s->subc_id; ?>"><?php echo $s->subc_description; ?></option>
        <?php
        }
        ?> 
    </select>
