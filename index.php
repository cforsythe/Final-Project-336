<?php
include '../dbConnection.php';
$conn = getDatabaseConnection();
function getOptions(){
    global $conn;
    $sql = "SELECT timeName FROM `time`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    foreach($record as $time){
        echo "<option>" . $time['timeName'] . "</option>";
    }
}
function printFoods(){
    global $conn;
    $sql = "SELECT foodName, price FROM `food`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll();
    echo "<table id='foods'>";
    echo "<tr><th>Food</th>" . "<th>Price</th></tr>";
    foreach($record as $food){
        echo "<tr>
                <td>" . $food['foodName'] . "</td>
                <td>". $food['price'] . "</td>
            </tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Food Menu </title>
        <link rel='stylesheet' href='css/styles.css'>
    </head>
    <body>
        <h1>Food Menu</h1>
        <select>
            <option value="">Select One</option>
            <?=getOptions()?>
        </select>
        <br>
        <br>
        <?=printFoods()?>
    </body>
</html>