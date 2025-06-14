<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uu.com.org</title>
    <link rel="icon" href="imge/logo.png" type="image/png">
     <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: url('imge/open.png') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #f0f8ff;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: rgba(0, 0, 0, 0.6);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
    }

    .nav-left, .nav-right {
      display: flex;
      gap: 10px;
    }

    button {
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      background-color: #1e90ff;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #0a74da;
    }

    .main-content {
      text-align: center;
      margin-top: 150px;
      padding: 20px;
    }

    h1 {
      font-size: 3em;
      color: #00ffff;
      margin-bottom: 20px;
      text-shadow: 2px 2px 5px #000;
    }

    p, p1 {
      font-size: 1.2em;
      color: #f0f0f0;
      margin-top: 10px;
      display: block;
    }

    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      text-align: center;
      padding: 12px 0;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
    <right_top style="position: absolute; top: 0; right: 0;">
        <table border ="1">
            <tr> 
                <td>
                    <input type="button" value="login" onclick="location.href='login.php'">
                 </td>
                 <td>
                    <input type="button" value="sing" onclick="location.href='registats.php'">
                </td>
            </tr>
        </table>
    </right_top>
    
    <left_side style="position: absolute; top: 0; left: 0;">
        <table border ="1">
            <tr>
                <td>
                    <input type="button" value="Home" onclick="location.href='opent.php'">
                </td>
                <td>
                    <input type="button" value="About Us" onclick="location.href='aboutus.php'">
                </td>
            </tr>
        </table>
    </left_side>
    <center>
        <h1>Welcome to the Main Page</h1>
        <p >King is alive</p>
        <p1>Welcome to the main page of our website. Here you can find various resources and information.</p1>

        </center>
    <footer style="position: fixed; bottom: 0; width: 100%; text-align: center;">
        
        <p >© 2023 Your Company Name. All rights reserved.</p>
        </footer>
</body>
</html>