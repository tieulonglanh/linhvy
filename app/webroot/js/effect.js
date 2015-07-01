$(document).ready(function(e) {
    $('.menu_list_parent li').click(function(){
			$(this).children('ul').slideToggle();
		});
});