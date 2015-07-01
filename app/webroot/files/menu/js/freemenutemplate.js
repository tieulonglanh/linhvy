<!-- /menu/-->
$(document).ready(function (){
    $("#firstpane p.menu_head").click(function () {
        $(this).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");

});

$("#secondpane p.menu_head").mouseover(function(){
$(this).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");

});
});

