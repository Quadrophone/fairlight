$(document).ready(function(){
$('a.search, #sidebar-search').click(function(){
    $('.search-box').slideDown();
    $('#s').val("").focus();
});

$(window).scroll(function(){
	var scroll = $(window).scrollTop();
		console.log(scroll);

	rgba = ((scroll / 1000) * 3);
	$('div.clouds').css('background-color' , 'rgba(75,75,75,' + rgba +')');
	if (scroll > 320) {
		$('.main-nav').addClass('darknav');
	}
	else {
		$('.main-nav').removeClass('darknav');
			}

});

function sidebarSlide (){
	$('#sidebar').animate({
		left:0
	});
}
function sidebarHide (){
	$('#sidebar').animate({
		left:"-300"
	});
}
$('.nav-menu').click(function(){
	if ($('#sidebar').hasClass('hidden')) {
sidebarSlide();
$('#sidebar').removeClass('hidden');
}
else {
sidebarHide();
$('#sidebar').addClass('hidden');
}
});
$('#searchform').bind("keyup keypress", function(e) {
  var code = e.keyCode || e.which; 
  if (code  == 13) {               
    e.preventDefault();
    return false;
  }
});

$('.close-sidebar').click(function(){
	sidebarHide();
$('#sidebar').addClass('hidden');
});

$('#searchform').bind("keyup keypress", function(e) {
  var code = e.keyCode || e.which; 
  if (code  == 27) {               
$('.search-box').slideUp();
location.reload();
  }
});



});