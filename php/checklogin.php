<?php

include 'vars.php';
session_start();

//Connect to the server, and select the database
$conn = new mysqli($host,$username, $password,$db_name);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

//POST username and password sent from form
$myusername =$_POST["email"];
$mypassword =$_POST["password"];
	//echo $myusername;
	//echo $mypassword;

//Prevent SQL injections
$myusername = stripcslashes($myusername);
$mypassword = stripcslashes($mypassword);

$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

// SQL query
//$sql = "SELECT * FROM $tbl_name WHERE eMail={$myusername} and Password = {$mypassword}";
$sql = "SELECT * FROM $tbl_name WHERE eMail='{$myusername}' and Password = '{$mypassword}'";
$result =$conn->query($sql);

if ($result === false)
{
	  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} 
else 
{
  $rows_returned = $result->num_rows;
}
if($rows_returned == 1)
{
	//session_register("$myusername");
	//session_register("$mypassword");
	$_SESSION['username'] = $myusername;
	//$_SESSION['password'] = '$mypassword';
	header("location:index.php");
}
else
{
	echo "Wrong E-mail or Password";
	unset($_SESSION['username']);
}

?>