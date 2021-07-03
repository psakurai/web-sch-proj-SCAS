<?php
session_start();
$_SESSION['USER'] = 'TEST'; // delete if user session variable already fixed
?>
<!DOCTYPE html>
<html>

<head>
    <title>Apply College</title>
</head>

<body>
    <form id="apply-college-form" method="POST" name="apply-college-form" onsubmit="return applyCollege()">
        <div class="input-data">
            <label for="college-name">College Name</label>
            <input type="text" name="college-name" />
            <label for="building-no">Building No</label>
            <input type="text" name="building-no" />
        </div>
        <input type="submit" name="submit" value="Apply College">
    </form>
</body>
<script type="text/javascript" src="../../Function/Student/applyCollege.js"></script>

</html>
