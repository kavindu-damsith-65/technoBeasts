<?php
require 'conn.php';
session_start();

if (isset($_POST['getData']) && $_POST['getData'] == "loadData") {
    $timePeriod = 100;
    $userId = $_SESSION['userid'];
    $sql = "SELECT * FROM components WHERE TIMESTAMPDIFF(MINUTE, updateTime, NOW()) < $timePeriod AND  userid = '$userId';";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $compid = $row['compid'];
        ?>

<div class="card">
    <div class="card-head">
        <h1 style="font-weight:bold;"><?php echo $row['compname'] ?><span class="las la-lightbulb"></h1>


    </div>
    <div class="card-head">
        <button id="deleteComp" onclick="deleteComp(<?php echo '\'' . $compid . '\'' ?>)"
            style="font-family:inter; font-size:15px" class="btn btn-danger">
            &nbsp; Delete &nbsp;</button></span>

        <label class="switch">
            <input onchange="myFunc(<?php echo '\'' . $compid . '\'' ?>)" type="checkbox"
                <?php echo ($row['side'] != 0) ? "checked" : "unchecked" ?>>
            <!-- ,';echo ($row['side'] != 0) ? '\'checked\'' : '\'unchecked\''  -->
            <span class="slider round"></span>
        </label>
    </div>
    <div class="card-progress">
        <br>
        <p>Battery Lavel (<?php echo $row['batteryLavel'] ?>%)</p>
        <div class="card-indicator">
            <div class="indicator one" style="width: <?php echo $row['batteryLavel'] ?>%"></div>
        </div>
        <br>
        <div>
            <p class="">Number Of People In Room
            <h3 style="margin:0px"><?php echo $row['numPeople'] ?></h3>
            </p>
        </div>

        <br>
        <button onclick="turnOffButton(<?php echo '\'' . $compid . '\'' ?>)" id="resetPeople"
            style="font-family:inter; font-size:18px" class="btn btn-sm btn-success"> &nbsp;Turn
            Off
            Bulb&nbsp; </button>
    </div>
</div>
<!-- <h3 style="margin-top:60px"  class="text-center">Offline Components</h3><br> -->
<?php }

    $sql = "SELECT * FROM components WHERE TIMESTAMPDIFF(MINUTE, updateTime, NOW()) >= $timePeriod AND  userid = '$userId';";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $compid = $row['compid'];
        ?>

<div class="card">
    <div class="card-head">
        <h1 style="font-weight:bold;"><?php echo $row['compname'] ?>(Offline)<span class="las la-lightbulb"></h1>


    </div>

    <div class="card-head">
        <button disabled id="deleteComp" onclick="deleteComp(<?php echo '\'' . $compid . '\'' ?>)"
            style="font-family:inter; font-size:15px" class="btn btn-danger">
            &nbsp; Delete &nbsp;</button></span>

        <label class="switch">
            <input disabled onchange="myFunc(<?php echo '\'' . $compid . '\'' ?>)" type="checkbox"
                <?php echo ($row['side'] != 0) ? "checked" : "unchecked" ?>>
            <!-- ,';echo ($row['side'] != 0) ? '\'checked\'' : '\'unchecked\''  -->
            <span class="slider round"></span>
        </label>
    </div>

    <div class="card-progress">
        <br>
        <p>Battery Lavel (Unknown%)</p>
        <div class="card-indicator">
            <div class="indicator one" style="width:0%"></div>
        </div>
        <br>
        <div>
            <p class="">Number Of People In Room
            <h3 style="margin:0px">Unknown</h3>
            </p>
        </div>

        <br>
        <button disabled onclick="turnOffButton(<?php echo '\'' . $compid . '\'' ?>)" id="resetPeople"
            style="font-family:inter; font-size:18px" class="btn btn-sm btn-success"> &nbsp;Turn
            Off
            Bulb&nbsp; </button>
    </div>
</div>
<?php }

    $conn->close();
    exit();
}

if (isset($_POST['getData']) && $_POST['getData'] == "deleteData") {
    $compid = $_POST['compid'];
    $sql = "DELETE FROM components WHERE compid='$compid'";
    $result = $conn->query($sql);
    $conn->close();
    exit();
}

if (isset($_POST['getData']) && $_POST['getData'] == "turnOffBulb") {
    $compid = $_POST['compid'];
    $sql = "UPDATE components SET numPeople=0 WHERE compid='$compid'";
    $result = $conn->query($sql);
    $conn->close();
    exit();
}

if (isset($_POST['getData']) && $_POST['getData'] == "setSide") {
    $compid = $_POST['compid'];
    $sql = "SELECT side FROM  components WHERE compid='$compid'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        if ($row['side'] == 0) {
            $sql = "UPDATE components SET side=1 WHERE compid='$compid'";
        } else {
            $sql = "UPDATE components SET side=0 WHERE compid='$compid'";
        }
        $result = $conn->query($sql);
    }
    $conn->close();
    exit();
}

if (isset($_POST['compid']) && isset($_POST['compname'])) {

    $compid = $_POST['compid'];
    $compname = $_POST['compname'];
    $userid = $_SESSION['userid'];

    $sql = "SELECT * FROM components WHERE (compname = '$compname' AND userid=$userid) OR compid = '$compid'";
    // echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // die("This name is alrady in your Account. Select different One.");
        die("This Component is used by Another one. Check your ID and Component Name angin.");
        $conn->close();
        exit();
    }

// Insert the user data into the database
    $sql = "INSERT INTO components (compid,compname,side,numPeople,batteryLavel,userid) VALUES ('$compid', '$compname', 0, 0,100,$userid)";
    if ($conn->query($sql) === true) {
        echo "suceed";

    } else {
        // Display the invalid details on the registration page
        die("Unknown Error!");
        $conn->close();
        exit();

    }

}

?>