$(document).ready(function(){

	var domain ="http://"+document.domain;


	function LoadCalendarScript(callback){
		function LoadFullCalendarScript(){
			if(!$.fn.fullCalendar){
				$.getScript('/../assets/plugins/fullcalendar/fullcalendar.js', callback);
			}
			else {
				if (callback && typeof(callback) === "function") {
					callback();
				}
			}
		}
		if (!$.fn.moment){
			$.getScript('/../assets/plugins/moment/moment.min.js', LoadFullCalendarScript);
		}
		else {
			LoadFullCalendarScript();
		}
	}

	function DrawCalendar(){
	/* initialize the external events
	-----------------------------------------------------------------*/
	$('#external-events div.external-event').each(function() {
		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
	});
	/* initialize the calendar
	-----------------------------------------------------------------*/
	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var form = $('<form id="event_form">'+
				'<div class="form-group has-success has-feedback">'+
				'<label">Event name</label>'+
				'<div>'+
				'<input type="text" id="newevent_name" class="form-control" placeholder="Name of event">'+
				'</div>'+
				'<label>Description</label>'+
				'<div>'+
				'<textarea rows="3" id="newevent_desc" class="form-control" placeholder="Description"></textarea>'+
				'</div>'+
				'</div>'+
				'</form>');
			var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left">'+
							'<span><i class="fa fa-clock-o txt-danger"></i></span>'+
							'Cancel'+
							'</button>'+
							'<button type="submit" id="event_submit" class="btn btn-primary btn-label-left pull-right">'+
							'<span><i class="fa fa-clock-o"></i></span>'+
							'Add'+
							'</button>');
			OpenModalBox('Add event', form, buttons);
			$('#event_cancel').on('click', function(){
				CloseModalBox();
			});
			$('#event_submit').on('click', function(){
				var new_event_name = $('#newevent_name').val();
				if (new_event_name != ''){
					calendar.fullCalendar('renderEvent',
						{
							title: new_event_name,
							description: $('#newevent_desc').val(),
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				CloseModalBox();
			});
			calendar.fullCalendar('unselect');
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
		},
		eventRender: function (event, element, icon) {
			if (event.description != "") {
				element.attr('title', event.description);
			}
		},
		eventClick: function(calEvent, jsEvent, view) {
			var form = $('<form id="event_form">'+
				'<div class="form-group has-success has-feedback">'+
				'<label">Event name</label>'+
				'<div>'+
				'<input type="text" id="newevent_name" value="'+ calEvent.title +'" class="form-control" placeholder="Name of event">'+
				'</div>'+
				'<label>Description</label>'+
				'<div>'+
				'<textarea rows="3" id="newevent_desc" class="form-control" placeholder="Description">'+ calEvent.description +'</textarea>'+
				'</div>'+
				'</div>'+
				'</form>');
			var buttons = $('<button id="event_cancel" type="cancel" class="btn btn-default btn-label-left">'+
							'<span><i class="fa fa-clock-o txt-danger"></i></span>'+
							'Cancel'+
							'</button>'+
							'<button id="event_delete" type="cancel" class="btn btn-danger btn-label-left">'+
							'<span><i class="fa fa-clock-o txt-danger"></i></span>'+
							'Delete'+
							'</button>'+
							'<button type="submit" id="event_change" class="btn btn-primary btn-label-left pull-right">'+
							'<span><i class="fa fa-clock-o"></i></span>'+
							'Save changes'+
							'</button>');
			OpenModalBox('Change event', form, buttons);
			$('#event_cancel').on('click', function(){
				CloseModalBox();
			});
			$('#event_delete').on('click', function(){
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				});
				CloseModalBox();
			});
			$('#event_change').on('click', function(){
				calEvent.title = $('#newevent_name').val();
				calEvent.description = $('#newevent_desc').val();
				calendar.fullCalendar('updateEvent', calEvent);
				CloseModalBox()
			});
		}
		});
		$('#new-event-add').on('click', function(event){
			event.preventDefault();
			var event_name = $('#new-event-title').val();
			var event_description = $('#new-event-desc').val();
			if (event_name != ''){
			var event_template = $('<div class="external-event" data-description="'+event_description+'">'+event_name+'</div>');
			$('#events-templates-header').after(event_template);
			var eventObject = {
				title: event_name,
				description: event_description
			};
			// store the Event Object in the DOM element so we can get to it later
			event_template.data('eventObject', eventObject);
			event_template.draggable({
				zIndex: 999,
				revert: true,
				revertDuration: 0
			});
			}
		});
}
//
// Load scripts and draw Calendar
//
	function DrawFullCalendar(){
		LoadCalendarScript(DrawCalendar);
	}

	// DrawFullCalendar();

// fetch my contact list
//--------------------------------------------------------
	function formatSelection(contact) {
		var markup = '<div style="padding: 5px; overflow:hidden;">';
			markup += '<div style="float: left; margin-left: 5px">';
			markup += '<div style="padding-bottom: 4px; font-weight: bold; font-size: 14px; line-height: 14px">'+contact.text+'</div>';
			markup += '<div style=" font-size: 12px">'+contact.company+'</div>';
			markup += '</div>';
			markup += '</div>';
			markup += '<div style="clear:both;"></div>';
			markup += '</div>';
		return markup;
	}

	$.fn.select2_function = function() {
	     $(this).select2({
			placeholder: "Search for a contact",
			allowClear: true,
			minimumInputLength: 3,
			ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
				url: "/../api/v1/mycontacts", 
				dataType: 'json',
				data: function (term, page) {
					return {
						q: term, // search term
						page_limit: 10,
					};
				},
				results: function (data, page) { // parse the results into the format expected by Select2.
					//console.log(data);
					// since we are using custom formatting functions we do not need to alter remote JSON data
					return {results: data.contacts};
				}
			},
			formatResult: formatSelection,
			escapeMarkup: function(m) { return m; }
		});
   	}; 
// end
//------------------------------------------------------------------------
//--------------------------------------------------------
	//add new fields for phone
	$('#add-phone').click(function(e){
		var phone_group = $(this).closest('.form-group').clone();
		phone_group.children('label').find('a').attr('class', 'btn btn-danger remove-phone');
		phone_group.children('label').find('a span').attr('class', 'glyphicon glyphicon-minus');
		phone_group.children().find('input[type=text]').val('');
		phone_group.appendTo('#phone-wrapper');
		return false;
	});

	//remove phone
	$('body').on('click','.remove-phone', function(e){
		$(this).closest('.form-group').remove();
		return false;
	});
//--------------------------------------------------------
	//add new fields for email
	$('#add-email').click(function(e){
		var email_group = $(this).closest('.form-group').clone();
		email_group.children('label').find('a').attr('class', 'btn btn-danger remove-email');
		email_group.children('label').find('a span').attr('class', 'glyphicon glyphicon-minus');
		email_group.children().find('input[type=text]').val('');

		var last_input = parseInt($('#email-wrapper .form-group:last-child').clone().find('input[type=text]').attr('name').match(/\d+/g));
		var new_number = last_input+1;
		email_group.children().find('input[type=text]').attr('name', 'email['+new_number+']');
		email_group.appendTo('#email-wrapper');
		return false;
	});

	//remove email
	$('body').on('click','.remove-email', function(e){
		$(this).closest('.form-group').remove();
		return false;
	});
//--------------------------------------------------------
	// contact
	$("#phone-modal input#submit").click(function(){
		$.ajax({
			type: "POST",
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: "../phones", 
			data: $('form.contact-phone').serialize(),
			success: function(msg){
				$("#phone-modal").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});

	$("#email-modal input#submit").click(function(){
		$.ajax({
			type: "POST",
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: "../emails", 
			data: $('form.contact-email').serialize(),
			success: function(msg){
				$("#email-modal").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});
//--------------------------------------------------------
	// new project
	$('#area-select select#area_id').select_chain('#region-select select#region_id','/api/v1/area_regions/','SELECT REGION','regions');
	$('#category-select select#project_category_id').select_chain('#subcategory-select select#project_sub_category_id','/api/v1/sub_categories/','SELECT SUB CATEGORY','subcategories');

	// typeahead auto complete for adding contact
	
	// var contacts = new Bloodhound({
	// 	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
	// 	queryTokenizer: Bloodhound.tokenizers.whitespace,
	// 	remote: '/../api/v1/contacts/%QUERY'
	// });
	 
	// contacts.initialize();
	 
	// $('.typeahead').typeahead(null, {
	// 	name: 'fullname',
	// 	displayKey: 'first_name',
	// 	source: contacts.ttAdapter(),
	// 	templates: {
	// 		suggestion: Handlebars.compile([
	// 		'<p class="repo-language">{{title}}</p>',
	// 		'<p class="repo-name">{{first_name}}</p>',
	// 		'<p class="repo-description">{{company_name}}</p>'
	// 		].join(''))
	// 	} 
	// });
//--------------------------------------------------------
	// add contact to project
	$(".add-contact-sidebar").click(function(){
		var group = $(this).siblings().text();
		$('#add-contact #myModalLabel').text("Tag contact to '" + group + "' group.");
		$('#add-contact #group_id').val($(this).attr('id'));
		$('#add-contact').modal('show');
		return false;
	});

	$('#add-contact').on('hide.bs.modal', function (e) {
		$(':input','#add-contact')
		  .not(':button, :submit, :reset, :hidden')
		  .val('')
		  .removeAttr('checked')
		  .removeAttr('selected');
	})

	$("#add-contact input#submit").click(function(){
		$.ajax({
			type: "POST",
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: domain +"/api/v1/addcontact/" + $('#add-contact #group_id').val(), 
			data: $('form.project-contact').serialize(),
			success: function(msg){
				$("#add-contact").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});


//-------------------------------------------------------------------

});