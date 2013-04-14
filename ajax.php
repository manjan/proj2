<?php
include_once('connect.php');

function getItemCodeBalance($item_code,$location){
	$query = "Select* from Item where code='".$item_code."' and location='". $location."'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count>0){
		$qty = 0;
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$qty = $row['balqty'];
		}
		return $qty;
	}else{
		return 0;
	}
}

if($_GET['get_user_details']==1){
	$vehicle_id = $_GET['vehicle_id'];
	$query = "Select* from Acc_Customer where cuid='".$vehicle_id."'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			exit(json_encode(array('success' => 'true','name'=>$row['name'],'email' => $row['email'],
					'phone'=>$row['tel']))
			);
		}
	}else{
		exit(json_encode(array('success' => 'false'))
		);
	}
}

if($_GET['item_details']==1){
	$item_code = $_GET['item_code'];
	$query = "Select* from Item where code='".$item_code."'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	if($count>0){
		$wd_balance = getItemCodeBalance($item_code,'WL');
		$kb_balance = getItemCodeBalance($item_code,'KB');
		$tg_balance = getItemCodeBalance($item_code,'TG');
		$shh_balance = getItemCodeBalance($item_code,'SHH');
		$decription = "ab";
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$description = $row['descb'];
		}

		exit(json_encode(array('success' => 'true','description'=>$description,
				'wd_balance' => $wd_balance,
				'kb_balance' => $kb_balance,
				'tg_balance' => $tg_balance,
				'shh_balance' => $shh_balance,
				))
		);
	}else{
		exit(json_encode(array('success' => 'false'))
		);
	}
}



?>