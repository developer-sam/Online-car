<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/sellurcar2.css" rel="stylesheet" type="text/css">

</head>
<div class="wraper">
	<div class="header">

    </div>
          <div id="hmenu"> 
<ul>
		<li><a href="homepage.php">MY HOME PAGE</a></li>
    	<li><a href="myusedcarlist.php">MY USED CAR LIST</a></li>
    	
    	<li><a href="sellurcar.php">SELL YOUR CAR</a></li>
    	<li><a href="Viewfulllisting.php">VIEW FULL LISTING</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
	</ul>
    <div class="container">


<body>
<?php 
require_once('service.php');

$obj=new sam();
session_start();
 $regid=$_SESSION['regerid'];
$newid=$_SESSION['newid'];
if(isset($_POST['submit']))
{
	$fuel=$_POST['fuel'];
	$colour=$_POST['colour'];
	$regno=$_POST['regno'];
	$insurance=$_POST['insurance'];
	$tellbuyer= $_POST['tellbuyer'];
	
	$path="images/";
	$c=count($_FILES["photos"]["name"]);
	$p="";
	for($i=0;$i<$c;$i++)
	{
		$target=$path.basename($_FILES["photos"]["name"][$i]);
		$p.=basename($_FILES["photos"]["name"][$i]).",";
		
	    move_uploaded_file($_FILES['photos']['tmp_name'][$i],$target);
		
	}
	
	
 $condition="fuel='$fuel',colour='$colour',regno='$regno',insurance='$insurance',tellbuyer='$tellbuyer',image='$p'";
			$fields="id";
				$res=$obj->updatedata('sellurcar',$condition,$fields,$newid);
					$id=mysql_insert_id();
	
	
	//header("location:more_couples.php");
}


 ?>
<form method="post" action="" enctype="multipart/form-data" >
<center>
<table bordercolor="#F4070B">
 <tr><th>Upload Car Photos *</th><td>
 
 <input type="file" name="photos[]" multiple/></td></tr>
 <tr><th>Listing Details</th></tr>
   <tr><th>Fuel Type</th><td>
   				<select name="fuel">
                <option value="">--Select Fuel--</option>
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                </select>
<tr><th>Colour</th><td>
   				<select name="colour">
                <option value="">--Select colour--</option>
                <option value="Black">Black</option>
                <option value="White">White</option>
                <option value="Blue">Blue</option>
                <option value="Red">Red</option>
                <option value="Violet">Violet</option>
                <option value="Green">Green</option>
                </select>
<tr><th>Registration No.</th><td><input type="text" name="regno" type="text"  required="1" value=""/></td></tr>
<tr><th>Insurance Valid Till</th><td><input type="date" name="insurance" type="text"  required="1" value=""/></td></tr>
<tr><th>Tell buyer Why He should by this car</th><td><textarea name="tellbuyer" ></textarea></td></tr>

</table><br>

 <center><input type="submit" name="submit" value="Submit and View Listing"></center></div>
</form>

</body>
</html>