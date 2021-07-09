<?php
session_start();
/* $_SESSION['USER'] = 'TEST'; // delete if user session variable already fixed */
?>
<!DOCTYPE html>
<html>

<head>
    <title>Apply College</title>
    <link rel="stylesheet" href="../../Assets/css/style.css" type="text/css" />
</head>

<!-- <body>
    <form id="apply-college-form" method="POST" name="apply-college-form" onsubmit="return applyCollege()">
        <div class="input-data">
            <label for="college-name">College Name</label>
            <input type="text" name="college-name" />
            <label for="building-no">Building No</label>
            <input type="text" name="building-no" />
        </div>
        <input type="submit" name="submit" value="Apply College">
    </form>
</body> -->

<body>
    <header>
        <div class="header-container">
            <div class="header-container-left">
                <div><a href="mainStudent.html"> HOME </a></div>
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
                    <h1>Welcome to University!</h1>
                </div>
            </div>
            <div id="section-2">
                <h3>Apply College</h3>
                <div id="add-user">
                    <h2>Apply College</h2>
                    <form id="apply-college-form" method="POST" name="apply-college-form" onsubmit="return applyCollege()">
                        <div class="input-data">
                            <!-- <label for="college-name">College Name</label>
                            <input type="text" name="college-name" />
                            <label for="building-no">Building No</label>
                            <input type="text" name="building-no" /> -->
                            <table>
                                <tr>
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
                            </table>
                        </div>
                        <input type="submit" name="submit" value="Apply College">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="../../Function/Student/applyCollege.js"></script>

</html>
