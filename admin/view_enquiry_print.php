<?php
include_once('connect.php');
$enquiry_id =$_GET['id'];
if($enquiry_id ==''){
	echo '<h1>Invalid Enquiry. Please try again.</h1>';
	exit();
}else{
	//echo $enquiry_id;
	$query = "Select id,e_id, enquiry_date,cid,name,e_type,status,membership,phone,email,tyres,rims,batteries,wipers,comment,followup,remarks from enquiry where e_id='$enquiry_id'";
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
			$tyres = $row[10];
			$rims = $row[11];
			$batteries = $row[12];
			$wipers = $row[13];
			$comment = $row[14];
			$followup = $row[15];
			$remarks = $row[16];

		}
	}else{
		echo '<h1>Invalid Enquiry. Please try again.</h1>';
		exit();
	}
}

?>
<div style="width:400px;border:1px solid #ccc;padding:10px 10px 20px 10px;">
	<div class="viewdetails">
		<div class="viewleft1">Date:</div><div class="viewleft"><?php echo $e_date; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Ref No.:</div><div class="viewleft"><?php echo $e_id; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Vehicle No.:</div><div class="viewleft"><?php echo $cid; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Membership:</div><div class="viewleft"><?php echo $membership; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Name:</div><div class="viewleft"><?php echo $name; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Phone:</div><div class="viewleft"><?php echo $phone; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Email:</div><div class="viewleft"><?php echo $email; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Enquiry Type:</div><div class="viewleft"><?php echo $e_type; ?></div>
	</div>
	<?php
	if($e_type=='Tyre'){
	?>
	<div class="viewdetails">
		<div class="viewleft1">Tyres:</div><div class="viewleft"><?php echo $tyres; ?></div>
	</div>
	<?php
	}
	?>
	<?php
	if($e_type=='Rim'){
	?>
	<div class="viewdetails">
		<div class="viewleft1">Rims:</div><div class="viewleft"><?php echo $rims; ?></div>
	</div>
	<?php
	}
	?>
	<?php
	if($e_type=='Wiper'){
	?>
	<div class="viewdetails">
		<div class="viewleft1">Wipers:</div><div class="viewleft"><?php echo $wipers; ?></div>
	</div>
	<?php
	}
	?>
	<?php
	if($e_type=='Battery'){
	?>
	<div class="viewdetails">
		<div class="viewleft1">Batteries:</div><div class="viewleft"><?php echo $batteries; ?></div>
	</div>
	<?php
	}
	?>
	<div class="viewdetails">
		<div class="viewleft1">Comment:</div><div class="viewleft"><?php echo $comment; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Follow Up:</div><div class="viewleft"><?php echo $followup; ?></div>
	</div>
	<div class="viewdetails">
		<div class="viewleft1">Remarks:</div><div class="viewleft"><?php echo $remarks; ?></div>
	</div>


	<div class="viewdetails">
		<div class="viewleft1">Status:</div><div class="viewleft" style="color:red;"><?php echo $status; ?></div>
	</div>





</div>
