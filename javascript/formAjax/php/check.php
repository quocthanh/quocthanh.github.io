<?php
/*receive user name from user,
then compare it to database,
and return true if that username already existed

*/
$servername = "sql112.freevnn.com";
$username = "freev_18501719";
$password = "1234bibo";
$dbname = "freev_18501719_name";

$conn = new mysqli($servername, $username, $password, $dbname);  //create connection to MySQL server

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_REQUEST["name"];

if ($name !== "") {
    $name = strtolower($name);

    //load table from database
    $sql = "SELECT userName FROM table_1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $flag = 0;
        while($row = $result->fetch_assoc()) {
            if ($name == $row["userName"]) {
                $flag = 1;        
            }
        }
    }
}

if ($flag == 1) {
    echo true; //username existed
} else {
    echo false;
    $sql = "INSERT INTO table_1 (userName)
    VALUES ('$name')";

    $conn->query($sql);
}
?>