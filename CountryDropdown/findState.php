<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->


<?php $country=intval($_GET['country']);
$con = mysqli_connect('localhost', 'root', 'compass'); 
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,'test');
$query="SELECT id,statename FROM state WHERE countryid='$country'";
$result=mysqli_query($con,$query);

?>
<select name="state" onchange="getCity(<?php echo $country?>,this.value)">
<option>Select State</option>
<?php while ($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['statename']?></option>
<?php } ?>
</select>
