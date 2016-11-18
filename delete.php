<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
require_once('service.php');
$obj=new sam();
echo $passid=$_GET['ids'];
$field="id";
$res=$obj->deletedata('sellurcar',$field,$passid);
mysql_query($sql);
header("Location:myusedcarlist.php");
?>
</body>
</html>