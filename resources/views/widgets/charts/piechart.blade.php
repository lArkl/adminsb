<canvas id="piechart" height="800" width="1100"></canvas>
<script>

	var chart = {
            datasets: [
            	{
	                data : {!! $cworkshops !!},
	                backgroundColor: {!! $colors !!},
		            hoverBackgroundColor: {!! $colors !!},
		            strokeColor: "rgba(151,187,205,0.8)",
	                highlightFill: "rgba(151,187,205,0.75)",
	                highlightStroke: "rgba(151,187,205,1)",
				    //showTooltips: true,
	                responsive: true
            	}],
            labels: {!! $labels !!} 
         };
	var ctx = document.getElementById('piechart').getContext('2d');
	var ShowChart = new Chart(ctx , {
		type: "pie",
		data: chart, 
		options: {
		    legend: {
		        display: false,
		        labels: {
	    	        fontColor: 'rgb(255, 99, 132)'
    			}
    		},
    		title: {
				   display: true,
    			text: 'Applications per Workshop'
			}
	 	}
	});    
</script>