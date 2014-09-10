$(document).ready(function(){
var domain ="http://"+document.domain;
	// fetch my contact list
//--------------------------------------------------------
	// function formatSelection(contact) {
	// 	var markup = '<div style="padding: 5px; overflow:hidden;">';
	// 		markup += '<div style="float: left; margin-left: 5px">';
	// 		markup += '<div style="padding-bottom: 4px; font-weight: bold; font-size: 14px; line-height: 14px">'+contact.text+'</div>';
	// 		markup += '<div style=" font-size: 12px">'+contact.company+'</div>';
	// 		markup += '</div>';
	// 		markup += '</div>';
	// 		markup += '<div style="clear:both;"></div>';
	// 		markup += '</div>';
	// 	return markup;
	// }

	// $.fn.select2_function = function(path) {
	//     $(this).select2({
	// 		// placeholder: "Search for a contact",
	// 		allowClear: true,
	// 		minimumInputLength: 3,
	// 		ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
	// 			url: domain + '/'+ path, 
	// 			dataType: 'json',
	// 			data: function (term, page) {
	// 				return {
	// 					q: term, // search term
	// 					page_limit: 10,
	// 				};
	// 			},
	// 			results: function (data, page) { // parse the results into the format expected by Select2.
	// 				//console.log(data);
	// 				// since we are using custom formatting functions we do not need to alter remote JSON data
	// 				return {results: data.contacts};
	// 			}
	// 		},
	// 		formatResult: formatSelection,
	// 		escapeMarkup: function(m) { return m; }
	// 	});
 //   	}; 
// end
	$.fn.select_chain = function(option)
	{	
		option.chosen = option.chosen || false;
	    $(option.child).attr("disabled","disabled");

	    setselection($(this));
	    
	    $(this).on("change",function(){
	        setselection($(this));
	    });

	    function setselection(object){
	    	if(object.val() == 0){
	            $(option.child).attr("disabled","disabled").empty();
	            $('<option />', {value: 0, text: option.default_value}).appendTo($(option.child));     
	            if(option.chosen){
	            	$(option.child).trigger("chosen:updated");   
	            }
	              
	        }else{
	            $(option.child).attr("disabled","disabled").empty();
	            $('<option />', {value: 0, text: 'RETRIEVING RECORDS..'}).appendTo($(option.child));    
	           	if(option.chosen){
	            	$(option.child).trigger("chosen:updated");   
	            }
	            $.getJSON(option.ajax_url+'?q='+object.val(), function(data) {
	            	$(option.child).removeAttr("disabled").empty();
	                $('<option />', {value: 0, text: option.default_value}).appendTo($(option.child)); 
	                if(option.chosen){
		            	$(option.child).trigger("chosen:updated");   
		            }      
	                if(data[option.child_value] != ""){
	                    $.each (data[option.child_value], function (key, val) {
	                        $('<option />', {value: key, text: val}).appendTo($(option.child));
	                        if(option.chosen){
				            	$(option.child).trigger("chosen:updated");   
				            }       
	                    });
	                }else{
	                    $(option.child).attr("disabled","disabled").empty();
	                    $('<option />', {value: 0, text: 'NO RECORD FOUND'}).appendTo($(option.child)); 
	                   	if(option.chosen){
			            	$(option.child).trigger("chosen:updated");   
			            }  
	                }
				});
	        }
	    }
	};
});