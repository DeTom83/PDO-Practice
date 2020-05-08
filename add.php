<!DOCTYPE html>
<html lang="en">
<?php include("test.php");include("header.html");?>
<style>
    .add_btn{
        border-bottom: 1px solid #000000;
    }
</style>
<body>
<div id='container-bg'>
<div class="container">
  <BR><BR>
  <h2>Add people</h2>
  <form action="add.php" method="POST">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="usr">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" class="form-control" id="age" name="age">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<?php 
    if(isset($_POST['submit'])){
        try{
            setPeople(setConnect(),$_POST['usr'],$_POST['age']);
        }
        catch(PDOException $e){
            echo "Failed to connect to database: <BR>";
            echo $e->getMessage();
        }
        getTable(setConnect());  
    }
    else{
        getTable(setConnect());
    }
?>
</body>
</html>