<canvas id="cbar" height="800" width="1100"></canvas>

<script>

	var chart = {
	    labels: {!! $labels !!} ,
	    datasets: [
	        {
	            label: "Applications per Workshop",
	            backgroundColor: {!! $colors !!},
	            borderColor: {!! $colors !!},
	            borderWidth: 1,
	            data : {!! $aworkshops !!}
	        }
	    ]
	};

	var ctx = document.getElementById('cbar').getContext('2d');
	var ShowChart = new Chart(ctx , {
	    type: "bar",
	    data: chart,
	    options: {
			legend: {
		        display: false,
		        labels: {
	    	        fontColor: 'rgb(255, 99, 132)'
    			}
    		},
    		scales: {
     	    	xAxes: [{
              	  stacked: true
            	}],
            	yAxes: [{
                	stacked: true
            	}]
       		},
       		title: {
				display: true,
    			text: 'Applications per Workshop'
			}
	 	
	 	}
	});    
</script>