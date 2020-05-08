<?php
    try{
        $connection = new PDO("mysql:host=localhost;dbname=human","PDO","thomas");
        /*if ($connection){
            echo "I connected the human database!";
        }*/
        }


    catch(PDOException $e){
            echo "Failed to connect to database: <BR>";
            echo $e->getMessage();
    }

function getTable(){
    try{
            $connection = new PDO("mysql:host=localhost;dbname=human","PDO","thomas");
            $result = $connection->query("SELECT * FROM people");
            echo "<div class='container'>";
            echo "<h2>Basic Table</h2>";
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
                //echo "$person[name] ($person[age])";
                echo "</tr>";
            }
            echo "</tbody></TABLE></div>";
        }
        catch(PDOException $e){
            echo "Failed to connect to database: <BR>";
            echo $e->getMessage();
        }
        $connection = NULL;
}
?>