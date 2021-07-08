<?php
require "../Init/config.php";

$sql="SELECT * FROM User u, Approval a, Result r WHERE u.IdentificationID=r.IdentificationID AND r.Status = '0'";
$uresult = mysqli_query($conn, $sql);

if(mysqli_num_rows($uresult) > 0){?>

<!-- Start table tag -->
<table width="400" border="1" cellspacing="0" cellpadding="3">

  <?php
  while($rows = mysqli_fetch_assoc($uresult)) {

  ?>

<!-- Print table heading -->
<tr>
<td align="left"><b>Name                : </b></td>
<td><?php echo $rows['First_Name'] . " " . $rows['Last_Name']; ?></td>
</tr>

<tr>
<td align="left"><b>Identification ID   : </b></td>
<td><?php echo $rows['IdentificationID']; ?></td>
</tr>

<tr>
<td align="left"><b>Building No         : </b></td>
<td><?php echo $rows['Building_No']; ?></td>
</tr>

<tr>
<td align="left"><b>Room No             : </b></td>
<td><?php echo $rows['Room_No']; ?></td>
</tr>

<tr>
<td align="left"><b>Approved by         : </b></td>
<td><?php echo $rows['ManagerID']; ?></td>
</tr>

<?php }
}

else
{
  echo "No pending records.";
}

mysqli_close($conn);
?>
</table>
