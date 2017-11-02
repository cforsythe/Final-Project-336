<?php
include '../dbConnection.php';
$conn = getDatabaseConnection();

function getFoodInfo(){
    global $conn;
    $sql = "SELECT foodName, price, timeName, name FROM food
            NATURAL JOIN restaurant
            NATURAL JOIN time
            WHERE foodName=:food";
            
    $food = $_GET['foodName'];
    $namedParameters = array();
    $namedParameters[':food'] = $food;
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    
    echo "Food: " . $record['foodName'] . "<br>
        Price: " . $record['price'] . "<br>
        Time: " . $record['timeName'] . "<br>
        Restaurant: " . $record['name'];
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Food Info </title>
    </head>
    <body>
        <?=getFoodInfo()?>
    </body>
</html>