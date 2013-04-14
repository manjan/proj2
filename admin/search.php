<?php include ('main_head.php');  ?>
<div id='content'>
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
             <td><input type="submit" value="Search" name="search"></td>
        </tr>
    </table>
</div>
</div>
</body>
</html>