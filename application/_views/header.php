<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="hidden-lg pull-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-right">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-chevron-down"></i>
                </button>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                    <span class="sr-only">Toggle sidebar</span>
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <ul class="nav navbar-nav navbar-left-custom">
                <li><a class="nav-icon sidebar-toggle"><i class="fa fa-bars"></i></a></li>
                <li class="user dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="http://placehold.it/500" alt="">
                        <span><?php echo $name_user; ?></span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!--
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-tasks"></i> Tasks</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        -->
                        <li><a href="<?php echo base_url('index/change_password'); ?>"><i class="fa fa-retweet"></i> Cambiar mi contrase&ntilde;a</a></li>
                        <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-mail-forward"></i> Salir</a></li>
                    </ul>
                </li>
                
                <li><a href="#">Empresa: <?php echo $company_name; ?></a></li>
            </ul>
        </div>

        <ul class="nav navbar-nav navbar-right collapse" id="navbar-right">
            <!--<li>
                <a href="#">
                    <i class="fa fa-rotate-right"></i>
                    <span>Updates</span>
                    <strong class="label label-danger">15</strong>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-comments"></i>
                    <span>Messages</span>
                    <strong class="label label-danger">7</strong>
                </a>
            </li>

            <li>
                <a >
                    <i class="fa fa-tasks"></i>
                    <span>Notifications</span>
                </a>
            </li>-->
        </ul>
    </div>
</div>
<!-- /navbar -->


<!-- Page header -->
<div class="container-fluid">
    <div class="page-header">
        <div class="logo"><a href="index.html" title=""><img src="<?php echo base_url().'public/';?>images/logo.png" alt=""></a></div>
        <ul class="middle-nav">
            <!--<li><a href="#" class="btn btn-default"><i class="fa fa-comments-o"></i> <span>Support tickets</span></a><div class="label label-info">9</div></li>
            <li><a href="#" class="btn btn-default"><i class="fa fa-bars"></i> <span>Statistics</span></a></li>
            <li><a href="#" class="btn btn-default"><i class="fa fa-male"></i> <span>User list</span></a></li>-->
            <li><a data-toggle="modal" role="button" href="#default_modal" class="btn btn-default"><i class="fa  fa-suitcase"></i> <span>Cambiar Empresa</span></a></li>
        </ul>
    </div>
</div>
<!-- /page header -->

<!-- Default modal -->
<div id="default_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">Cambiar de Empresa</h5>
            </div>
            <div class="modal-body has-padding">
                <p>Seleccionar la empresa en la cual desea trabajar y luego presionar el bot&oacute;n <b>Cambiar Empresa</b>.</p>
                
                 <div class="form-group"> 
                 
                    <label>Empresa:</label>
                    <select data-placeholder="Seleccione una empresa.." class="select-full" tabindex="2" id="empresa_login">
                        <option value=""></option> 
                        <?php foreach($company_assigned as $c){ ?>
                        	<option value="<?php echo $c->comp_id; ?>" <?php if($c->comp_id == $type_user){ echo 'selected="selected"'; }?>><?php echo $c->comp_name; ?></option>
                        <?php }?> 
                    </select>
                </div>
            </div>

            <div class="modal-footer">
            	<input type="hidden" value="<?php echo $this->session->userdata('controller'); ?>" name="modulo_login" id="modulo_login" />
                <button type="button" class="btn btn-primary" onclick="cambiar_empresa();">Cambiar Empresa</button>
            </div>
        </div>
    </div>
</div>
<!-- /default modal -->

    
        <!-- Page container -->
    <div class="page-container container-fluid">