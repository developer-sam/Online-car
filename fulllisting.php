<html>
<head>
<meta charset="utf-8">
<title>Full Listing</title>

<link href="css/fulllistingcss.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://www.formmail-maker.com/var/demo/jquery-popup-form/jquery.colorbox-min.js"></script>
 <script src="scripts/jquery.min.js"></script>
   
	<script src="scripts/lightbox.min.js"></script>
    
 
	<link href="css/lightbox.css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
                $(".iframe").colorbox({iframe:true, fastIframe:false, width:"450px", height:"480px", transition:"fade", scrolling   : false});
            });
        </script>
        
        
        <style>
            #cboxOverlay{ background:#DFDFDF; }
        </style>
</head>
<div class="wraper">
	<div class="header">
   <link href="viewlisting.css" rel="stylesheet" type="text/css">

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
$resfull=$obj->viewdata('sellurcar');
 		$row1=mysql_fetch_array($resfull) ;
		  
		  $name=$row1['name'];
		  $model=$row1['model'];
		  $series=$row1['series'];
		  
		  if(($name!="")&&($model!="")&&($series!=""))
		  {
			  
			  
			  
 				
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
				$res=$obj->selectdatawhere('carmodels',$condition);
				while($rowmodel=mysql_fetch_array($res))
				{
					$model=$rowmodel['name'];
				}
				
					$version=$row['series'];
					$condition="id='$series'";
					$res55=$obj->selectdatawhere('carseries',$condition);
					while($rowversion=mysql_fetch_array($res55))
					{
						$series=$rowversion['name'];
					}
					
					echo "<tr><td><a class='iframe' href='popupmessage.php?regid=$carid' target='_blank' style='text-decoration:none'><button type='button'>CONTACT SELLER</a></td></tr>";
				echo "<tr><td><h1>".$name." ".$model." ".$series."</h1></td></tr>";
				$image=$row['image'];
				$pict=$row['image'];
	 $pic=explode(",",$pict);
	$c=count($pic);
		for($i=0;$i<$c-1;$i++)
									{
										echo "<a href='images/$pic[$i]' data-lightbox='roadtrip'><img src='images/$pic[$i]' height='200px' width='200px' ></a>";
		
								     //  echo  "<img src='images/$pic[$i]' height='200px' width='200px'>";
	

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
    ?>

</body>
</html>