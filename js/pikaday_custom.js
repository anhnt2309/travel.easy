var start_date = new Pikaday({
	format: 'DD / MM / YYYY',
    field: document.getElementByName('checkin'),
    onSelect: function() {
        end_date.setMinDate(this.getDate());
    }
});
var end_date = new Pikaday({
	format: 'DD / MM / YYYY',
    field: document.getElementByName('checkout'),
    onSelect: function() {
        start_date.setMaxDate(this.getDate());
    }
});

jQuery(document).on('change', '.pika-select-month', function() {
    pika_modif_date('month', this.value);
});

jQuery(document).on('change', '.pika-select-year', function() {
	pika_modif_date('year', this.value);
});


function pika_modif_date(type, value_change){
	var pik_obj;
    // identifying object
    if( start_date.isVisible() ){
        pik_obj = 'start_date';
    }
    else{
        pik_obj = 'end_date';
    }
    var actual_date;
    // Date of the object
    eval('actual_date = '+pik_obj+'.getDate();');
    // If date not exist
    if (actual_date == null){
        return;
    }
    // Modify month or yeah
    if( 'month' == type ){
		actual_date.setMonth(value_change);
    }
	else{
		actual_date.setFullYear(value_change);
	}
	// Format for set to pikaday
	year = 1900 + actual_date.getYear();
    eval(pik_obj+'.setDate(new Date(' + year +','+ actual_date.getMonth() +','+ actual_date.getDate() +'), 1);');
}