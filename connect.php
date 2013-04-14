
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbh=mysql_connect($dbhost, $dbuser,$dbpass) or die('Cannot connect to the database because: ' . mysql_error());
$dbname = 'hankook';
mysql_select_db($dbname);

?>