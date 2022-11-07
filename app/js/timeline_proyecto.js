

function ver_gantt(){
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

		
  


	};
	
	
	
	
	