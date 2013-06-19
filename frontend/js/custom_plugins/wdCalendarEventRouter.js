$(document).ready(function(){
	$(document).on('created.calendar', function(e){
		console.log("calendar created");

		$(document).on("mousedown", ".wk-dayname", function(){
			console.log("clicked");
			var date = $(this).parent().attr('abbr');
			$(document).trigger("dateRangeChanged", [date, date]);
		});

		$(document).on("calendarViewChanged", function(e, p){
			var date1 = p.vstart;
			var date2 = p.vend;
			/*
			if(type == 'day' || type == 'week'){
				var obj = $("#dvwkcontaienr > table > tbody > tr > .gcweekname");
				date1 = obj.first().attr('abbr');
				date2 = obj.last().attr('abbr');
			}
			else if(type == 'month'){
				date1 = $('#mvEventContainer > div.month-row:first > table > tbody > tr > .st-bg').first().attr('abbr');
				date2 = $('#mvEventContainer > div.month-row:last > table > tbody > tr > .st-bg').first().attr('abbr');
			}*/


			$(document).trigger("dateRangeChanged", [date1, date2]);
		});
	});
});