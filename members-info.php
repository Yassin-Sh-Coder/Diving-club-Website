<!DOCTYPE html>
<html lang="en">
<head>
<title>DivingClub | Membership</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<div class="main-indents">
  <div class="main">
    <!-- Header -->
    <header>
      <h1 class="logo"><a href="index.php">DivingClub</a></h1>
      <nav>
        <ul class="sf-menu">
          <li><a href="index.php">home</a></li>
          <li><a href="about.php">About</a></li>
          <li> <a href="gallery.php">Gallery</a>
            <ul>
              <li><a href="#">Maecenas faucibus</a></li>
              <li><a href="#">Fusce tincidunt</a></li>
              <li> <a href="#">tempor eros</a>
                <ul>
                  <li><a href="#">ut viverra</a></li>
                  <li><a href="#">hendrerit mauris</a></li>
                </ul>
              </li>
              <li><a href="#">mauris ut du</a></li>
            </ul>
          </li>
          <li><a href="calendar.php">calendar</a></li>
          <li class="current"><a href="members-info.php">Membership</a></li>
          <li><a href="login.php">login</a></li>
          <li><a href="signup.php">Signup</a></li>
        </ul>
      </nav>
      <div class="clear"></div>
    </header>
    <!-- Slider -->
    <div class="mp-slider">
      <ul class="items">
        <li><img src="images/slide-1.jpg" alt="">
          <div class="banner"><span class="row-1"><b>See</b> the Underwater World</span><span class="row-2">With Your Own <b>Eyes</b></span></div>
        </li>
        <li><img src="images/slide-2.jpg" alt="">
          <div class="banner"><span class="row-1"><b>All</b> the Beauty</span><span class="row-2">of the Deep <b>Sea</b></span></div>
        </li>
        <li><img src="images/slide-3.jpg" alt="">
          <div class="banner"><span class="row-1"><b>Find</b> the treasures</span><span class="row-2">of the water <b>World</b></span></div>
        </li>
      </ul>
      <a href="#" class="mp-prev"></a> <a href="#" class="mp-next"></a> </div>
    <!-- Content -->
    <section id="content">
      <div class="container_12">
        <article class="a2">
          <div class="wrapper">
            <div class="col-9">
              <h3>Membership</h3>
              <h5> What does it mean to be a member of Deep Blue Sea? </h5>
              <p> Membership privileges include eligibility to participate in all club activities. Non-club members may participate in any two of our unsubsidized activities, after which time they must join in order to continue enjoying membership privileges. Unless other wise stated, events and contests for which we award prizes are limited to paid members only. Other privileges include: </p>
              <ul class="list-1">
                <li>Subscription to the monthly newsletter</li>
                <li>Free air fills and discounts at participating dive shops</li>
                <li>Participation in raffles and drawings at Club events</li>
                <li> Participating in annual contests:
                  <ul>
                    <li>Spear Fishing contest at Memorial Day</li>
                    <li>Biggest Abalone</li>
                    <li>Biggest Fish</li>
                    <li>Photo Contest</li>
                    <li>Cooking contests at Labor Day</li>
                  </ul>
                </li>
                <li>Special rates for Club events and trips</li>
                <li>Member of the Year Voting</li>
                <li>Board Member Elections</li>
                <li>Becoming a Board Member</li>
                <li>Access to current discussion forum on Yahoo! Groups</li>
              </ul>
            </div>
            <div class="col-10">
              
              <h3>Member Login</h3>
              <form action="members-info.php" method="POST" id="login-form">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <div class="wrapper">
                  
                  <div class="login-form-col-2"> <p><input type="submit" name="login"></p> </div>
                </div>
              </form>

              <?php 
                require "conn.php";
                // session_start(); 

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
                            header("Location: index.php");
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

              <ul class="list-1">
                <li><a href="signup.php">Create an Account</a></li>
              </ul>
            </div>
          </div>
        </article>
        <article class="content-box">
          <h3 class="hp-1">Membership</h3>
          <h5>What does it cost to become a member of Deep Blue Sea?</h5>
          <p> Our annual membership fee is $200 per person. We also offer discounted rates for families and students. You can find the full details on our website or by contacting our membership coordinator. </p>
          <h5>Where and when are your meetings held?</h5>
          <p> We typically meet on the 1 of each month at 14:00 PM at our headquarters in Beirut. We also have special events and outings throughout the year. Our upcoming events are always listed on our website and in our monthly newsletter. </p>
          <h5>If I become a member, do I have to attend all meetings?</h5>
          <p class="p3"> Absolutely not! We understand that life gets busy. We encourage members to attend as many meetings and events as they can, but there's no requirement to be at every single one. </p>
         
          <h5>Great! So how do I become a member?</h5>
          <p> We're excited to have you! You can become a member by filling out a <a href="signup.php">membership application</a>, either online on our website or in person at one of our meetings. We'll review your application and get back to you within a few days.
            We hope to see you at our next meeting! If you have any other questions, please don't hesitate to <a href="mailto: yshakhashiro@email.com">ask! </a></p>
        </article>
      </div>
    </section>
    <!-- Footer -->
    <footer>
      
      <ul class="social-list">
        <li><a href="#"><img src="images/soc-icon-1.png" alt=""></a></li>
        <li><a href="#"><img src="images/soc-icon-2.png" alt=""></a></li>
        <li><a href="#"><img src="images/soc-icon-3.png" alt=""></a></li>
      </ul>
    </footer>
  </div>
</div>
</body>
</html>
