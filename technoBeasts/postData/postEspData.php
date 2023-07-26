<?php
require '../php/conn.php';


/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$api_key_value = "tPmAT5Ab3j7F9";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $num_people = test_input($_POST["num_people"]);
        $battery_level = test_input($_POST["battery_level"]);
        $comp_id = test_input($_POST["comp_id"]);

        // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE `components` SET `numPeople`=$num_people,`batteryLavel`=$battery_level WHERE  `compid`=$comp_id";
        if ($conn->query($sql) === true) {
            echo "Record Updated";
        } else {
            echo "Error while Updating..." ;
        }
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }



} else if (($_SERVER["REQUEST_METHOD"] == "GET")) {
    $api_key = test_input($_GET["api_key"]);
    if ($api_key == $api_key_value) {
        $comp_id = test_input($_GET["comp_id"]);

        // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $newSql = "SELECT `side` FROM `components` WHERE `compid`=$comp_id";
        if ($result = mysqli_query($conn, $newSql)) {

            $rowcount = mysqli_num_rows($result);
            if ($rowcount > 0) {
                $row = mysqli_fetch_assoc($result);

                echo $row['side'];
            } else {
                echo "Error: Occured";
            }

            mysqli_free_result($result);
        }

        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP.";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
