<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<head>
    	<title>Ver Ficha</title>
		
		
		
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.portalminero.com/sitio_portal/ui-jquery/js/jquery.multi-accordion-1.5.3.js"></script>


<script type="text/javascript" src="https://www.portalminero.com/sitio_portal/js/timeline_js/timeline-api.js"></script>
<script>SimileAjax.History.enabled = false;</script>
<script type="text/javascript" src="https://www.portalminero.com/sitio_portal/js/timeline_js/quarter-interval.js"></script>

<script type="text/javascript">

</script>




	<script type="text/javascript">
	$(document).ready(function(){
		var contador=0;

	

		if($(".gantt").length){
			$(".gantt").attr("id", "gantt");
			var NOM=$(".nom_xml").text();
			var fecha_inicio=$(".fecha_inicio").text();
			var fecha_desde=$(".fecha_desde").text();
			var fecha_hasta=$(".fecha_hasta").text();
			var fecha_desde_f=$(".fecha_desde_f").text().split("-");
			var fecha_hasta_f=$(".fecha_hasta_f").text().split("-");
			var tl;

			function onLoad() {

				var eventSource = new Timeline.DefaultEventSource();

				var zones = [
					{   start:    fecha_desde,
						end:      fecha_hasta,
						magnify:  1,
						unit:     Timeline.DateTime.QUARTER
					}
				];

				var zones2 = [
								{   start:    fecha_desde,
									end:      fecha_hasta,
									magnify:  1,
									unit:     Timeline.DateTime.YEAR
								}
							];

				var theme = Timeline.ClassicTheme.create();
				//theme.timeline_start =new Date(fecha_desde_f[0], fecha_desde_f[1], fecha_desde_f[2]);
				//theme.timeline_stop  = new Date(fecha_hasta_f[0], fecha_hasta_f[1], fecha_hasta_f[2]);
				theme.event.tape.height=10;
				theme.ether.highlightOpacity=30;

				var date = fecha_inicio;

				var bandInfos = [
									Timeline.createHotZoneBandInfo({
										width:          "80%",
										intervalUnit:   Timeline.DateTime.QUARTER,
										intervalPixels: 100,
										zones:          zones,
										eventSource:    eventSource,
										date:           date,
										timeZone:       -6,
										theme:          theme,
										layout:"original"
									}),
									Timeline.createHotZoneBandInfo({
										showEventText:  false,
										width:          "20%",
										intervalUnit:   Timeline.DateTime.YEAR,
										intervalPixels: 45,
										eventSource:    eventSource,
										zones:          zones2,
										date:           date,
										timeZone:       -6,
										theme:          theme,
										overview:       true
									})
				];

				bandInfos[1].syncWith = 0;
				bandInfos[1].highlight = true;

				for (var i = 0; i < bandInfos.length; i++) {
					bandInfos[i].decorators = [
						new Timeline.SpanHighlightDecorator({
							color:      "#FFC080",
						   startDate:    fecha_desde,
						   endDate:      fecha_hasta,
							opacity:    50,
							startLabel: "",
							endLabel:   "",
							theme:theme
						})
					];
				}

				tl = Timeline.create(document.getElementById("gantt"), bandInfos, Timeline.HORIZONTAL);

				tl.loadXML("/xml/"+NOM+".xml", function(xml, url) { eventSource.loadXML(xml, url); });
			}

			var resizeTimerID = null;

			function onResize() {
				if (resizeTimerID == null) {
					resizeTimerID = window.setTimeout(function() {
						resizeTimerID = null;
						tl.layout();
					}, 500);
				}
			}

			function themeSwitch(){
				var timeline = document.getElementById('tl');
				timeline.className = (timeline.className.indexOf('dark-theme') != -1) ? timeline.className.replace('dark-theme', '') : timeline.className += ' dark-theme';
			}

			onLoad();

		}

		
  


	});
	</script>

   
	*****************************
	<div name="gantt" class="gantt show_gnt" style="padding:10px; height:300px; overflow:hidden; font-size:10px;">&nbsp;</div>
	*****************************
    	


<div class="js" style="display:none;">1</div>
<div class="js2" style="display:none;">7</div>
<div class="nom_xml" style="display:none;">1230</div>
<div class="fecha_inicio" style="display:none;">Sat Aug 01 2009 00:00:00 GMT-0600</div>
<div class="fecha_desde" style="display:none;">Thu Jan 01 2009 00:00:00 GMT-0600</div>
<div class="fecha_hasta" style="display:none;">Sat Dec 31 2022 00:00:00 GMT-0600</div>
<div class="fecha_desde_f" style="display:none;">2009-01-01</div>
<div class="fecha_hasta_f" style="display:none;">2023-12-31</div>


			
    	
