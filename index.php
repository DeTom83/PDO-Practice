<!DOCTYPE html>
<html lang="en">
<?php include("header.html");include("test.php");?>
<style>
    .home_btn{
        border-bottom: 1px solid #000000;
    }
</style>

<body>
    <?php
        echo "<div id='container-bg'>";
                getTable(setConnect());
        echo"</div>";
    ?>
</body>
</html>