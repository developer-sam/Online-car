<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="#" name="frm" method="POST">

<table>
<tr>
<th style="float:left">Enter The Enquiry Message*:</th>
<td><textarea rows="5" cols="20" name="msg" id="msg"></textarea></td>
</tr>
<tr><td> <input type="submit" value="OK" name="ok"></td></tr>

</table>
</form>
<?php

require_once('service.php');
session_start();
 $obj=new sam();
 $logid=$_SESSION['regerid'];
$id=$_GET['regid'];
if(isset($_POST['ok'])=='OK')
{
	$msg=$_POST['msg'];
	
	$fields="id,regid,message";
    $values="'$id','$logid','$msg'";	
	$obj->insertdata('message',$fields,$values);
	echo "<br>";
	
	
	
	
}
?>
</body>
</html>