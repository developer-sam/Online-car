<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>



<link href="css/searchcss.css" rel="stylesheet" type="text/css">
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


			  
 				    
<?php 

require_once('service.php'); 	
$obj=new sam();
if(isset($_POST['search']))
		{
		  
		   $city=$_POST['city'];
		  if($city!=="")
		  {
			   {
			  
			  $condition="city='$city'";
			  
 				
			
			  $resfull=$obj->selectdatawhere('sellurcar',$condition);
			  
 				
				while($row=mysql_fetch_array($resfull))
				{
					$carid=$row['id'];
		
					$name=$row['name'];
					$condition="id='$name'";
					$res=$obj->selectdatawhere('carbrand',$condition);
					while($rowmake=mysql_fetch_array($res))
					{
						$name=$rowmake['name'];
					}
				
				$model=$row['model'];
				$condition="id='$model'";
				$res1=$obj->selectdatawhere('carmodels',$condition);
				while($rowmodel=mysql_fetch_array($res1))
				{
					$model=$rowmodel['name'];
				}
				
					$version=$row['series'];
					$condition="id='$version'";
					$res2=$obj->selectdatawhere('carseries',$condition);
					while($rowversion=mysql_fetch_array($res2))
					{
						$series=$rowversion['name'];
					}
					
				
				echo "<tr><td><h1>".$name." ".$model." ".$series."</h1></td></tr>";
				$image=$row['image'];
				$pict=$row['image'];
	 $pic=explode(",",$pict);
	$c=count($pic);
		for($i=0;$i<$c-1;$i++)
									{
								       echo  "<img src='images/$pic[$i]' height='200px' width='200px'>";
	

	}echo "<br>";
				echo "<tr><th>price:</th><td>".$row['exprice']."</td></tr>";
				echo "<br>";
				echo "<tr><th>fuel:</th><td>".$row['fuel']."</td></tr>";
				echo "<br>";
				echo "<tr><th>owners:</th><td>".$row['owners']."</td></tr>";
				echo "<br>";
				echo "<tr><th>color:</th><td>".$row['colour']."</td></tr>";
				echo "<br>";
				echo "<tr><th>kms:</th><td>".$row['kmdrive']."</td></tr>";
				echo "<br><br>";
				
				
				
				}
		  }
		  }
		}
				?>
</body>
</html>