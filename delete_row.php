<!DOCTYPE html>
<style>
    .del_btn{
        border-bottom: 1px solid #000000;
    }
</style>
<html lang="en">
<?php include("test.php");include("header.html");?>
    <body>
       <?php
        if(isset($_POST['submit'])){
           delPeople(setConnect(),$_POST['rbutton']);
        }
       ?>
        
        <div id='container-bg'>
            <?php
               rbutton_getTable()
            ?>
        </div>
    </body>
</html>