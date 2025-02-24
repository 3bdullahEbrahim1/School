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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // استخدام استعلام معدل مسبقاً لتجنب هجمات SQL injection
    $stmt = $conn->prepare("INSERT INTO messages (name_student, email, messages) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<h2>Form Submitted Successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: CountactUs.html");
    exit();
}

$conn->close();
?>
