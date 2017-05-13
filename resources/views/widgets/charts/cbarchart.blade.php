<canvas id="cbar" width="350" height="220"></canvas>

<script>

	var chart = {
	    labels: {!! $labels !!} ,
	    datasets: [
	        {
	            label: "My First dataset",
	            backgroundColor: {!! $colors !!},
	            borderColor: {!! $colors !!},
	            borderWidth: 1,
	            data : {!! $cworkshops !!}
	        }
	    ]
	};

	var ctx = document.getElementById('cbarchart').getContext('2d');
	var ShowChart = new Chart(ctx , {
	    type: 'bar',
	    data: chart,
	    options: {
			scales: {
	            xAxes: [{
	                stacked: true
	            }],
	            yAxes: [{
	                stacked: true
            	}]
        	}
	 	}
	});    
</script>