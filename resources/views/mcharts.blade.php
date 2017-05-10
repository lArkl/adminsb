@extends ('layouts.dashboard')
@section('page_heading','Charts')
@section('section')
<div class="col-sm-12">	
	<div class="row">
		{{$labels}}

		<canvas id="daily-reports" height="300" width="1100"></canvas>
		{{--<script src="../../js/chart.js"></script>--}}
		<script src="https://raw.githubusercontent.com/nnnick/Chart.js/master/dist/Chart.bundle.js"></script>
		<script type="text/javascript">
		    (function() {
		         var ctx = document.getElementById('daily-reports').getContext('2d');
		         var chart = {
		         	labels : ["January","February","March","April","May","June","July"],
        			//labels: {!! $labels !!},
		            datasets: [{
		                data : [100,160,95,205,170,135,200],
		                fillColor : "#94646D",
		                strokeColor : "#A37079",
		                pointColor : "#BC808B",
		                showTooltips: true,
		                responsive: false
		            }]
		         };

		         new Chart(ctx).Line(chart);
		    });
		</script>



		<div class="col-sm-6">
			@section ('cchart1_panel_title','Line Chart')
			@section ('cchart1_panel_body')
			@include('widgets.charts.clinechart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart1'))
			@section ('cchart3_panel_title','Donut Chart')
			@section ('cchart3_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cdonutchart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart3'))
		</div>
		<div class="col-sm-6">
			
			@section ('cchart2_panel_title','Pie Chart')
			@section ('cchart2_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cpiechart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart2'))

			@section ('cchart4_panel_title','Bar Chart')
			@section ('cchart4_panel_body')
			@include('widgets.charts.cbarchart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart4'))
		</div> 
	</div>
	
	
</div>
@stop
