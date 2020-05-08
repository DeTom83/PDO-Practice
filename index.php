<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>MySQL practice</title>
</head>
<body>
    <?php
        include("connect.php");
        try{
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

    ?>
</body>
</html>