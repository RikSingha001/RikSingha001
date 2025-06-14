
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sing.uu.com.org</title>
    <link rel="icon" href="imge/logo.png" type="image/png">
     <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url('imge/registar.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            width: 90%;
            max-width: 500px;
        }

        h1 {
            margin-bottom: 20px;
            color: yellow;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color:rgb(30, 255, 131);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color:rgb(204, 119, 0);
        }

        marquee {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <center>
        <marquee behavior="scroll" direction="left" scrollamount="10">
            <h1>King is alive</h1>
        </marquee>
    <form method="post" action="submit.php">
            <table border="1">
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="txtuse"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="txtpass"></td>
                </tr>
                <tr><th>modile number</th>
                    <td > <input type ="number" name = "number"></td>
                </tr>
                <tr>
  <th>Gender</th>
  <td>
    <select name="gender">
      <option value="">--Select--</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>
  </td>
</tr>

                <tr><th>Father Name</th>
                    <td > <input type ="text" name = "father"></td>
                </tr>
                <tr><th>Forget Story</th>
                <td><input type="text" name="remember"></td>
                </tr>
                <tr><th>email id</th>
                    <td > <input type ="email" name = "email"></td>
                </tr>
                <tr>
                    <td  colspan="2"><button type="submit">Submit</button></td>
                </tr>
                </table>
        </form>
        </center>
</body>
</html>