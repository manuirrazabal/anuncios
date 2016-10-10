<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="content">
                <div class="col-sm-12">
                    <div class="page-title">
                        <h1><?php echo $getCategoryName; ?></h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="p30 mb30 background-white">
                               
                               <div class="widget">
								<ul class="menu">
									<?php
                                    foreach($getSubcategories as $sub){
                                         ?><li><a href="<?php echo base_url('anuncioslist').'/'.encryptURL($sub->subc_id, 'anuncios'); ?>"><?php echo $sub->subc_description; ?></a></li><?php
                                    }
                                    ?>
                                 </ul><!-- /.menu -->
                                 </div><!-- /.wifget -->	
                            </div>
                        </div><!-- /.col-* -->
    				</div>

				</div><!-- /.col-* -->

           	</div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->