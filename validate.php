<?php

$host="localhost";
$user="root";
$password="";
$dbname="user_details";

$con=mysqli_connect($host,$user,$password,$dbname);


if(isset($_POST["uname"])){
	$username=$_POST["uname"];
	$password=$_POST["password"];

    $sql="select * from register where uname='".$username."'AND upswd1='".$password."' limit 1";

    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==1){
    	include "index.html";
    	exit();
    }
    else{ 
    	echo "you have entered incorrect password";
    	exit();
    }

}
?>