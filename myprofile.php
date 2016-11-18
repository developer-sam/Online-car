<?php 
require_once('service.php');

$obj=new sam();
$res1=$obj->viewdata('countries');
session_start();
$regid=$_SESSION['regerid'];
$fields="id";
$res=$obj->selectdata('register',$fields,$regid);
$fet=mysql_fetch_object($res);

if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$email=$_POST['email']; 
$mob=$_POST['mob'];
$phone=$_POST['phone'];
$name=$_POST['name'];
$state=$_POST['state'];
$city=$_POST['city'];
$address=$_POST['address'];
$pin=$_POST['pin'];
	
	$condition1="fname='$fname',email='$email',mob='$mob',phone='$phone',name='$name',state='$state',city='$city',address='$address',pin='$pin'";
			$fields="id";
	$res5=$obj->updatedata('register',$condition1,$fields,$regid);
	
	$condition2="email='$email'";
			$field="regid";
	$res6=$obj->updatedata('log',$condition2,$field,$regid);
	header("location:myprofile.php");
}
 ?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/myprofilecss.css" rel="stylesheet" type="text/css">
</head>
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
	
	function getState(country_id) {		
		
		var strURL="editState.php?country="+country_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;
						document.getElementById('citydiv').innerHTML='<select name="city">'+
						'<option>Select City</option>'+
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
	function getCity(state_id) {		
		var strURL="editCity.php?state="+state_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
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

<script type="text/javascript">
    function confirmEmail() {
        var email = document.getElementById("email").value
        var confemail = document.getElementById("confemail").value
        if(email != confemail) {
            alert('Email Not Matching!');
			document.getElementById("confemail").focus();
        }
    }
	 function confirmpass() {
        var pass = document.getElementById("pass").value
        var confpass = document.getElementById("confpass").value
        if(pass != confpass) {
            alert('Password Not Matching!');
			document.getElementById("confpass").focus();
        }
    }
</script>

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
<form method="post" action="" >
<center>
<table border="1">
<tr><th>Name</th><td><input type="text" name="fname" required="1" value="<?php echo $fet->fname;?>"></td></tr>
<tr><th>Email</th><td><input name="email" type="text" required="1" value="<?php echo $fet->email;?>"/></td></tr>
 <tr><th>Mobile No.</th><td><input name="mob" type="text"  required="1" value="<?php echo $fet->mob;?>"/></td></tr>
<tr><th>Phone No.</th><td><input name="phone" type="text" required="1" value="<?php echo $fet->phone;?>"/></td></tr>
<tr><th>Country</th><td><select name="name" onChange="getState(this.value)">
	<option value="">Select Country</option>
	<?php while ($row=mysql_fetch_object($res1)) 
	{ 
	$nat=$row->id;
	?>
	
     <option value="<?php echo $nat;?>"<?php if($fet->name==$nat) echo "selected";?>><?php echo $row->name;?></option>
	<?php } ?>
	</select></td>
  </tr>
  <tr>
    <th>State</th>
   
    <td ><div id="statediv"><select name="state" >
	<option>Select State</option>
        </select></div></td>
  </tr>
  <tr >
    <th>City</th>
    <td ><div id="citydiv"><select name="city">
	<option>Select City</option>
    
        </select></div></td>
  </tr>
<tr><th>Street/Address</th><td> <textarea name="address" required ><?php echo $fet->address;?></textarea></td></tr>
<tr><th>Postal Code</th><td><input name="pin" type="text" required="1" value="<?php echo $fet->pin;?>"</td></tr>
</table>
<center><input type="submit" name="submit" value="Update"/>
</form>
</center></div>
</div>

</body>
</html>