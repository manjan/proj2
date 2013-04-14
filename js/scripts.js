function addTyres(){
	var selectVal = $('#item_codes_select :selected').val();
	selectVal = selectVal.replace(/[^a-zA-Z0-9]/g,'');
	var val_tags = jQuery('#tags_tyres').val();
	if(selectVal!='' && selectVal !=0){
		if(val_tags.indexOf(selectVal)>=0){
			alert('Selected Code already added.');
		}else{
			jQuery('#tags_tyres').addTag(selectVal);
		}
	}else{
		alert('Please select a code to add.');
	}
}

function addRim(){
	var selectVal = $('#rim_select :selected').val();
	selectVal = selectVal.replace(/[^a-zA-Z0-9]/g,'');
	var val_tags = jQuery('#tags_rims').val();
	if(selectVal!='' && selectVal !=0){
		if(val_tags.indexOf(selectVal)>=0){
			alert('Selected Code already added.');
		}else{
			jQuery('#tags_rims').addTag(selectVal);
		}
	}else{
		alert('Please select a code to add.');
	}
}

function addBattery(){
	var selectVal = $('#battery_select :selected').val();
	selectVal = selectVal.replace(/[^a-zA-Z0-9]/g,'');
	var val_tags = jQuery('#tags_batteries').val();
	if(selectVal!='' && selectVal !=0){
		if(val_tags.indexOf(selectVal)>=0){
			alert('Selected Code already added.');
		}else{
			jQuery('#tags_batteries').addTag(selectVal);
		}
	}else{
		alert('Please select a code to add.');
	}
}

function addWiper(){
	var selectVal = $('#wiper_select :selected').val();
	selectVal = selectVal.replace(/[^a-zA-Z0-9]/g,'');
	var val_tags = jQuery('#tags_wipers').val();
	if(selectVal!='' && selectVal !=0){
		if(val_tags.indexOf(selectVal)>=0){
			alert('Selected Code already added.');
		}else{
			jQuery('#tags_wipers').addTag(selectVal);
		}
	}else{
		alert('Please select a code to add.');
	}
}

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

function changetyres(){
	var selectVal = $('#item_codes_select :selected').val();
	$('#item_desc').html('Loading...');
	$('#item_bal_wd').html('Loading...');
	$('#item_bal_kb').html('Loading...');
	$('#item_bal_tg').html('Loading...');
	$('#item_bal_shh').html('Loading...');


	if(selectVal!='0'){	
        jQuery.post("ajax.php?item_details=1&item_code=" + selectVal,               
	     function (data) {
               if (data.success == 'true') {
					$('#item_desc').html('<b>' + data.description + '<b>');
					$('#item_bal_wd').html('<b>' + data.wd_balance + '<b>');
					$('#item_bal_kb').html('<b>' + data.kb_balance + '<b>');
					$('#item_bal_tg').html('<b>' + data.tg_balance + '<b>');
					$('#item_bal_shh').html('<b>' + data.shh_balance + '<b>');
               }else{
					$('#item_desc').html('Not Found');
					$('#item_bal_wd').html('Not Found');
					$('#item_bal_kb').html('Not Found');
					$('#item_bal_tg').html('Not Found');
					$('#item_bal_shh').html('Not Found');
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
					$('#rim_desc').html('<b>' + data.description + '<b>');
					$('#rim_bal_wd').html('<b>' + data.wd_balance + '<b>');
					$('#rim_bal_kb').html('<b>' + data.kb_balance + '<b>');
					$('#rim_bal_tg').html('<b>' + data.tg_balance + '<b>');
					$('#rim_bal_shh').html('<b>' + data.shh_balance + '<b>');
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