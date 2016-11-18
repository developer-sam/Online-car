<?php 
require_once('service.php');

$obj=new sam();
$res=$obj->viewdata('carbrand');

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
		alert(model_id);
		var strURL="findmodel.php?model="+model_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('modeldiv').innerHTML=req.responseText;
												
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
</head>

<body>
<form method="post" action="" name="form1">

<table width="45%"  cellspacing="0" cellpadding="0">
  <tr>
  <th>Select Brand:</th>
    <td><select name="name" onChange="getmodel(this.value)">
	<option value="">Select brand</option>
	<?php while ($row=mysql_fetch_array($res)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } ?>
	</select></td>
  </tr>
  <tr>
    <td>model</td>
    <td ><div id="modeldiv"><select name="model" >
	<option>Select model</option>
        </select></div></td>
  </tr>
</table>
<form>
</body>
</html>