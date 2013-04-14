<?php
include_once('connect.php');
$enquiry_id =$_GET['id'];
if($enquiry_id ==''){
	//echo $enquiry_id;
	echo '<h1>Invalid Enquiry. Please try again.</h1>';
	exit();
}else{
	//echo $enquiry_id;
	$query = "Select id,e_id, enquiry_date,cid,name,e_type,status,membership,phone,email from enquiry where e_id='$enquiry_id'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_row($result))
		{
			$id = $row[0];
			$e_id = $row[1];
			$e_date = $row[2];
			$cid = $row[3];
			$name = $row[4];
			$e_type = $row[5];
			$status = $row[6];
			$membership = $row[7];
			$phohe = $row[8];
			$email = $row[9];


		}
	}else{
		echo '<h1>Invalid Enquiry. Please try again.</h1>';
		exit();
	}
}

?>
<div style="width:400px;">
	<div class="viewdetails">
		<div class="viewleft">Date:</div><div class="viewleft"><?php echo $e_date; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Ref No.:</div><div class="viewleft"><?php echo $e_id; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Vehicle No.:</div><div class="viewleft"><?php echo $cid; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Membership:</div><div class="viewleft"><?php echo $membership; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Name:</div><div class="viewleft"><?php echo $name; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Phone:</div><div class="viewleft"><?php echo $phone; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Email:</div><div class="viewleft"><?php echo $email; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Enquiry Type:</div><div class="viewleft"><?php echo $e_type; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft">Status:</div><div class="viewleft"><?php echo $status; ?></div>
	</div>





</div>
