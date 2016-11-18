<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>



<link href="css/enquiriescss.css" rel="stylesheet" type="text/css">
</head>
<div class="wraper">
	<div class="header">
    
    </div>
       <div id="hmenu"> 
<ul>
		<li><a href="homepage.php">MY HOME PAGE</a></li>
    	<li><a href="myusedcarlist.php">MY USED CAR LIST</a></li>
    	<li><a href="enquiries.php">ENQUIRIES</a></li>
    	<li><a href="sellurcar.php">SELL YOUR CAR</a></li>
    	<li><a href="fulllisting.php">VIEW FULL LISTING</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
	</ul>

    <div class="container">

    <form action="" method="post" enctype="multipart/form-data">
<?php
require_once('service.php');
session_start();
$obj=new sam();
$logid=$_SESSION['regerid'];
$condition="regid='$logid'";
$res=$obj->selectdatawhere('message',$condition);

echo "<table align='center'  bgcolor='#ffff00' border='1'>
    <tr><th>ID</th>    <th>Message</th></tr>";


while($row=mysql_fetch_array($res))
{
	    $msg=$row['message'];
		$id=$row['regid'];

      
	  
        echo "<br><tr><td>".$id."</td>";
	    echo "<td>".$msg."</td><br></tr>";
										
	
	
}
?>
</table>
</form>

</body>
</html>