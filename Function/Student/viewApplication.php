<?php
session_start();
require('../Init/config.php');
echo "<link rel='stylesheet' type='text/css' href='../../Assets/css/style.css' />"; // Use external css file
?>

<body>
    <header>
      <div class="header-container">
        <div class="header-container-left">
        </div>
        <div class="header-container-right">
          <div><a href="../../User/Student/mainStudent.html">BACK</a></div>
          <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
        </div>
      </div>
    </header>

    <section>
        <div class="body-container">
            <div id="background">
                <div id="background-center">
                    <h1> Welcome to University!</h1>
                </div>
            </div>

            <div id="section-2">
                <?php
                $currentUser = $_SESSION["USER"];
                $sql="SELECT * FROM User u, Application a WHERE u.Username=a.Username AND a.Status = '1' AND u.Username='$currentUser'";
                $uresult = mysqli_query($conn, $sql);

                if(mysqli_num_rows($uresult) > 0){?>
                  <h3>CONGRATULATION, YOUR REGISTRATION HAVE BEEN APPROVED!</h3>
                <?php } ?>

                <?php
                $currentUser = $_SESSION["USER"];
                $sql="SELECT * FROM User u, Application a WHERE u.Username=a.Username AND a.Status = '-1' AND u.Username='$currentUser'";
                $uresult = mysqli_query($conn, $sql);

                if(mysqli_num_rows($uresult) > 0){?>
                  <h3>SORRY, YOUR REGISTRATION HAVE BEEN REJECTED!</h3>
                <?php } ?>

                <?php
                $currentUser = $_SESSION["USER"];
                $sql="SELECT * FROM User u, Application a WHERE u.Username=a.Username AND a.Status = '0' AND u.Username='$currentUser'";
                $uresult = mysqli_query($conn, $sql);

                if(mysqli_num_rows($uresult) > 0){?>
                  <h3>PLEASE BE PATIENT, YOUR REGISTRATION STILL UNDER REVIEW!</h3>
                <?php } ?>

                <div id="result-container">

                  <?php
                  require "../Init/config.php";

                  $currentUser = $_SESSION["USER"];
                  $sql="SELECT * FROM User u, Application a WHERE u.Username=a.Username AND a.Status = '1' AND u.Username='$currentUser'";
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

                  mysqli_close($conn);
                  ?>
                  </table>

                </div>
            </div>
        </div>
    </section>

    <footer>
        <h4>CONNECT</h4> <br>
        <div class="footer-container">
            <div id="footer-left">
                <p>Contact us for more information</p>
                <p>unsource@email.com</p>
                <p>+60 12-345 6789</p>
            </div>

            <div id="footer-right">
                <ul>Connect us on your social media</ul>
            </div>
        </div>
    </footer>
</body>
