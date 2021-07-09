<?php
require "../Init/config.php";

$sql="SELECT * FROM User u, Result r WHERE u.IdentificationID=r.IdentificationID AND r.Status = '0'";
$pen_result = mysqli_query($conn, $sql);

if(mysqli_num_rows($pen_result) > 0){?>

<!-- Start table tag -->
<table width="600" border="1" cellspacing="0" cellpadding="3">


<!-- Print table heading -->
<tr>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Identification ID</strong></td>
<td align="center"><strong>Building No</strong></td>
<td align="center"><strong>Room No</strong></td>
<td align="center" colspan="2"><strong>Approval</strong></td>
</tr>

<?php
while($rows = mysqli_fetch_assoc($pen_result)) {

?>


<tr>
  <td><?php echo $rows['First_Name'] . " " . $rows['Last_Name']; ?></td>
  <td><?php echo $rows['IdentificationID']; ?></td>
  <td><?php echo $rows['Building_No']; ?></td>
  <td><?php echo $rows['Room_No']; ?></td>
  <td align="center"><?php echo "<form action='approve.php' method='POST'><input type='hidden' name='accept' value='".$rows["IdentificationID"]."'/><input type='submit' name='submit' value='Approve'/></form>"?></td>
  <td align="center"><?php echo "<form action='reject.php' method='POST'><input type='hidden' name='reject' value='".$rows["IdentificationID"]."'/><input type='submit' name='submit' value='Reject'/></form>"?></td>;

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
