<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Apply College</title>
    <link rel="stylesheet" href="../../Assets/css/style.css" type="text/css" />
</head>

<body>
    <header>
      <div class="header-container">
        <div class="header-container-left">
        </div>
        <div class="header-container-right">
          <div><a href="mainStudent.html">BACK</a></div>
          <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
        </div>
      </div>

    </header>
    <section>
        <div class="body-container">
            <div id="background">
                <div id="background-center">
                    <h1>Welcome to University!</h1>
                </div>
            </div>
            <div id="section-2">
              <div class = "form-box-container">
                <form id="apply-college-form" method="POST" name="apply-college-form" onsubmit="return applyCollege()">
                    <div class="input-data">
                        <table style="width:100%">
                            <tr>
                              <th colspan="2">Student Dashboard</th>
                            </tr>
                            <tr style="height:50px;">
                                <td><label for="college-name">College Name</label></td>
                                <td>
                                    <select id="college-name" name="college-name">
                                        <?php
                                        require_once('../../Function/Init/config.php');

                                        $sqlcollege = "SELECT * FROM College";
                                        $sqlresult = mysqli_query($conn, $sqlcollege);

                                        if (mysqli_num_rows($sqlresult) > 0) {
                                            while ($row = mysqli_fetch_assoc($sqlresult)) {
                                                echo '<option value="', $row["College_Name"], '">', $row["College_Name"], '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="building-no">Building No</label></td>
                                <td>
                                    <select id="college-name" name="college-name">
                                        <?php
                                        require_once('../../Function/Init/config.php');

                                        $sqlcollege = "SELECT * FROM College";
                                        $sqlresult = mysqli_query($conn, $sqlcollege);

                                        if (mysqli_num_rows($sqlresult) > 0) {
                                            while ($row = mysqli_fetch_assoc($sqlresult)) {
                                                echo '<option value="', $row["Building_No"], '">', $row["Building_No"], '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <input type="submit" name="submit" value="Apply College" id="button-update"> </td>
                            </tr>
                        </table>
                    </div>
                </form>
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
<script type="text/javascript" src="../../Function/Student/applyCollege.js"></script>

</html>
