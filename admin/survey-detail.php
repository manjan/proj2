<?php
include_once('main_head.php');
$sql = "select date from survey order by date asc limit 1";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
  $mindate = $row['date'];
}
$sql1 = "select date from survey order by date desc limit 1";
$result1 = mysql_query($sql1) or die(mysql_error());
while($row1 = mysql_fetch_array($result1))
{
  $maxdate = $row1['date'];
}
$sql2="Select * from survey";
$result2=mysql_query($sql2) or die('Error: ' . mysql_error());
$num = mysql_num_rows($result2);

$sql3="Select q1 from survey where q1='email'";
$result3=mysql_query($sql3) or die('Error: ' . mysql_error());
$email = mysql_num_rows($result3);
$emailpercent = $email/$num*100;

$sql4="Select q1 from survey where q1='telephone'";
$result4=mysql_query($sql4) or die('Error: ' . mysql_error());
$tel = mysql_num_rows($result4);
$telpercent = $tel/$num*100;

$sql5="Select q1 from survey where q1='others'";
$result5=mysql_query($sql5) or die('Error: ' . mysql_error());
$otherq1 = mysql_num_rows($result5);
$otherq1per = $otherq1/$num*100;

$myarray = array('Knowledge', 'Listening Skill', 'Response Time','Friendliness','Patience','Others');
$myarray_count = array(0,0,0,0,0,0);
$percentage_count = array(0,0,0,0,0,0);
for($i=0;$i<sizeof($myarray);$i++){
  $sql6 = "SELECT * FROM survey WHERE q3aimp LIKE '%". $myarray[$i] ."%'"; 
  $result6=mysql_query($sql6) or die('Error: ' . mysql_error());
  $counts = mysql_num_rows($result6);
  $myarray_count[$i] = $counts;
  $percentage = $counts/$num*100;
  $percentage_count[$i] = $percentage;

}

echo '<br>';
echo $knowledge = mysql_num_rows($result6);
echo $knowledgeper = $knowledge/$num*100;
?>
<div id='content'>
  <div id='contentwrapper'>
   <h1>Report - Results Overview</h1>
   <p><b>Date (from)</b> :  <?php print $mindate;?> </p>
   <p><b>Date (To)</b>:  <?php print $maxdate;?></p>
   <p><b>Total of eSurvey Sent</b>:</p>
   <p><b>Number of eSurvey Responded</b>: <?php print $num;?></p>
   <div id='form_wrapper'>
	<ol>
		<li>
			<div class="ques">How did you last contact our Customer Service ?</div>
			<table>
                         <tr>
                          <td></td>
                          <td>% of Respondents</td>
                          <td>Number of Respondents</td>                          
                         </tr>
                          <tr>
                          <td>Email</td>
                          <td><?php print number_format($emailpercent,2);?></td>
                          <td><?php print $email;?></td>                          
                         </tr>
                          <tr>
                          <td>Telephone</td>
                          <td><?php print number_format($telpercent,2);?></td>
                          <td><?php print $tel;?></td>                          
                         </tr>
                          <tr>
                          <td>Other</td>
                          <td><?php print number_format($otherq1per,2);?></td>
                          <td><?php print $otherq1;?></td>                          
                         </tr>
                        </table>
		</li>
                <li>
			<div class="ques">Overall, how satisfied were you with our Product / Service ?</div>
			<table>
                         <tr>
                          <td></td>
                          <td>% of Respondents</td>
                          <td>Number of Respondents</td>                          
                         </tr>
                          <tr>
                          <td>Very Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                          <tr>
                          <td>Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                          <tr>
                          <td>Average</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                           <tr>
                          <td>Not Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                            <tr>
                          <td>Very Dissatisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                        </table>
		</li>
                 <li>
			<div class="ques">Please rate our Customer Service Representatives in each of the following areas.</div>
			<table>
                         <tr>
                          <td></td>
                          <td>% of Respondents</td>
                          <td>Number of Respondents</td>                          
                         </tr>
                          <tr>
                          <td>Very Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                          <tr>
                          <td>Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                          <tr>
                          <td>Average</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                           <tr>
                          <td>Not Satisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                            <tr>
                          <td>Very Dissatisfied</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                        </table>
		</li>
                   <li>
			<div class="ques">Areas we need to improve most</div>
			<table>
                         <tr>
                          <td></td>
                          <td>% of Respondents</td>
                          <td>Number of Respondents</td>                          
                         </tr>
                          <tr>
                          <td>Knowledge</td>
                          <td><?php print  number_format($percentage_count[0], 2);?></td>
                          <td><?php print $myarray_count[0];?></td>                          
                         </tr>
                          <tr>
                          <td>Listening Skill</td>
                          <td><?php print  number_format($percentage_count[1], 2);?></td>
                          <td><?php print $myarray_count[1];?></td>                              
                         </tr>
                          <tr>
                          <td>Response Time</td>
                          <td><?php print  number_format($percentage_count[2], 2);?></td>
                          <td><?php print $myarray_count[2];?></td>                              
                         </tr>
                           <tr>
                          <td>Friendliness</td>
                          <td><?php print  number_format($percentage_count[3], 2);?></td>
                          <td><?php print $myarray_count[3];?></td>                              
                         </tr>
                            <tr>
                          <td>Patience</td>
                          <td><?php print  number_format($percentage_count[4], 2);?></td>
                          <td><?php print $myarray_count[4];?></td>                               
                         </tr>
                        </table>
		</li>
                    <li>
			<div class="ques">Would you recommend our Product / Service to your Business Associates ?</div>
			<table>
                         <tr>
                          <td></td>
                          <td>% of Respondents</td>
                          <td>Number of Respondents</td>                          
                         </tr>
                          <tr>
                          <td>YES</td>
                          <td></td>
                          <td></td>                          
                         </tr>
                          <tr>
                          <td>NO</td>
                          <td></td>
                          <td></td>                          
                         </tr>                         
                        </table>
		</li>
        </ol>
   </div>
  </div>
</div>
</div>
<!--end wrapper!-->
</body>
</html>