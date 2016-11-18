<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
if(session_destroy())
{
	session_unset();
	header("location:homepage.php");
}

?>
</body>
</html>