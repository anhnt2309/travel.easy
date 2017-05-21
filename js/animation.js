$(document).ready(function(){
	$("#flight-option").click(function(){
		$("#option_container").addClass('animated fadeInUp');
		$('#option_container').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$("#option_container").removeClass('animated fadeInUp')
		});
	});

	$("#input-container").addClass('animated bounceInDown');
	$("#logo").addClass('animated rubberBand');

	
});