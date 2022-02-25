<?php
error_reporting(0);
$user = "user"; //Enter the user name
$password = "password"; //Enter the password
$host = "host"; //Enter the host
$dbase = "user_details"; //Enter the database
$table = "table"; //Enter the table name


$submit= $_POST['submit'];
$uname = $_POST['uname'];
$email  = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2'];

$connection= mysql_connect ($user, $password,$host,$dbase);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}

mysql_select_db($database, $connection);

$username_table= mysql_query( "SELECT username FROM $table WHERE username= '$uname'" ) 
or die("SELECT Error: ".mysql_error()); 


$count= mysql_num_rows($username_table);


if (!empty($uname) || !empty($email) || !empty($upswd1) || !empty($upswd2) )
{
if ($count == 0)
{
mysql_query("INSERT INTO $table (uname, email, upswd1,upswd2)
VALUES ('$uname', '$email', '$upswd1', '$upswd2')");
$check= 1;
}
}

mysql_close($connection);

?>
