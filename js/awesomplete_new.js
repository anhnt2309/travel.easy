var input = document.getElementById("to-input");
var awesomplete = new Awesomplete(input, {
  minChars: 1,
  autoFirst: true,
  maxItems:5
});

var input2 = document.getElementById("from-input");
var awesomplete2 = new Awesomplete(input2, {
  minChars: 1,
  autoFirst: true,
  maxItems:5
});



$("input").on("keyup", function(){
  var domesticFrom = $('#from-domestic').is(':checked'); 
   var domesticTo = $('#to-domestic').is(':checked'); 
  var searchTerm;
  searchTerm = this.value;
  if(this.value== "đà lạt" || this.value== "da lat"){
     searchTerm = "dli";
   
  }
  var url_str = 'https://api.sandbox.amadeus.com/v1.2/airports/autocomplete?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&term=' + searchTerm;
  if(domesticFrom == true ||  domesticTo == true){
      url_str= 'https://api.sandbox.amadeus.com/v1.2/airports/autocomplete?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&term=' + searchTerm + '&country=VN';
  }
  
  $.ajax({
    url: url_str,
    type: 'GET',
    dataType: 'json'
  })
  .success(function(data) {
    var list = [];
    $.each(data, function(key, value) {
      // var label =value.label.substring(0,value.label.lastIndexOf("["));
      var cityname = value.label.substring(0,value.label.lastIndexOf("-"));
      if(cityname == ""){
        var cityname = value.label.substring(0,value.label.lastIndexOf("I"));
      }
      // cityname = cityname.substring(0,cityname.lastIndexOf("City"));
      var value2 = cityname + "(" + value.value +")";

      list.push([value.label,value2]);
        
    });
    awesomplete.list = list;
    awesomplete2.list = list;
  });
});