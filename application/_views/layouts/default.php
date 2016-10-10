<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<title><?php echo $this->layout->getTitle(); ?></title>

<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>public/css/brain-theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>public/css/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.orderbars.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.pie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.time.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.animator.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/charts/flot.resize.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/tags.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/uploader/plupload.queue.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/forms/wysihtml5/toolbar.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/prettify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plugins/interface/collapsible.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/application.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/charts/simple_graph.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/function.js"></script>

<?php echo $this->layout->css; ?> 
<?php echo $this->layout->js; ?> 

</head>

<body>

   <?php echo $content_for_layout; ?>

</body>
</html>
