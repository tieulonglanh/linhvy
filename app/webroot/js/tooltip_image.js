/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 10;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.preview").hover(function(e){
		this.t = this.title;
		this.p = this.getAttribute("price");
		this.src = this.getAttribute("src");
		
		this.title = "";
		var c = "";
		c += (this.t != "") ? "<p class='tieude_sanpham'>" + this.t + "</p>" : "";
		c += (this.p != "" && this.p != null) ? "<p class='gia_sanpham'>" + this.p + "</p>" : "";
		$("body").append("<div id='preview'><img src='"+ this.src +"' alt='Image preview' />"+ c +"</div>");								 
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");						
    },
	function(){
		this.title = this.t;
		$("#preview").remove();
    });	
	$("a.preview").mousemove(function(e){
		setPositionTooltip(e);
	});
	
	function setPositionTooltip(e){
		var	container = $("#preview");
		var x=e.pageX+xOffset;
		var y=e.pageY+yOffset;
		var tipw=container.outerWidth();
		var tiph=container.outerHeight();
		x=(x+tipw>$(document).scrollLeft()+$(window).width())? x-tipw-(xOffset*2) :x;
		y=(y+tiph>$(document).scrollTop()+$(window).height())? $(document).scrollTop()+$(window).height()-tiph-10:y;
		container.css({left:x, top:y});
		
	}	
};


// starting the script on page load
$(document).ready(function(){
	imagePreview();
});