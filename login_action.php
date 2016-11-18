<?php
require_once('service.php');
$obj=new sam();
session_start();
if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$field="email,pass";
	$value="'$email','$pass'";
		$condition=" email='$email' && pass='$pass' ";
		$res=$obj->selectdatawhere('log',$condition);
	
	 $rows=mysql_num_rows($res);
	
	 
	 if($rows>0)
	 {
		$row=mysql_fetch_object($res);
		 $id=$row->id;
		  $email=$row->email;
		  $pass=$row->pass;
		 $regerid=$row->regid;		
		
		header("location:myprofile.php");
	$_SESSION['regerid']=$regerid;
		
	 }
	else
	{ 
	 echo "<script type='text/javascript'>alert('Invalid username and Password!')</script>";
	 header( "refresh:0.5;url=Homepage.php" );
	}
	}

?>