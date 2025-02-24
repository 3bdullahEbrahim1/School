<?php
    // Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST["studentName"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $grade = $_POST["grade"];
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    $sql = "INSERT INTO students (studentName, gender, dob, grade, contactNumber, email, comment) VALUES ('$studentName', '$gender', '$dob', '$grade', '$contactNumber', '$email', '$comment')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Form Submitted Successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header("Location: your-form-page.html");
    exit();
}

$conn->close();
?>
