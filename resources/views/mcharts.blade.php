@extends ('layouts.dashboard')
@section('page_heading','Charts')
@section('section')
<div class="col-sm-12">	
	<div class="row">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>		
		<div class="col-sm-6">
			@section ('cchart3_panel_title','Pie Chart')
			@section ('cchart3_panel_body')
			<div style="max-width:800px; margin:0 auto;">@include('widgets.charts.piechart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart3'))
		</div>
		<div class="col-sm-6">
			@section ('cchart4_panel_title','Bar Chart')
			@section ('cchart4_panel_body')
			@include('widgets.charts.cbarchart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart4'))
		</div>
		
		
		
	</div>
	
	
</div>
@stop
