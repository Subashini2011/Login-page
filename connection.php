<?php

 if (!empty($uname) || !empty($email) || !empty($upswd1) || !empty($upswd2) )
{

  $servername = "localhost";
  $dbname = "login";
  $username = "root";
  $password = "";

$conn = new mysqli ($servername, $dbname, $username, $password);
 
if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT uname From login Where uname= ? Limit 1";
  $INSERT = "INSERT Into login (uname , password)values(?,?)";

}
if ($_SERVER["REQUEST_METHOD"]== "POST") {
  
  $adminname = test_input($_POST["uname"]);
  $password = test_input($_POST["password"]);
  $stmt = $conn->prepare("$INSERT");
  $stmt->execute();
  $users = $stmt->fetchAll();
  
  foreach($users as $user) {
    
    if(($user['uname'] == $uname) &&
      ($user['password'] == $password)) {
        header("Location: login.html");
    }
    else {
      echo "<script language='javascript'>";
      echo "alert('WRONG INFORMATION')";
      echo "</script>";
      die();
    }
  }
}
}
?>
