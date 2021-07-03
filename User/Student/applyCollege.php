<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <form method="post" id="edit-user-form" onsubmit="return editUser()" name="edit-user-form">
        <div class="input-data">
            <label for="college-name">College Name</label>
            <input type="text" name="college-name" />
            <label for="building-no">Building No</label>
            <input type="text" name="building-no" />
        </div>
        <input type="submit" name="submit" value="Apply Room">
    </form>
</body>

</html>
