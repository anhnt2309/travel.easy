   // $(document).ready(function(){
   	$("#search-button").click(function(){
   		var from_airport = $("#from-input").val();
   		var to_airport = $("#to-input").val();
   		var start_date = $("#start_date").val();
   		var end_date = $("#end_date").val();
   		var classes = $("#class-select").val();
   		var adults = $("#adults-count").val();
   		var children = $("#children-count").val();
   		var infants = $("#infants-count").val();
   		var currency = $("#currency-select").val();
   		var maxPrice = $("#maxPrice-input").val();
   		var nonstop = $('#nonstop-cb').is(':checked'); 

   		if(from_airport == ""){
   			alert("null");
   			$("#from-input").valid();
   			return false;
   		}
   		alert(to_airport);
   		alert(start_date);
   		alert(end_date);
   		alert(classes);
   		alert(adults);
   		alert(children);
   		alert(infants);
   		alert(currency);
   		alert(maxPrice);
   		alert(nonstop);


   		my_form=document.createElement('FORM');
		my_form.name='myForm';
		my_form.method='GET';
		my_form.action='php/result-handling.php';

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='from_airport';
		my_tb.value=from_airport;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='to_airport';
		my_tb.value=to_airport;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='start_date';
		my_tb.value=start_date;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='end_date';
		my_tb.value=end_date;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='classes';
		my_tb.value=classes;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='NUMBER';
		my_tb.name='adults';
		my_tb.value=adults;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='NUMBER';
		my_tb.name='children';
		my_tb.value=children;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='NUMBER';
		my_tb.name='infants';
		my_tb.value=infants;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='currency';
		my_tb.value=currency;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='NUMBER';
		my_tb.name='maxPrice';
		my_tb.value=maxPrice;
		my_form.appendChild(my_tb);

		my_tb=document.createElement('INPUT');
		my_tb.type='TEXT';
		my_tb.name='nonstop';
		my_tb.value=nonstop;
		my_form.appendChild(my_tb);


		my_form.appendChild(my_tb);
		document.body.appendChild(my_form);
		my_form.submit();

   	});
   // });