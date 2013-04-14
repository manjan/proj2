<?php include ('main_head.php');  ?>
<?php
if($_POST['submit']){
	$enquiry_date = $_POST['enquiry_date'];
	$is_member = $_POST['member'];
	$v_no = $_POST['vehi_no'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$tyres = $_POST['tags_tyres'];
	$rims = $_POST['tags_rims'];
	$batteries = $_POST['tags_batteries'];
	$wipers = $_POST['tags_wipers'];
	$comment = $_POST['comment'];
	$followup = $_POST['folowup'];
	$remark = $_POST['remark'];
	$other_remark = $_POST['otherremark'];
	$status = 'Pending';
	if(isset($_POST['status'])){
		$status = $_POST['status'];
	}
	$enquiry_type = "Others";
	if(isset($_POST['e_type'])){
		$enquiry_type = $_POST['e_type'];
	}

	$sql = "Insert into enquiry (enquiry_date,name,phone,email,cid,e_type,status,membership,tyres,rims,batteries,wipers,comment,followup,remarks) values(
		'$enquiry_date','$name','$mobile','$email','$v_no','$enquiry_type','$status','$is_member','$tyres','$rims','$batteries','$wipers','$comment','$followup','$remark')";
	mysql_query($sql) or die(mysql_error());
	$id = mysql_insert_id();
	$enq = 'ENQ'.date('y'). str_pad($id, 4, "0", STR_PAD_LEFT);
	$update_sql = "Update enquiry set e_id='".$enq."' where id=$id";
	mysql_query($update_sql) or die(mysql_error());
}
?>
<script type="text/javascript">

function addtyres(){
	var tyre_code = $('#item_codes_select :selected').val();

}
</script>
<?php
	$query = "Select a.code,a.descb from Item as a, Item_Category as b where a.icat=b.code and b.code='R'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	$rim_codes = array();
	if($count>0){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$rim_codes[] = $row['code'];
		}
	}

	$query = "Select a.code,a.descb from Item as a, Item_Category as b where a.icat=b.code and b.code='B'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	$battery_codes = array();
	if($count>0){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$battery_codes[] = $row['code'];
		}

	}

	$query = "Select a.code,a.descb from Item as a, Item_Category as b where a.icat=b.code and b.code='830'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	$wiper_codes = array();
	if($count>0){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$wiper_codes[] = $row['code'];
		}
	}

	$query = "Select a.code,a.descb from Item as a, Item_Category as b where a.icat=b.code and a.igroup='TYRES'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	$tyres_codes = array();
	if($count>0){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$tyres_codes[] = $row['code'];
		}
	}



?>

<div id='content'>
<form id='enquiry_form' action="index.php" method="POST" onsubmit="return validate_form(this);">
<div id='form_wrapper'>
	<div id='form_element'>
		<span class='label'>Date:</span>
		<?php print date("Y-m-d");?>
		<input type="hidden" name="enquiry_date" value="<?php echo date("Y-m-d"); ?>">
	</div>
	<div id='form_element_right'>
		<span  class='label'>Member:</span>
		<input type="radio" name="member" id="member" value="yes"  onclick="">Yes
		<input type="radio" name="member" value="no" checked="checked">No
	</div>
	
</div>
<div id='form_wrapper'>
	<div id='form_element'>
		<span  class='label'>Vehicle No:</span>
		<input type="text" name="vehi_no" id="vehi_no" onkeyup="get_user_details();"/>
	</div>
	
	<div id='form_element_right'>
		<span  class='label'>Name:</span>
		<input type="text" name="name" id="name"/>
	</div>
</div>
<div id='form_wrapper'>
	<div id='form_element'>
		<span  class='label'>Mobile No:</span>
		<input type="text" name="mobile" id="mobile"/>
	</div>
	<div id='form_element_right'>
		<span  class='label'>Email:</span>
		<input type="text" name="email" id="email"/>
	</div>
</div>
<div id='form_wrapper'>
	<div id='form_element1'>
		<div class='oneabel'>Enquiry Type:</div>
		<div class="etypes">
		<div class="etype1"><input type="radio" name="e_type" value="Tyre" class="radio" onclick="$('.details_section').hide();$('#tyres_details').show();">Tyre</div>
		<div class="etype1"><input type="radio" name="e_type" value="Rim" class="radio" onclick="$('.details_section').hide();$('#rim_details').show();">Rim</div>
		<div class="etype1"><input type="radio" name="e_type" value="Battery" class="radio" onclick="$('.details_section').hide();$('#battery_details').show();">Battery</div>
		<div class="etype1"><input type="radio" name="e_type" value="Wiper" class="radio" onclick="$('.details_section').hide();$('#wiper_details').show();">Wiper</div>
		<div class="etype1"><input type="radio" name="e_type" value="Membership" class="radio" onclick="$('.details_section').hide();">Membership</div>
		<div class="etype1"><input type="radio" name="e_type" value="Other" class="radio" onclick="$('.details_section').hide();">Other </div> 
		</div>
	</div>
		
</div>

<div class='form_wrapper details_section' id="tyres_details">
	<div id="form_element1">
	<div style="float:left;">
	<span  class='label'>Item Code:</span>
	<select id="item_codes_select" onchange="changetyres();">
		<option value="0">Select a Value...</option>
		<?php
		for($i=0;$i<sizeof($tyres_codes);$i++){
		?>
			<option value="<?php echo $tyres_codes[$i]; ?>"><?php echo $tyres_codes[$i]; ?></option>
		<?php
		}
		?>
	</select>
	<input type="button" value="Add" onclick="addTyres();">
</div>
<div style="float:right;">
	<table style="width:630px;" class="details_table">
		<tr>
			<th><u>Description</u></th>
			<th style="width:100px;"><u>Balance QTY <br/>(WD)</u></th>
			<th style="width:100px;"><u>Balance QTY<br/>(KB)</u></th>
			<th style="width:100px;">Balance QTY<br/>(TG)</th>
			<th style="width:100px;">Balance QTY <br/>(SHH)</th>
		</tr>
	<tr><td><div id="item_desc"></div></td><td><div id="item_bal_wd"></div></td><td><div id="item_bal_kb"></div></td><td><div id="item_bal_tg"></div></td><td><div id="item_bal_shh"></div></td></tr>
	</table>
</div>
	<div>
		<br>
		<input id="tags_tyres" type="text"  name="tags_tyres"  class="tags" value="" style="display: none;">
</div>
	</div>
</div>
<div class='form_wrapper details_section' id="rim_details">
	<div id="form_element1">
	<div style="float:left;">
	<span  class='label'>Rim:</span>
	<select id="rim_select" onchange="changerim();">
		<option value="0">Select a Value...</option>
		<?php
		for($i=0;$i<sizeof($rim_codes);$i++){
		?>
			<option value="<?php echo $rim_codes[$i]; ?>"><?php echo $rim_codes[$i]; ?></option>
		<?php
		}
		?>
	</select>
	<input type="button" value="Add" onclick="addRim();">
</div>
<div style="float:right;">
	<table style="width:630px;" class="details_table">
		<tr>
			<th><u>Description<u></th>
			<th style="width:100px;">Balance QTY <br/>(WD)</th>
			<th style="width:100px;">Balance QTY<br/>(KB)</th>
			<th style="width:100px;">Balance QTY<br/>(TG)</th>
			<th style="width:100px;">Balance QTY <br/>(SHH)</th>
		</tr>
	<tr><td><div id="rim_desc"></div></td><td><div id="rim_bal_wd"></div></td><td><div id="rim_bal_kb"></div></td><td><div id="rim_bal_tg"></div></td><td><div id="rim_bal_shh"></div></td></tr>
	</table>
	</div>
	<div>
		<br>
		<input id="tags_rims" type="text"  name="tags_rims"  class="tags" value="" style="display: none;">
</div>
	</div>
</div>


<div class='form_wrapper details_section' id="battery_details">
	<div id="form_element1">
	<div style="float:left;">
	<span  class='label'>Battery:</span>
	<select id="battery_select" onchange="changebattery();">
		<option value="0">Select a Value...</option>
		<?php
		for($i=0;$i<sizeof($battery_codes);$i++){
		?>
			<option value="<?php echo $battery_codes[$i]; ?>"><?php echo $battery_codes[$i]; ?></option>
		<?php
		}
		?>
	</select>
	<input type="button" value="Add" onclick="addBattery();">
</div>
<div style="float:right;">
	<table style="width:630px;" class="details_table">
		<tr>
			<th>Description</th>
			<th style="width:100px;">Balance QTY <br/>(WD)</th>
			<th style="width:100px;">Balance QTY<br/>(KB)</th>
			<th style="width:100px;">Balance QTY<br/>(TG)</th>
			<th style="width:100px;">Balance QTY <br/>(SHH)</th>
		</tr>
	<tr><td><div id="battery_desc"></div></td><td><div id="battery_bal_wd"></div></td><td><div id="battery_ybal_kb"></div></td><td><div id="battery_bal_tg"></div></td><td><div id="battery_bal_shh"></div></td></tr>
</table>
</div>

	<div>
		<br>
		<input id="tags_batteries" type="text"  name="tags_batteries"  class="tags" value="" style="display: none;">

	</div>
	

	</div>
</div>
<div class='form_wrapper details_section' id="wiper_details">
	<div id="form_element1">
	<div style="float:left;">
	<span  class='label'>Wiper:</span>
	<select id="wiper_select" onchange="changewiper();">
		<option value="0">Select a Value...</option>
		<?php
		for($i=0;$i<sizeof($wiper_codes);$i++){
		?>
			<option value="<?php echo $wiper_codes[$i]; ?>"><?php echo $wiper_codes[$i]; ?></option>
		<?php
		}
		?>
	</select>
	<input type="button" value="Add" onclick="addWiper();">
</div>
<div style="float:right;">
	<table style="width:630px;" class="details_table">
		<tr>
			<th>Description</th>
			<th style="width:100px;">Balance QTY <br/>(WD)</th>
			<th style="width:100px;">Balance QTY<br/>(KB)</th>
			<th style="width:100px;">Balance QTY<br/>(TG)</th>
			<th style="width:100px;">Balance QTY <br/>(SHH)</th></tr>
		<tr><td><div id="wiper_desc"></div></td><td><div id="wiper_bal_wd"></div></td><td><div id="wiper_bal_kb"></div></td><td><div id="wiper_bal_tg"></div></td><td><div id="wiper_bal_shh"></div></td></tr>
	</table>
</div>
	<div>
		<br>
		<input id="tags_wipers" type="text"  name="tags_wipers"  class="tags" value="" style="display: none;">
</div>
	</div>
</div>


<div class='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Customer Comment:</div>
	<textarea name="comment" cols="113" rows="5" style="width: 935px;"></textarea>
	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Follow up:</div>
	<textarea name="folowup" cols="113" rows="5" style="width: 935px;"></textarea>
	</div>
</div>

<div id='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Remark:</div>
		<textarea name="remark" cols="113" rows="5" style="width: 935px;"></textarea>
	</div>
</div>

<div id='form_wrapper'>
	<div id="form_element1">
	<div class="etype2">Status</div>
	    <div class="etype1"><input type="radio" name="status" value="Pending" class="radio">Pending</div>
		<div class="etype1"><input type="radio" name="status" value="Confirmed" class="radio">Confirmed</div>
		<div class="etype3"><input type="radio" name="status" value="Rejected" class="radio">Rejected </div> 
		<input type="text" name="otherremark" value="">
	</div>
</div>

<div id="form_wrapper">
	<div id="form_element1">
<input type="button" name="reset" value="Void" class="reset">
<input type="submit" name="submit" value="Save" class="save">
</div>
</div>
</form>	
</div>
</div>
<!--end wrapper!-->
<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}


function validate_form(thisform){
	with (thisform)
	  {
		if (validate_required(vehi_no,"Please enter your vehicle number.")==false)
	  {vehi_no.focus();return false;}
 	  if (validate_required(name,"Please enter your name.")==false)
	  {name.focus();return false;} 	
	  if (validate_required(mobile,"Please enter your mobile number.")==false)
	  {mobile.focus();return false;}
	  if (validate_required(email,"Please enter your email address.")==false)
	  {email.focus();return false;}



	  }
}


    $(document).ready(function() {
      $('.details_section').hide();
      jQuery('#tags_tyres').tagsInput({
			'height':'auto',
			'width':'913px',
			'interactive':false,
			'defaultText':'',
		    });


      jQuery('#tags_rims').tagsInput({
			'height':'auto',
			'width':'913px',
			'interactive':false,
			'defaultText':'',
		    });


      jQuery('#tags_batteries').tagsInput({
			'height':'auto',
			'width':'913px',
			'interactive':false,
			'defaultText':'',
		    });


      jQuery('#tags_wipers').tagsInput({
			'height':'auto',
			'width':'913px',
			'interactive':false,
			'defaultText':'',
		    });

      });
</script>
</body>
</html>