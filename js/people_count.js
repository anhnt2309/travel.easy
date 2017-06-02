var adults = 1;
var childrens = 0;
var infants = 0;
$(document).ready(function(){

$("#adults-plus").click(function(){
	adults = adults +1;
	
	
	$("#adults-count").val(adults);
});
$("#adults-minus").click(function(){
	if(adults > 1){
	adults = adults -1;
	}
	if(infants > adults){
		infants = infants -1;
		$("#infants-count").val(infants);
	}
	$("#adults-count").val(adults);
});	

$("#children-plus").click(function(){
	childrens = childrens +1;
	
	$("#children-count").val(childrens);
});
$("#children-minus").click(function(){
	if(childrens > 0){
	childrens = childrens -1;
	}
	
	$("#children-count").val(childrens);
});	

$("#infants-plus").click(function(){
	if(infants < adults){
	infants = infants +1;
	}
	
	$("#infants-count").val(infants);
});
$("#infants-minus").click(function(){
	if(infants > 0){
	infants = infants -1;
	}
	
	$("#infants-count").val(infants);
});	

});