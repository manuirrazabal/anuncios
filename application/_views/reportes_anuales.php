

<!-- Page title -->
<div class="page-title">
    <h5><i class="fa fa-bar-chart-o"></i>Reporte Anual</h5>
    <div class="btn-group">
        <a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo base_url('reportes'); ?>">Volver</a></li>
            <!--<li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">One more line</a></li>-->
        </ul>
    </div>
</div>
<!-- /page title -->

<?php 
	if ( $this->session->flashdata('ControllerMessage') != '' ){ ?>
		<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
	}
?>

<script language="javascript">
$(function () {
	var d1 = [[2, 5], [4, 8], [6, 2], [7, 3], [10, 4], [12, 5], [13, 6], [14, 4]];
	var d2 = [[2, 5], [4, 8], [6, 2], [7, 3], [10, 4], [12, 5], [13, 6], [14, 4]];
    	
	var plot = $.plotAnimator (
		$("#animated_3"), 
		[
			{ 
				data: d2, 
				points: { 
					show: true, 
					fill: true, 
					radius: 2,
					fillColor: "#ffffff"
				},
				label: "Bars" 
			}, 
			{ 
				data: d1, 
				animator: {
					steps: 136, 
					duration: 2500, 
					start:0
				}, 
				lines: { 
					show: true, 
					fill: false,
					lineWidth: 2
				},
				label: "Evolution" 
			}
		],
		{
			colors: ["#555555", "#bf2222"]
		}
	);


});

</script>

 <!-- Animated graph 3 -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h6 class="panel-title"><i class="icon-calendar2"></i> Animated graph 3</h6>
    </div>
    <div class="panel-body">
        <div class="graph-standard" id="animated_3"></div>
    </div>
</div>
<!-- /animated graph 3 -->



            