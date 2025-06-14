<?php
$host = "localhost";
$username = "root"; // default XAMPP username
$password = "";     // default XAMPP password is empty
$dbname = "user_data";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$uname   = $_POST['txtuse'];
$pass    = $_POST['txtpass'];
$mobile  = $_POST['number'];
$gender  = $_POST['gender'];
$father  = $_POST['father'];
$story   = $_POST['remember'];
$email   = $_POST['email'];

// Insert data into the database
$sql = "INSERT INTO user (username, password, mobile, gender, father, story, email)
        VALUES ('$uname', '$pass', '$mobile', '$gender', '$father', '$story', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Data inserted successfully!" . "<br>";
    echo "<a href='login.php'>Go to Login</a>";
} else {
    echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
