$(document).ready(function(){
	// toggle menu/navbar script
	$('.menu-btn').click(function(){
		$('.nav .menu').toggleClass("active");
		$('.menu-btn i').toggleClass("active");
	});
});