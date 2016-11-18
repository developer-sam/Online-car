<?php 
require_once('service.php');
$model=intval($_GET['model']);

$obj=new sam();
$fields="makes_id";
$values=$model;
$res=$obj->viewonlysomewhere('carmodels',$fields,$values);


?>
<select name="model" onchange="getseries(this.value)">
<option>Select model</option>
<?php while ($row=mysql_fetch_array($res)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>

