

<?php 
$country=intval($_GET['country']);
session_start();
$regid=$_SESSION['regerid'];

require_once('service.php');
$obj=new sam();
$fields="country_id";
$values=$country;

$res=$obj->viewonlysomewhere('states',$fields,$values);
$fields1="id";
$values1=$regid;
$res1=$obj->selectdata('register',$fields1,$regid1);
$fet=mysql_fetch_object($res1);

?>
<select name="state" onchange="getCity(this.value)">
<option>Select State</option>

	
    <?php while ($row=mysql_fetch_object($res)) 
	{ 
	$nat=$row->id;
	?>
	
     <option value="<?php echo $nat;?>"<?php if($fet->name==$nat) echo "selected";?>><?php echo $row->name;?></option>
	<?php } ?></select>