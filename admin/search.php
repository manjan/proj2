<?php include ('main_head.php');  ?>
<?php
if($_POST['search']!="")
{
   $customer_id = $_POST['cust_id'];
   $dated = $_POST['date'];
   $status = $_POST['status'];
   $enquiry_type = $_POST['enq_type'];
   $name = $_POST['cust_name'];
   $membership = $_POST['membership'];
   $enq_id =$_POST['enq_id'];
   $query_count = "SELECT count(*) FROM enquiry where 1=1 ";
   $main_query = "SELECT id,e_id, enquiry_date,cid,name,e_type,status,membership FROM enquiry where 1=1";
    $where = "";
    if(strlen($dated)>4){
      $where .= " and date='$dated'";
    }

    if(strlen($enq_id)>0){
      $where .= " and e_id='$enq_id'";
    }


    if(strlen($customer_id)>0){
      $where .= " and cid LIKE '%$customer_id%'";
      $_SESSION['cid'] = $customer_id;
    }

    if(strlen($enquiry_type)>0){
      $where .= " and e_type='$enquiry_type'";
      $_SESSION['enquiry_type'] = $enquiry_type;
    }

    if(strlen($membership)>0){
      $where .= " and membership='$membership'";
      $_SESSION['membership'] = $membership;
    }

    if(strlen($name)>0){
      $main_query .= " and name LIKE '%$name%'";
      $_SESSION['name'] = $name;
    }

    if(strlen($status)>0){
      $where .= " and status='$status'";
      $_SESSION['status'] = $status;
    }

    $main_query .= $where;
    $query_count .= $where;
       $main_query .= " ORDER BY e_id ASC ";
}else{
    $main_query = "SELECT id,e_id, enquiry_date,cid,name,e_type,status,membership FROM enquiry  ORDER BY e_id ASC";
    $query_count = "SELECT COUNT(*) FROM enquiry";
}
?>
<div id='content'>
  <form id="report" action="search.php" method="POST">
    <table>
        <tr><th>Date</th><th>Ref. No</th><th>Customer ID</th><th>Name</th><th>Enquiry Type</th><th>Membership</th><th>Status</th><th>Action</th></tr>
        <tr><td><input type="text" name="date" id="date"></td>
        <td><input type="text" name="enq_id" id="enq_id"></td>
         <td><input type="text" name="cust_id" id="cust_id"></td>
          <td><input type="text" name="cust_name" id="cust_name"></td>
           <td><select name='enq_type'>
           <option value="Tyre">Tyre</option>
           <option value="Rim">Rim</option>
           <option value="Battery">Battery</option>
           <option value="Wiper">Wiper</option>
           <option value="Membership">Membership</option>
           <option value="Other">Other</option>
           </select></td>
            <td><select name='membership' id='membership'>
            <option value="yes">Yes</option>
           <option value="no">No</option></select></td>
             <td><select name='status' id='status'>
                 <option value="Pending">Pending</option>
           <option value="Confirmed">Confirmed</option>
            <option value="Rejected">Rejected</option>
             </select></td>
             <td><input type="submit" value="Search" name="search" style="cursor:pointer;"></td>
        </tr>

        <?php
          $query = $main_query;
          $result = mysql_query($query) or die(mysql_error());

          while($row = mysql_fetch_row($result))
          {
            echo "<tr style='text-align: center;'>";
            echo "<td>$row[2]</td>
            <td>$row[1]</td><td>$row[3]</td><td>$row[4]</td>
            <td>$row[5]</td><td>$row[7]</td><td>$row[6]</td><td></td>

            </tr>\n";
          }

        ?>
    </table>
  </form>
</div>
</div>
</body>
</html>