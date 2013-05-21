
var events;

// Events van de lijst laten zien

$(".listlink").on("click", function(e){
	var list = $(this).data("list");

	var request = $.ajax({
		url: "ajax/get_events.php",
		type: "GET",
		data: {list : list},
		dataType: "json"
	});
	 
	request.done(function(result) {
		$(".MyEvents").html("");

		console.log(result);
		if(result.success == 'ok')
		{

			var update = '';
			for(var i = 0; i < result.events.length; i++)
			{
				update += "<li><a class='eventlink' data-id='" + i + "' href='#'>" + result.events[i]['event']['eventdetails']['eventdetail']['title'] + "</a></li>";
				events = result.events;
			}

			$('.MyEvents').html(update);
		}
	});
	 
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});

	e.preventDefault(); 
});


// Event details laten zien

$(".MyEvents").on("click", ".eventlink", function(e){
	
	var clickedEvent = $(this).data("id"); // gebruik de data-id tag van myevents 
	console.log(events[clickedEvent]);

	$("#description").html("");

	updateTitle = events[clickedEvent]['event']['eventdetails']['eventdetail']['title'];

	//updateImages = events[clickedEvent]['event']['eventdetails']['eventdetail']['media']['file'];

	updateDescription = events[clickedEvent]['event']['eventdetails']['eventdetail']['longdescription'];

	$('#titel').html(updateTitle);
	//$('#eventThumbnail').attr('src',updateImages);
	$('#description').html(updateDescription);
	
	e.preventDefault(); // is gelijk aan return false
});