
<?php
require_once('service.php');
$seriesId=intval($_GET['series']);
$obj=new sam();
$field="id";
$value="$seriesId";
$res1=$obj->viewdatawhere('carmodels',$field,$value);
$row1=mysql_fetch_array($res1);
$values=$row1['makes_id'];
$fields="series_id";
//$values=$seriesId;
$res=$obj->viewonlysomewhere('carseries',$fields,$values);


?>
<select name="series">
<option>Select Series</option>
<?php while($row=mysql_fetch_array($res)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>
