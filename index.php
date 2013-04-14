<?php include ('main_head.php');  ?>
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

	$query = "Select a.code,a.descb from Item as a, Item_Category as b where a.icat=b.code and b.code='HAN'";
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
<form id='enquiry_form'>
<div id='form_wrapper'>
	<div id='form_element'>
		<span class='label'>Date:</span>
		<?php print date("m-d-y");?>
	</div>
	<div id='form_element'>
		<span  class='label'>Vehicle No:</span>
		<input type="text" name="vehi_no" id="vehi_no" onkeyup="get_user_details();"/>
	</div>
</div>
<div id='form_wrapper'>
	<div id='form_element'>
		<span  class='label'>Member:</span>
		<input type="radio" name="member" id="member" value="yes"  onclick="">Yes
		<input type="radio" name="member" value="no" checked="checked">No
	</div>
	<div id='form_element'>
		<span  class='label'>Name:</span>
		<input type="text" name="name" id="name"/>
	</div>
</div>
<div id='form_wrapper'>
	<div id='form_element'>
		<span  class='label'>Mobile No:</span>
		<input type="text" name="mobile" id="mobile"/>
	</div>
	<div id='form_element'>
		<span  class='label'>Email:</span>
		<input type="text" name="email" id="email"/>
	</div>
</div>
<div id='form_wrapper'>
	<div id='form_element1'>
		<div class='oneabel'>Enquiry Type:</div>
		<div>
		<input type="radio" name="e-type" value="tyre" class="radio">Tyre
		<input type="radio" name="e_type" value="rim" class="radio">Rim
		<input type="radio" name="e-type" value="battery" class="radio">Battery
		<input type="radio" name="e_type" value="wiper" class="radio">Wiper
		<input type="radio" name="e-type" value="membership" class="radio">Membership
		<input type="radio" name="e_type" value="other" class="radio">Other  <input type="text" name="other" value="">
		</div>
	</div>
		
</div>
<select id="items">

	</select>
<div id='form_wrapper'>
	<div id="form_element">
	<span  class='label'>Item Code:</span>
	<select id="item_codes_select">
		<option value="0">Select a Value...</option>
		<?php
		for($i=0;$i<sizeof($tyres_codes);$i++){
		?>
			<option value="<?php echo $tyres_codes[$i]; ?>"><?php echo $tyres_codes[$i]; ?></option>
		<?php
		}
		?>
	</select>
	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element">
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
	<div id="rim_desc"></div>
	<div id="rim_bal_wd"></div>
	<div id="rim_bal_kb"></div>
	<div id="rim_bal_tg"></div>
	<div id="rim_bal_shh"></div>



	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element">
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
	<div id="battery_desc"></div>
	<div id="battery_bal_wd"></div>
	<div id="battery_ybal_kb"></div>
	<div id="battery_bal_tg"></div>
	<div id="battery_bal_shh"></div>

	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element">
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
	<div id="wiper_desc"></div>
	<div id="wiper_bal_wd"></div>
	<div id="wiper_bal_kb"></div>
	<div id="wiper_bal_tg"></div>
	<div id="wiper_bal_shh"></div>
	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Customer Comment:</div>
	<textarea name="comment" cols="110" rows="5"></textarea>
	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Follow up:</div>
	<textarea name="folowup" cols="110" rows="5"></textarea>
	</div>
</div>
<div id='form_wrapper'>
	<div id="form_element1">
	<div  class='twolabel'>Remark:</div>
	Status
	        <input type="radio" name="remark" value="Pending" class="radio">Pending
		<input type="radio" name="remark" value="Confirmed" class="radio">Confirmed
		<input type="radio" name="remark" value="Rejected" class="radio">Rejected  <input type="text" name="otherremark" value="">
	</div>
</div>
<input type="button" name="reset" value="Reset">
<input type="submit" name="submit" value="Save">
</form>	
</div>
</div>
<!--end wrapper!-->
<script type="text/javascript">
// battery_selected();
</script>
</body>
</html>