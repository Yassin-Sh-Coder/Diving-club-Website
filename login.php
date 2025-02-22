<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <link rel="stylesheet" href="css/style2.css" media="screen" type="text/css" />

</head>

<body>

  <html lang="en-US">
  <head>

    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/registration.js"></script>

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>

  <body>

    <div class="container">

      <div id="login">

        <form action="login.php" method="POST">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text" name="email" placeholder="Email" required></p> 
            <p><span class="fontawesome-lock"></span><input type="password"  name="password" placeholder="Password" required></p> 
            <p><input type="submit" name="login"></p>

          </fieldset>

        </form>

        <p>Not a member? <a href="signup.php">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

      </div> 

    </div>

    <?php 
            require "conn.php";
            session_start(); 

            if (isset($_POST['login'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $pass = $_POST['password'];

                $stmt = mysqli_prepare($conn, "SELECT * FROM members WHERE email = ?");
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row['password'];

                    if (password_verify($pass, $hashedPassword)) { 
                        $_SESSION['email'] = $email;

                        header("Location: logged_in_pages/index.php");
                        echo "<script> alert('Logged in!'); </script>";
                    } else {
                        echo "<script> alert('Incorrect password'); </script>";
                    }
                } else {
                    echo "<script> alert('Email not found'); </script>";
                }
            }
            mysqli_close($conn);
            
        ?>

  </body>
</html>

</body>

</html>