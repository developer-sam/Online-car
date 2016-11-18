<?php 
require_once('service.php');

$obj=new sam();
$res1=$obj->viewdata('cities');
$res=$obj->viewdata('carbrand');
session_start();
$regid=$_SESSION['regerid'];

if(isset($_POST['submit']))
{
 $city=$_POST['city'];
$pin=$_POST['pin'];
$year=$_POST['year'];
 
$name=$_POST['name'];
$model=$_POST['model'];
$series=$_POST['series'];
$kmdrive=$_POST['kmdrive'];
$owners=$_POST['owners'];
$exprice=$_POST['exprice'];
$sname=$_POST['sname'];
$email=$_POST['email'];
$mob=$_POST['mob'];
	
	$field="regid,city,pin,year,name,model,series,kmdrive,owners,exprice,sname,email,mob";
	$value="'$regid','$city','$pin','$year','$name','$model','$series','$kmdrive','$owners','$exprice','$sname','$email','$mob'";

				$res1=$obj->insertdata('sellurcar',$field,$value);
			
				$id=mysql_insert_id();	
			$_SESSION['newid']=$id;
			header("location:sellurcar2.php");
}
 ?>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/sellurcar.css" rel="stylesheet" type="text/css">
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


  <script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();//The XMLHttpRequest object is used to exchange data with a server behind the scenes
		}
		catch(e)	{		
			try{	//All modern browsers (IE7+, Firefox, Chrome, Safari, and Opera) have a built-in XMLHttpRequest object.
		
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{ //To handle all modern browsers, including IE5 and IE6, check if the browser supports the XMLHttpRequest object. If it does, create an XMLHttpRequest object, if not, create an ActiveXObject:
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }

	
				function getmodel(model_id) {		
	
		var strURL="findmodel.php?model="+model_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('modeldiv').innerHTML=req.responseText;
						document.getElementById('seriesdiv').innerHTML='<select name="series">'+
						'<option>Select series</option>'+
				        '</select>';						
												
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

	function getseries(series_id) {		
		var strURL="findseries.php?series="+series_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('seriesdiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>     
<body>
<form method="post" action="" >
<center>
<table bordercolor="#F4070B">
<tr><th>JUST FILL YOUR DETAILS AND GET STARTED<br></th></tr>
 <tr><th>City</th>
 <td><select name="city">
<option value="">Select your city</option>
<?php
/*while($fetch=mysql_fetch_object($res1))
{
	?> <option value="<?php echo $fetch->id;?>"><?php echo $fetch->name;
	?></option>
 <?php   
}*/
?></td></tr>
<tr><th>Postal Code</th><td><input name="pin" type="text" required="1" value=""/></td></tr>
<tr><th>CAR INFORMATION</th></tr>
<tr> <th>Select Year: </th><td> <select name="year">
        						<option hidden="">--year--</option>
                    <?php for($i=2000;$i<=2015;$i++) {?>
        			<option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                    </select></td></tr>
   <tr><th>Select Brand:</th><td>  <select name="name" onChange="getmodel(this.value)">
	<option value="">Select brand</option>
	<?php while ($row=mysql_fetch_array($res)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } ?>
	</select></td></tr>
 <tr><th>Model</th>
   <td ><div id="modeldiv"><select name="model" >
	<option>Select model</option>
        </select></div></td>
  </tr>
   <tr><th>Series</th>
   <td ><div id="seriesdiv"><select name="series" >
	<option>Select Series</option>
        </select></div></td>
  </tr>
  
  <tr><th>Kms Driven</th><td><input name="kmdrive" type="text" required="1" value=""/></td></tr>
  <tr> <th>No of Owners:</th><td> <select name="owners">
        						<option value="">--select--</option>
                    <?php for($i=1;$i<=10;$i++) {?>
        			<option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                    </select></td></tr>
   <tr><th>Expected Price</th><td><input name="exprice" type="text" required="1" value=""/></td></tr>
  <tr><th>CONTACT INFORMATION</th></tr>
  <tr><th>Name</th><td><input type="text" name="sname" required="1" value=""></td></tr>
<tr><th>Email Id</th><td><input name="email" type="text" required="1" id="email"/></td></tr>
<tr><th>Mobile No.</th><td><input name="mob" type="text"  required="1" value=""/></td></tr>
</table>
<input type="checkbox" name="accept" checked>I have read and agree to the termsof Use and Privacy Policy.<br>
 <center><input type="submit" name="submit" value="Post"></center></div>
</form>
</body>
</html>