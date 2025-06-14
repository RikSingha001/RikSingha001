
<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_data";

// ডাটাবেজ কানেকশন
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// যদি ফর্ম সাবমিট হয়
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['txtuse'];
    $story = $_POST['remember'];

    // username ও story মিলিয়ে password খুঁজে বের করো
    $stmt = $conn->prepare("SELECT password FROM user WHERE username = ? AND story = ?");
    $stmt->bind_param("ss", $username, $story);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password);
        $stmt->fetch();
        echo "<h3 style='color:green;'>✅ Match found! Your password is: <b>$password</b></h3>";
    } else {
        echo "<h3 style='color:red;'>❌ No match found! Please try again.</h3>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgott.uu.com.org</title>
    <link rel="icon" href="imge/logo.png" type="image/png">
     <style>
        body {
            background: url('imge/Forgott.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: rgba(0,0,0,0.6);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 90%;
            max-width: 450px;
            color: white;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: none;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .success {
            margin-top: 20px;
            color: #00ff00;
            font-weight: bold;
        }

        .error {
            margin-top: 20px;
            color: #ff4d4d;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center>
    <form method="post" action="">
        <table border="1">
            <tr>
                <th>Username</th>
                <td><input type="text" name="txtuse" required></td>
            </tr>
            <tr>
                <th>Enter your story</th>
                <td><input type="text" name="remember" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>
