function get_user_details(){
	var radio_value = $('input:radio[name=member]:checked').val();
	if(radio_value=='yes'){	
		var v_no = $('#vehi_no').val();
        jQuery.post("ajax.php?get_user_details=1&vehicle_id=" + v_no,               
	     function (data) {
               if (data.success == 'true') {
                   $('#name').val(data.name);
                   $('#mobile').val(data.phone);
                   $('#email').val(data.email);
               } 
           }, 'json');
    }else{
    }

}

function changerim(){
	var selectVal = $('#rim_select :selected').val();
	$('#rim_desc').html('Loading...');
	$('#rim_bal_wd').html('Loading...');
	$('#rim_bal_kb').html('Loading...');
	$('#rim_bal_tg').html('Loading...');
	$('#rim_bal_shh').html('Loading...');


	if(selectVal!='0'){	
        jQuery.post("ajax.php?item_details=1&item_code=" + selectVal,               
	     function (data) {
               if (data.success == 'true') {
					$('#rim_desc').html(data.description);
					$('#rim_bal_wd').html(data.wd_balance);
					$('#rim_bal_kb').html(data.kb_balance);
					$('#rim_bal_tg').html(data.tg_balance);
					$('#rim_bal_shh').html(data.shh_balance);
               }else{
					$('#rim_desc').html('Not Found');
					$('#rim_bal_wd').html('Not Found');
					$('#rim_bal_kb').html('Not Found');
					$('#rim_bal_tg').html('Not Found');
					$('#rim_bal_shh').html('Not Found');
               }
           }, 'json');
    }else{

    }
}

function changebattery(){
	var selectVal = $('#battery_select :selected').val();
	$('#battery_desc').html('Loading...');
	$('#battery_bal_wd').html('Loading...');
	$('#battery_bal_kb').html('Loading...');
	$('#battery_bal_tg').html('Loading...');
	$('#battery_bal_shh').html('Loading...');


	if(selectVal!='0'){	
        jQuery.post("ajax.php?item_details=1&item_code=" + selectVal,               
	     function (data) {
               if (data.success == 'true') {
					$('#battery_desc').html(data.description);
					$('#battery_bal_wd').html(data.wd_balance);
					$('#battery_bal_kb').html(data.kb_balance);
					$('#battery_bal_tg').html(data.tg_balance);
					$('#battery_bal_shh').html(data.shh_balance);
               }else{
					$('#battery_desc').html('Not Found');
					$('#battery_bal_wd').html('Not Found');
					$('#battery_bal_kb').html('Not Found');
					$('#battery_bal_tg').html('Not Found');
					$('#battery_bal_shh').html('Not Found');
               }
           }, 'json');
    }else{

    }
}

function changewiper(){
	var selectVal = $('#wiper_select :selected').val();
	$('#wiper_desc').html('Loading...');
	$('#wiper_bal_wd').html('Loading...');
	$('#wiper_bal_kb').html('Loading...');
	$('#wiper_bal_tg').html('Loading...');
	$('#wiper_bal_shh').html('Loading...');


	if(selectVal!='0'){	
        jQuery.post("ajax.php?item_details=1&item_code=" + selectVal,               
	     function (data) {
               if (data.success == 'true') {
					$('#wiper_desc').html(data.description);
					$('#wiper_bal_wd').html(data.wd_balance);
					$('#wiper_bal_kb').html(data.kb_balance);
					$('#wiper_bal_tg').html(data.tg_balance);
					$('#wiper_bal_shh').html(data.shh_balance);
               }else{
					$('#wiper_desc').html('Not Found');
					$('#wiper_bal_wd').html('Not Found');
					$('#wiper_bal_kb').html('Not Found');
					$('#wiper_bal_tg').html('Not Found');
					$('#wiper_bal_shh').html('Not Found');
               }
           }, 'json');
    }else{

    }
}