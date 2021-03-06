
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
	$(window).bind("load resize", function() {
		topOffset = 50;
		width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
		if (width < 768) {
			$('div.navbar-collapse').addClass('collapse')
			topOffset = 100; // 2-row-menu
		} else {
			$('div.navbar-collapse').removeClass('collapse')
		}

		height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
		height = height - topOffset;
		if (height < 1) height = 1;
		if (height > topOffset) {
			$("#page-wrapper").css("min-height", (height) + "px");
		}
	})
})

function SetMenu(menu){
	var link = $('#'+menu);
	var li = link.closest('li.dropdown');

	link.addClass('active');
	li.addClass('active');
}

function companyformatSelection(contact) {
	var markup = '<div style="padding: 5px; overflow:hidden;">';
		markup += '<div style="float: left; margin-left: 5px">';
		markup += '<div style="padding-bottom: 4px; font-weight: bold; font-size: 14px; line-height: 14px">'+contact.text+'</div>';
		markup += '<div style=" font-size: 12px"><i>'+contact.address+'</i></div>';
		markup += '</div>';
		markup += '</div>';
		markup += '<div style="clear:both;"></div>';
		markup += '</div>';
	return markup;
}
function contactformatSelection(contact) {
	var markup = '<div style="padding: 5px; overflow:hidden;">';
		markup += '<div style="float: left; margin-left: 5px">';
		markup += '<div style="padding-bottom: 4px; font-weight: bold; font-size: 14px; line-height: 14px">'+contact.text+'</div>';
		markup += '<div style=" font-size: 12px">'+contact.company+'</div>';
		markup += '<div style=" font-size: 12px"><i>'+contact.address+'</i></div>';
		markup += '</div>';
		markup += '</div>';
		markup += '<div style="clear:both;"></div>';
		markup += '</div>';
	return markup;
}

$(document).ready(function () {
	

	var pathArray = window.location.pathname.split( '/' );
	var menu;
	if(pathArray[1] == 'project'){
		if((pathArray[1] == 'project') && (pathArray[2] == 'join')){
		menu ='project';
		}else if((pathArray[1] == 'project') && ((pathArray[2] == 'created') || (pathArray[2] == 'addcontact'))){
			menu ='created';
		}
		else if((pathArray[1] == 'project') && (pathArray[2] == 'forassigning')){
			menu ='forassigning';
		}
		else if((pathArray[1] == 'project') && ((pathArray[2] == 'details') || (pathArray[2] == 'assigned'))){
			menu ='assigned';
		}
		else if((pathArray[1] == 'project') && (pathArray[2] == 'joined')){
			menu ='joined';
		}

		else{
			menu ='project';
		}
	}else{
		menu = pathArray[1];
	}
	
	SetMenu(menu);

	$('#side-menu').metisMenu();

	// lazy loading
	var
	_scripts = document.getElementsByTagName("script"),
	_doc = document,
	_txt = "text/delayscript";
	for(var i=0,l=_scripts.length;i<l;i++){
		var _type = _scripts[i].getAttribute("type");
		if(_type && _type.toLowerCase() ==_txt)
			_scripts[i].parentNode.replaceChild((function(sB){
				var _s = _doc.createElement('script');
					_s.type = 'text/javascript';
					_s.innerHTML = sB.innerHTML;
					return _s;
			})(_scripts[i]), _scripts[i]);
	}
});
