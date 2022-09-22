<?php date_default_timezone_set("Asia/Kolkata"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            padding: 10px;
        }

        label,
        .input {
            font-size: larger;
            font-weight: 400;
        }

        .myform,
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Enter details to fill in database</h1>

    <?php require './db/dbconnect.php' ?>
    <form class="myform" action="" method="post">
        <div class="container">
            <label for="name">Enter Name: </label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="container">
            <label for="dob">Enter DOB: </label>
            <input type="date" id="dob" name="dob" max="<?php echo date("Y-m-d"); ?>" required>
        </div>
        <div class="container">
            <label for="dod">Enter DOD: </label>
            <input type="date" id="dod" name="dod" max="<?php echo date("Y-m-d"); ?>">
        </div>

        <div class="container">
            <label for="profession">Enter Profession</label>
            <input type="text" id="profession" name="profession" required>
        </div>

        <input type="submit" value="Submit" />
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $dod = $_POST['dod'];
        $profession = $_POST['profession'];

        $sql = "INSERT INTO `person` (`name`, `dob`, `dod`, `profession`) VALUES ('$name', '$dob', '$dod', '$profession')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Successfully stored in database";
        } else {
            echo "Couldn't process your request at this time";
        }
    }
    ?>
</body>

</html>