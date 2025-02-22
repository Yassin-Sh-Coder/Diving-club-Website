<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Signup </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/registration.js"></script>
    <link rel="stylesheet" href="css/signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="signup.php" method="POST" onsubmit="return validateForm();">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="first_name" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="last_name" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" id="birth" name="birth" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="number" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Emergency Phone Number</span>
            <input type="text" name="emergency_number" placeholder="Enter your emergency number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            <span id="password-alert"></span>
          </div>
        </div>
        <a href="login.php">Already have an acount?</a>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="M">
          <input type="radio" name="gender" id="dot-2" value="F">
          <input type="radio" name="gender" id="dot-3" value="P">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="signup" value="Signup">
        </div>
      </form>
    </div>
  </div>


  <?php 
        require "conn.php";

        if (isset($_POST['signup'])) {
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 
            $birth = mysqli_real_escape_string($conn, $_POST['birth']);
            $phone_number = mysqli_real_escape_string($conn, $_POST['number']);
            $emergency_number = mysqli_real_escape_string($conn, $_POST['emergency_number']);
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $joining_date = date('Y-m-d'); 

            $sql = "INSERT INTO members (first_name, last_name, email, password, date_of_birth, gender, mobile_number, emergency_number, joining_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) { 
                mysqli_stmt_bind_param($stmt, "sssssssss", $first_name, $last_name, $email, $pass, $birth, $gender, $phone_number, $emergency_number, $joining_date);
            
                mysqli_stmt_execute($stmt);
                    
                
                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing statement: " . mysqli_error($conn);
            }

            
        }

        mysqli_close($conn);
  ?>

</body>
</html>
