
<script type="text/javascript">
//column
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'graficos_totales_region',
			defaultSeriesType: 'bar',
			borderColor: '#066293',
			borderWidth:1,
			borderRadius:3,
            height:320,
			width:160,
			
			

		},
		
		style: {
                fontSize: '5'
				
            },
		title: {
			text: ''
		},
		yAxis: {
		title: {
			text: 'MWh'
		},
		labels: {
			style: {
				fontSize: '5px',
				color: 'green'
			}
		}
	},
		xAxis: {
			categories: <?=$categories;?>
			
			
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				
			}
		},
		legend: {
			backgroundColor: '#FFFFFF',
			reversed: true
		},
		tooltip: {
			formatter: function() {
				return ''+
					'Total Región: '+ this.y +'';
			}
		},
		
		plotOptions: {
			series: {
				stacking: 'normal'
			}
		},
			series: [{
			name: 'Total Proyectos<br> Región - Chile',color: 'black',
			showInLegend: "false",
			data: [
			<?=$data;?>
			
			
			
			]

			
		}]
		
		
	});
});


</script>






<script type="text/javascript">
//column
var chart;
$(document).ready(function() {
	chart = new Highcharts.Chart({
		chart: {
			renderTo: 'graficos_categoria',
			defaultSeriesType: 'column',
			borderColor: '#066293',
			borderWidth:1,
			borderRadius:3,
            height:320,
			width:160,
			
			

		},
		
		style: {
                fontSize: '5'
				
            },
		title: {
			text: ''
		},
		yAxis: {
		title: {
			text: 'MWh'
		},
		labels: {
			style: {
				fontSize: '5px',
				color: 'green'
			}
		}
	},
		xAxis: {
			categories: <?=$categories_sector;?>
			
			
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				
			}
		},
		legend: {
			backgroundColor: '#FFFFFF',
			reversed: true
		},
		tooltip: {
			formatter: function() {
				return ''+
					'Total Sector: '+ this.y +'';
			}
		},
		
		plotOptions: {
			series: {
				stacking: 'normal'
			}
		},
			series: [{
			name: 'Total Proyectos<br> Sector - Chile',color: 'black',
			showInLegend: "false",
			data: [
			<?=$data_c;?>
			
			
			
			]

			
		}]
		
		
	});
});

</script>