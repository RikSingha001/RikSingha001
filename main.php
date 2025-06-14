<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_data";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $field = $_POST['field'];
    $newValue = $_POST['new_value'];

    // allowed fields only
    $allowedFields = ['number', 'story', 'password', 'email'];
    if (in_array($field, $allowedFields)) {
        // prepare dynamic SQL
        $stmt = $conn->prepare("UPDATE user SET $field = ? WHERE username = ?");
        $stmt->bind_param("ss", $newValue, $username);
        if ($stmt->execute()) {
            $message = "✅ Successfully updated $field!";
        } else {
            $message = "❌ Failed to update!";
        }
        $stmt->close();
    } else {
        $message = "❌ Invalid field selected!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main.uu.com.org</title>
    <link rel="icon" href="imge/logo.png" type="image/png">
    <style>
        /* Fullscreen background image */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Reset some styles */
        html, body, h2, form, input, select, button {
            font-family: Arial, sans-serif;
        }
      * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url('imge/Main.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #1e90ff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .msg {
            margin-bottom: 10px;
            font-weight: bold;
            color: yellow;
        }

        button:hover {
            background-color: #0077cc;
        }
    </style>
</head>
<body>
    <center>

    <h2>Change Your Information</h2>

    <?php if ($message) echo "<p class='msg'>$message</p>"; ?>

    <form method="post" action="">
        <input type="text" name="username" placeholder="Enter your username" required><br>

        <select name="field" required>
            <option value="">-- Select what to change --</option>
            <option value="number">Phone Number</option>
            <option value="story">Story</option>
            <option value="password">Password</option>
            <option value="email">Email</option>
        </select><br>

        <input type="text" name="new_value" placeholder="Enter new value" required><br>

        <button type="submit">Update</button>
    </form>
    </center>
</body>
</html>
