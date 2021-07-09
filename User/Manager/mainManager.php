<html lang="en">

<head>
  <title>Home-College Accomodation</title>
  <link rel="stylesheet" href="../../Assets/css/style.css">
</head>

<body>
  <header>
    <div class="header-container">
        <div class="header-container-left">
            <div> HOME </div>
        </div>
        <div class="header-container-right">
            <div><a href="../../Function/Global/viewProfile.php">MYPROFILE</a></div>
            <div><a href="../../Function/Global/logout.php">SIGN OUT</a></div>
        </div>
    </div>
  </header>

  <section>
    <div class="body-container">
      <div id="background">
        <div id="background-center">
          <h1> Welcome to University! </h1>
        </div>
      </div>

      <div id="section-2">
        <h3>WEB ANALYTICS</h3>
        <div id="s2-left">
          <form class="web-analytics">
            <table id="myTable">
              <tr>
                <th>Total Request</th>
              </tr>
              <tr>
                <td><input id="request" name="student-count" type="number"></td>
              </tr>
              <tr>
                <td>
                    Last update:
                      <script>
                        document.write(new Date().toLocaleDateString());
                      </script>
                </td>
              </tr>
            </table>
          </form>
        </div>

        <div id="s2-center">
          <form class="web-analytics">
            <table id="myTable">
              <tr>
                <th>Total Accepted Request</th>
              </tr>
              <tr>
                <td><input id="accepted-request" name="req-count" type="number"></td>
              </tr>
              <tr>
                <td>
                  Last update:
                    <script>
                      document.write(new Date().toLocaleDateString());
                    </script>
                </td>
              </tr>
            </table>
          </form>
        </div>
        <div id="s2-right">
          <form class="web-analytics">
            <table id="myTable">
              <tr>
                <th>Total Rejected Request</th>
              </tr>
              <tr>
                <td><input id="rejected-request" name="rej-count" type="number"></td>
              </tr>
              <tr>
                <td>
                  Last update:
                    <script>
                      document.write(new Date().toLocaleDateString());
                    </script>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>

            <div id="section-3">
              <h3>VEW PENDING REQUEST</h3>
                <?php
                    require_once('../../Function/Init/config.php');

                    $sql = "SELECT Application.*, User.First_Name, User.Last_Name FROM Application INNER JOIN User ON Application.Username = User.Username WHERE User.User_Level='Student' AND Application.Status = 0";
                    $result = mysqli_query($conn, $sql);

                    echo "<table id='req-table' border=1>";
                    echo "<tr><th>Result ID</th><th>Student Username</th><th>Name</th><th>College Name</th><th>Building No</th><th>Status</th><th colspan='2'>View</th></tr>";

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>", $row["Result_ID"],
                            "</td><td>", $row["Username"],
                            "</td><td>", $row["First_Name"]." ".$row["Last_Name"],
                            "</td><td>", $row["College_Name"],
                            "</td><td>", $row["Building_No"],
                            "</td><td>Pending</td>
                            <td><form action='../../Function/Manager/approve.php' method='POST'><input type='hidden' name='accept' value='".$row["Username"]."'/><input type='submit' name='submit' value='Approve'/></form></td>
                            <td><form action='../../Function/Manager/reject.php' method='POST'><input type='hidden' name='reject' value='".$row["Username"]."'/><input type='submit' name='submit' value='Reject'/></form></tr>";
                        }
                    }

                    else {
                        echo "<tr><td colspan='7'>No student applied for colleges!</td></tr>";
                    }

                    echo "</table>";
                ?>
            </div>
        </div>
    </section>

    <footer>
        <h4>CONNECT</h4> <br>
        <div class="footer-container">
            <div id="footer-left">
                <p>Contact us for more information</p>
                <p>
                  <img src="../../Assets/png/email.png">
                  : unsource@email.com
                </p>
                <p>
                  <img src="../../Assets/png/contact.png">
                  : +60 12-345 6789
                </p>
            </div>

            <div id="footer-right">
                <p>Connect us on your social media</p>
                <div class="nav-socmed">
                  <div id="nav-fb">
                    <a></a>
                  </div>
                  <div id="nav-ig">
                    <a></a>
                  </div>
                  <div id="nav-tw">
                    <a></a>
                  </div>
                  <div id="nav-ws">
                    <a></a>
                  </div>
                </div>

            </div>
        </div>
    </footer>
</body>
<script type="text/javascript" src="../../Function/Manager/getAnalytic.js"></script>

</html>
