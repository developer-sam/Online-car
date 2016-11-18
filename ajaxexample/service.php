<?php
class sam
{
	public function sam()
	{
		$con=mysql_connect("localhost","root","");
		mysql_select_db("projectsecond",$con);
	
	}
	public function insertdata($table,$fields,$values)
	{
		echo $sql="insert into $table ($fields) values($values)";
		mysql_query($sql);
		
	}
	public function selectdata($table,$fields,$values)
	{
		$sql="select * from $table where $fields='$values'";
		$res=mysql_query($sql);
		return $res;
	}	
	public function selectdatawhere($table,$condition)
	{
		echo $sql="select * from $table where $condition";
		$res=mysql_query($sql);
		return $res;
	}	
	public function viewdata($table)
	{
		echo $sql="select * from $table ";
		$res=mysql_query($sql);
		return $res;
	}	
	public function viewdatawhere($table,$fields,$values)
	{
		$sql="select * from $table where $fields='$values' ";
		$res=mysql_query($sql);
		return $res;
	}	
	public function viewonlysomewhere($table,$fields,$values)
	{
		$sql="select id,name from $table where $fields='$values' ";
		$res=mysql_query($sql);
		return $res;
	}	
	public function deletedata($table,$fields,$t)
	{
		$sql="delete from $table where $fields='$t'";
		$res=mysql_query($sql);
		return $res;
	}	

	public function updatedata($table,$condition,$fields,$t)
	{
		echo $sql="update $table set $condition where $fields='$t'";
		$res=mysql_query($sql);
		return $res;
	}
	public function searchdata($table,$condition)
	{
		$sql="select * from $table where $condition";
		$res=mysql_query($sql);
		return $res;
	}
	
}
?>