<?php
$servername = "severname";
$username = "username";
$password = "";
$dbname = "w1698503_FUTURITY";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a new Employee</title>
    <style>
        * {
            box-sizing: border-box;
        }
        input[type=text] {
            width: 50%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        .col-2 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }
        .col-7 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }


    </style>
</head>
<body>
<h1>Add a New Employee</h1>
<hr>
<div class="text">
    <p style="font-size: 18px">Fill the form below to add a employee</p></div>
<form action="getemployee.php" method="post">
    <div class="row">
        <div class="col-2">
            <label>*Employee Id</label>
        </div>
        <div class="col-7">
            <input type="text" name="w1698503empId" required>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>*Full Name</label>
        </div>
        <div class="col-7">
            <input type="text" name="w1698503fname" required>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>*Position</label>
        </div>
        <div class="col-7">
            <input type="text" name="w1698503position" required>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label>*Email</label>
        </div>
        <div class="col-7">
            <input type="text" name="w1698503email" required>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="country">*Company Code</label>
        </div>
        <div class="col-7">
            <select id="country" name="w1698503companycode" required>
                <?php
                //populating selection options with the company Code values optained from

 $sql = mysqli_query($conn, "SELECT w1698503_compCode From
w1698503_company");
 $row = mysqli_num_rows($sql);
 while ($row = mysqli_fetch_array($sql)) {
     echo "<option value='" . $row['w1698503_compCode'] . "'>" .
         $row['w1698503_compCode'] . "</option>";
 }
 ?>
            </select>
        </div>
    </div>

    <br>
    <div class="button">
        <input type="submit" value="Add Employee" name="reg_emp"> <input type=reset
                                                                         value="Clear Form">
    </div>
</form>
</body>
</html>
