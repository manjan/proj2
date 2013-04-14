<?php
session_start();
include_once('main_head.php');
if($_POST['search']!="")
{
   $customer_id = $_POST['customerid'];
   $fromdate = $_POST['fromdate'];
   $todate = $_POST['todate'];
   $status = $_POST['status'];
   $enquiry_type = $_POST['enquiry_type'];
   $name = $_POST['customername'];
   $membership = $_POST['membership'];
   $query_count = "SELECT count(*) FROM enquiry where 1=1 ";
   $main_query = "SELECT id,e_id, enquiry_date,cid,name,e_type,status,membership FROM enquiry where 1=1";
    $where = "";
    if(strlen($fromdate)>4){
      $where .= " and enquiry_date>='$fromdate'";
      $_SESSION['fromdate'] = $fromdate;
    }else{
      $_SESSION['fromdate'] = '';
    }

    if(strlen($todate)>4){
      $where .= " and enquiry_date<='$todate'";
      $_SESSION['todate'] = $todate;
    }else{
      $_SESSION['todate'] = '';
    }

    if(strlen($customer_id)>0){
      $where .= " and cid LIKE '%$customer_id%'";
      $_SESSION['cid'] = $customer_id;
    }else{
      $_SESSION['cid'] = '';
    }

    if(strlen($enquiry_type)>0){
      $where .= " and e_type='$enquiry_type'";
      $_SESSION['enquiry_type'] = $enquiry_type;
    }else{
      $_SESSION['enquiry_type'] = '';
    }

    if(strlen($membership)>0){
      $where .= " and membership='$membership'";
      $_SESSION['membership'] = $membership;
    }else{
      $_SESSION['membership'] = '';
    }

    if(strlen($name)>0){
      $main_query .= " and name LIKE '%$name%'";
      $_SESSION['name'] = $name;
    }else{
      $_SESSION['name'] = '';

    }

    if(strlen($status)>0){
      $where .= " and status='$status'";
      $_SESSION['status'] = $status;
    }else{
      $_SESSION['status'] = '';
    }

    $main_query .= $where;
    $query_count .= $where;
       $main_query .= " ORDER BY e_id ASC ";
}else{
    $main_query = "SELECT id, e_id, enquiry_date,cid,name,e_type,status,membership FROM enquiry  ORDER BY e_id ASC";
    $query_count = "SELECT COUNT(*) FROM enquiry";
}
?>
<h1>Report</h1>
<div id='content'>
 <div id='contentwrapper'>

 <div>
  <form id="report" action="index.php" method="POST">
   <div id='element1'>
   <div class="search_ele"><div class="label">  From Date:</div> <input type="text" name="fromdate" id="fromdate"></div>
   <div class="search_ele"> <div class="label">To Date: </div><input type="text" name="todate" id="todate"></div>
    <div class="search_ele"><div class="label">Enquiry Type:</div><select name="enquiry_type">
   <option value="">Select One</option>
   <option value="Tyre">Tyre</option>
   <option value="Rim">Rim</option>
   <option value="Battery">Battery</option>
   <option value="Wiper">Wiper</option>
    <option value="Membership">Membership</option>
   <option value="Other">Other</option>
   </select></div>
   <div class="search_ele"><div class="label"> Status:</div> <select name="status">
   <option value="">Select One</option>
   <option value="Pending">Pending</option>
   <option value="Confirmed">Confirmed</option>
   <option value="Rejected">Rejected</option>
   </select></div>
   </div>
   <div id='element1'>
   <div class="search_ele"><div class="label"> Customer ID:</div><input type="text" name="customerid"></div>
   <div class="search_ele"><div class="label">  Name:</div> <input type="text" name="customername"></div>
    <div class="search_ele"><div class="label"> Membership:</div><select name="membership">
   <option value="">Select One</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select></div>   
    <div class="search_ele">
   <input type="submit" name="search" value="Search"></div>
    </div>
  </form>
 </div>
<?php
include('paginator.class.php');
$query = $query_count; 
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_fetch_row($result);

$pages = new Paginator;
$pages->items_total = $num_rows[0];
$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();
echo '<div id="pagination_top">';
echo $pages->display_pages();
echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
echo '</div>';

echo "<table align='center' class='report'>";
echo "<tr><th>ID</th><th>Ref.No</th><th>Date</th><th>Customer ID</th><th>Name</th><th>Enquiry Type</th><th>Status</th><th>Membership</th></tr>";
$query = $main_query." $pages->limit";

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_row($result))
{
	echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\">
  <td>$row[0]</td>
  <td><a class='fancybox fancybox.ajax' href='view_enquiry.php?id=$row[1]'>$row[1]</a></td><td>$row[2]</td><td>$row[3]</td>
  <td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td>

  </tr>\n";
}
echo "</table>";
echo '<div id="pagination_bottom" style="margin-top:10px;">';
echo $pages->display_pages();
echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
echo '</div>';
?>
 </div>
</div>
</div>
<!--end wrapper!-->
<script>
    $(document).ready(function() {
      $('.fancybox').fancybox();

      });
  $(function() {
    $( "#fromdate" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd"
    });

    $( "#todate" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd"
    });

  });
  </script>
</body>
</html>