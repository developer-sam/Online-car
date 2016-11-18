<?php 
require_once('service.php');

$obj=new sam();
$res=$obj->viewdata('countries');

if(isset($_POST['submit']))
{
 $fname=$_POST['fname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
 
$mob=$_POST['mob'];
$phone=$_POST['phone'];
$name=$_POST['name'];
$state=$_POST['state'];
$city=$_POST['city'];
$address=$_POST['address'];
$pin=$_POST['pin'];
	
	$field="fname,email,mob,phone,name,state,city,address,pin";
			$value="'$fname','$email','$mob','$phone','$name','$state','$city','$address','$pin'";

				$res1=$obj->insertdata('register',$field,$value);
			
					$id=mysql_insert_id();
			$field1="regid,email,pass";
			$value1="'$id','$email','$pass'";
				
				$res1=$obj->insertdata('log',$field1,$value1);
				/*echo "<script type='text/javascript'>alert('Registered successfully!')</script>";*/ 
			header("location:Homepage.php");
}
 ?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css/registrationcss.css" rel="stylesheet" type="text/css">
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
		
		var strURL="findState.php?country="+country_id;
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
		var strURL="findCity.php?state="+state_id;
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
    <div class="container">
<body>
<form method="post" action="" >
<center>
<table border="1">
<tr><th>Name</th><td><input type="text" name="fname" required="1" value=""></td></tr>
<tr><th>Email</th><td><input name="email" type="text" required="1" id="email"/></td></tr>
 <tr><th>Confirm Email</th><td><input name="emailConfirm" type="text" id="confemail" onblur="confirmEmail()"/></td></tr>
 <tr><th>Password</th><td><input name="pass" type="text" required="1" id="pass"/></td></tr>
 <tr><th>Confirm Password</th><td><input name="passConfirm" type="text" id="confpass" onblur="confirmpass()"/></td></tr>
 <tr><th>Mobile No.</th><td><input name="mob" type="text"  required="1" value=""/></td></tr>
<tr><th>Phone No.</th><td><input name="phone" type="text" required="1" value=""/></td></tr>
<tr><th>Country</th><td><select name="name" onChange="getState(this.value)">
	<option value="">Select Country</option>
	<?php /*while ($row=mysql_fetch_array($res)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } */?>
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
<tr><th>Street/Address</th><td> <textarea name="address" required></textarea></td></tr>
<tr><th>Postal Code</th><td><input name="pin" type="text" required="1" value=""/></td></tr>
</table>
<center><input type="submit" name="submit" value="Register"/>
</form>
</center></div>
</div>

</body>
</html>