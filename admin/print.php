<?php
session_start();
require('fpdf/fpdf.php');
include_once('connect.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	$fromdate = $_SESSION['fromdate'];
	$todate = $_SESSION['todate'];
	$cid = $_SESSION['cid'];
	$enquiry_type = $_SESSION['enquiry_type'];
	$membership = $_SESSION['membership'];
	$name = $_SESSION['name'];
	$status = $_SESSION['status'];
   	$main_query = "SELECT id,e_id, enquiry_date,cid,name,e_type,status,membership FROM enquiry where 1=1";
    $where = "";
    if(strlen($fromdate)>4){
      $where .= " and enquiry_date>='$fromdate'";

    }
    if(strlen($todate)>4){
      $where .= " and enquiry_date<='$todate'";
    }

    if(strlen($customer_id)>0){
      $where .= " and cid LIKE '%$customer_id%'";
    }

    if(strlen($enquiry_type)>0){
      $where .= " and e_type='$enquiry_type'";
    }

    if(strlen($membership)>0){
      $where .= " and membership='$membership'";
    }

    if(strlen($name)>0){
      $main_query .= " and name LIKE '%$name%'";
    }
    if(strlen($status)>0){
      $where .= " and status='$status'";
    }

    $main_query .= $where;
    $main_query .= " ORDER BY e_id ASC ";
	// Read file lines
	$lines = file($file);
	$data = array();
	$result = mysql_query($main_query) or die(mysql_error());
	while($row = mysql_fetch_row($result))
	{
		$data[] = array($row['0'],$row['1'],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
	}
	return $data;
}

// Colored table
function FancyTable($header, $data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(8, 20, 25, 25,40,25,20,25);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[5],6,$row[2],'LR',0,'L',$fill);
		$this->Cell($w[6],6,$row[3],'LR',0,'L',$fill);
		$this->Cell($w[7],6,$row[3],'LR',0,'L',$fill);

		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('ID', 'Ref No.', 'Date', 'Customer ID','Name','Enquiry Type','Status','Membership');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
