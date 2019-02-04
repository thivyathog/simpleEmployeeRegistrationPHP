<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "w1698503_FUTURITY";
$errors = array();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$w1698503empId = $_POST["empId"];
$w1698503fname = $_POST["fname"];
$w1698503position = $_POST["position"];
$w1698503email = $_POST["email"];
$w1698503compC = $_POST["companycode"];
if ($w1698503empId == "") {
    trigger_error("Employee id is required");
}
if ($w1698503fname == "") {
    trigger_error("First name is required");
}
if ($w1698503position == "") {
    trigger_error("Position is required");
}
if ($w1698503compC == "") {
    trigger_error("Company code is required");
}
if ($w1698503email == "") {
    trigger_error("email is required");
}
if ($w1698503empId != "" && $w1698503fname != "" && $w1698503position != "" &&
    $w1698503compC != "" && $w1698503empId != "" && $w1698503email != "" &&
    (filter_var($w1698503empId, FILTER_VALIDATE_INT)) && (filter_var($w1698503email,
        FILTER_VALIDATE_EMAIL))) {
    $sql = "SELECT w1698503_empId FROM w1698503_EMPLOYEE";
    $result = mysqli_query($conn, $sql);
    if ($result == $w1698503empId) {
        echo "There is already an employee with this id,please re enter";
    } else {
        $sql = "INSERT INTO `w1698503_EMPLOYEE`(`w1698503_empId`, `w1698503_empFullName`,
`w1698503_empPosition`, `w1698503_empEmail`, `w1698503_compCode`) VALUES
($w1698503empId,'$w1698503fname', '$w1698503position', '$w1698503email', $w1698503compC)";
        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT * FROM w1698503_employee where w1698503_empId=$w1698503empId";
            $result = mysqli_query($conn, $sql2);
            if ($result->num_rows > 0) { //fetching the last row from the database
                while ($row = $result->fetch_assoc()) {
                    echo "<html>
27
Done by :Thivya Thogesan
W1698503
<head>
 <title> New Employee Confirmation</title>
</head>
<body>
<h2> New Employee Confirmation </h2>
Your new employee has been added succesfully
<br>
<br>
Added employee id:" . $row["w1698503_empId"] . "<br>
Added full name:" . $row["w1698503_empFullName"] . "<br>
Added position:" . $row["w1698503_empPosition"] . "<br>
Added email: " . $row["w1698503_empEmail"] . "<br>
Added company code: " . $row["w1698503_compCode"] . " <br>
</body>
</html>
";
                }
            } else {
                echo "Confirmation unsuccessful";
            }
        } else {
            echo "Unsucessful! <br>" . $conn->error;
        }
    }
} else {
    echo "Enter fields with appropriate values";
}
$conn->close();
?>