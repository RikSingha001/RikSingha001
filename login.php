<?php

$host = "localhost";
$dbuser = "root";
$dbpass = ""; // make sure your password is correct
$dbname = "user_data"; // make sure your database name is correct

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = ""; // Initialize error message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['txtuse'];
    $password = $_POST['txtpass'];
// $match = $username && $password ;

    // SQL to check user
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ✅ Match found - redirect
        header('Location: main.php');
        exit();
    } else {
        // ❌ No match - show error
        $error = "Invalid username or password";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.uu.com.org</title>
    <link rel="icon" href="imge/logo.png" type="image/png">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: url('imge/Login.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            width: 90%;
            max-width: 450px;
            text-align: center;
        }

        table {
            width: 100%;
            border: none;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: none;
        }

        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            padding: 10px 15px;
            margin: 5px;
            border: none;
            border-radius: 6px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }

        marquee h1 {
            color: yellow;
            margin-bottom: 20px;
        }

        .error-msg {
            color: #ff4d4d;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center>
        <marquee behavior="scroll" direction="left" scrollamount="10">
            <h1>King is alive</h1>
        </marquee>
        <form method="post" action="">
            <table border="1">
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="txtuse"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="txtpass"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit" name="submit">
                        <input type="reset" value="Reset">
                        <input type="button"  onclick = "window.location.href='forgott.php'" value="Forgot Password">
                    </td>
                </tr>
            </table>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </center>
</body>
</html>
