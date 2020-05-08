<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>MySQL practice</title>
</head>

<?php
    function setConnect(){ // make a conncet with database
        try{
            $connection = new PDO("mysql:host=localhost;dbname=human","PDO","thomas");
            return $connection;
        }
        catch(PDOException $e){
            echo "Failed to connect to database: <BR>";
            echo $e->getMessage();
        }
        $connection = NULL;
    }

    function getTable($con){ //Query and print the people table
            $result = $con->query("SELECT * FROM people");
            echo "<div class='container'>";
            echo "<BR><BR><h2>Basic Table</h2>";
            echo "<TABLE class='table table-dark table-hover'>
                    <thead>
                        <tr>
                            <th>ID</th>    
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>";
            echo "<tbody>";
            while ($person = $result->fetch()){
                echo "<tr>";
                    echo "<td>$person[id]</td>";
                    echo "<td>$person[name]</td>";
                    echo "<td>$person[age]</td>";
                echo "</tr>";
            }
            echo "</tbody></TABLE></div><BR><BR>";
    }

    function setPeople($con,$name,$age){ //$con db add the $name and $age people
        try{
            $con->query("INSERT INTO people (name,age) VALUES ('".$name."',".$age.")");
        }
        catch(PDOException $e){
            echo "Failed to connect to database: <BR>";
            echo $e->getMessage();
        }
    }   

    function delPeople($con,$id){ // In $con database delete the $id row
         try{
                $result =$con->query("DELETE FROM people WHERE id=".$id);
                $connection =  NULL;
            }
            catch(PDOException $e){
                    echo "Failed to connect to database: <BR>";
                    echo $e->getMessage();
            }
    }

    function rbutton_getTable(){ //Table query with id's radio button. I use this in delete people function
        try{
                    $connection = setConnect();
                    $result = $connection->query("SELECT * FROM people");
                    echo "<div class='container'>";
                    echo "<form action='delete_row.php' method='POST'>";
                    echo "<BR><BR><h2>Delete a row</h2>";
                    echo "<TABLE class='table table-dark table-hover'>
                            <thead>
                                <tr>
                                    <th>Dot</th>
                                    <th>ID</th>    
                                    <th>Name</th>
                                    <th>Age</th>
                                </tr>
                            </thead>";
                    echo "<tbody>";
                    while ($person = $result->fetch()){
                        echo "<tr>";
                            echo "<td><input type='radio' name='rbutton' id='rbutton' value='".$person['id']."'></TD>";
                            echo "<td>$person[id]</td>";
                            echo "<td>$person[name]</td>";
                            echo "<td>$person[age]</td>";
                        echo "</tr>";
                    }
                    echo "</tbody></TABLE>";
                    echo "<button type='submit' name='submit' class='btn btn-primary'>Submit</button></form>";
                    echo "</div>";
                }
                catch(PDOException $e){
                    echo "Failed to connect to database: <BR>";
                    echo $e->getMessage();
                }
                $connection = NULL;
    }
?>