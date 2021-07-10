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
                  <td align="left"><b>Building No         : </b></td>
                  <td><?php echo $rows['Building_No']; ?></td>
                  </tr>

                  <tr>
                  <td align="left"><b>Approved by         : </b></td>
                  <td><?php echo $rows['Manager_Username']; ?></td>
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
        <div class="footer-container">
          <h4> © 2021 OpenSus Ltd. All rights reserved.</h4><br>
          <p>Use of this site constitutes acceptance of our User Agreement effective 10/7/2021) and Privacy Policy effective 10/7/2021) OpenSus Ltd may earn a portion of sales from products that are purchased through our site as part of our Afiliate Partnerships with retailers. Your Malaysia Privacy Rights (effective 10/7/2021) The material on this site may not be reproduced distributed, transmitted cached or otherwise used, except with prior written permission of OpenSus Ltd</p><br>
          <hr>
          <p>
          <a href="https://twitter.com"><img src="../../Assets/png/twitter.png" alt="Twitter" style="width:20px;height:20px"></a>
          <a href="https://instagram.com"><img src="../../Assets/png/instagram.png" alt="Instagram"style="width:27px;height:21px"></a>
          <a href="mailto: admin@OpenSus.com"><img src="../../Assets/png/email.png" alt="Email"style="width:20px;height:20px"></a>
          </p>
          <hr id="bottom-padding">
          </div>
    </footer>
</body>
