
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/myusedcarcss.css" rel="stylesheet" type="text/css">
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


   
<body>
<div class="list">
<?php
require_once('service.php');
$obj=new sam();
session_start();
$regid=$_SESSION['regerid'];
$field='regid';
$res=$obj->selectdata('sellurcar',$field,$regid);
echo "<div class='list'>";
while($result=mysql_fetch_array($res))
{
	
	
					$name=$result['name'];
					$condition="id='$name'";
					$res1=$obj->selectdatawhere('carbrand',$condition);
					while($rowmake=mysql_fetch_array($res1))
					{
						$name=$rowmake['name'];
					}
				
				$model=$result['model'];
				$condition="id='$model'";
				$res2=$obj->selectdatawhere('carmodels',$condition);
				while($rowmodel=mysql_fetch_array($res2))
				{
					$model=$rowmodel['name'];
				}
				
					$version=$result['series'];
					$condition="id='$version'";
					$res55=$obj->selectdatawhere('carseries',$condition);
					while($rowversion=mysql_fetch_array($res55))
					{
						$series=$rowversion['name'];
					}
					$city=$result['city'];
					$condition="id='$city'";
					$res55=$obj->selectdatawhere('cities',$condition);
					while($cityrow=mysql_fetch_array($res55))
					{
						$city=$cityrow['name'];
					}
			
	echo "<table bordercolor='#F00E12' >";
echo "<tr><td>Registered Id is ".$id=$result['id']."</td></tr>";
 $pict=$result['image'];
	 $pic=explode(",",$pict);
	$c=count($pic);
		echo"<tr><td>";
		for($i=0;$i<$c-1;$i++)	
		
									{
								      echo "<img src='images/$pic[$i]' height='200px' width='200px'>";
	

	}

echo "<tr><td>Company ".$name."</td></tr>";

echo "<tr><td>Model ".$model."</td></tr>";
echo "<tr><td>Version ".$series."</td></tr>";
echo "<tr><td>Price  Rs".$price= $result['exprice']."</td></tr>";
echo "<tr><td>Kilometers ".$km= $result['kmdrive']."</td></tr>";
echo "<tr><td>City ".$city= $city."</td></tr>";


echo "<td> <a href='sellcaredit.php?ids=$result[id]'> Edit </a> ";
echo "<br>";
echo " <a href='delete.php?ids=$result[id]'> Delete </a></td> </tr>";


}
echo "</div>";
?>




    
    
   </center></div> 
    
</body>
</html>

</body>
</html>