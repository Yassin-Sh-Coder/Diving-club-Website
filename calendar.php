<!DOCTYPE html>
<html lang="en">
<head>
<title>DivingClub | Calendar</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="js/calendar-events.js"></script>
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
          <li class="current"><a href="calendar.php">calendar</a></li>
          <li><a href="members-info.php">Membership</a></li>
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
        <div class="a2">
          <div class="wrapper">
            <div class="col-7">
              <h3 class="hp-1">Latest Events</h3>
              <?php
                  require "conn.php";
                  $sql = "SELECT * FROM events WHERE status = 1 ORDER BY date_from ASC LIMIT 5";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<h5><span>" . date('d', strtotime($row['date_from'])) . "</span> " . date('F', strtotime($row['date_from'])) . "</h5>";
                          echo "<p class='p3'>" . $row['description'] . "</p>";
                      }
                  }
                  else {
                      echo "<p class='p3'>No events found</p>";
                  }
                  mysqli_close($conn);
              ?>
              <!-- <h5><span>31</span> june</h5>
              <p class="p3"> Nam liber tempor cumuod soluta nobis eleifend option congue imperdiet doming id quod mazim placerat. </p>
              <h5><span>28</span> june</h5>
              <p class="p3"> Facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod. </p>
              <h5><span>21</span> june</h5>
              <p class="p3"> Ut wisi enim ad minim veniam, qnostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex. </p>
              <h5><span>12</span> june</h5>
              <p class="p3"> At vero eos et accusam et justo duo dolores et ea rebum. Stet clita gubergren no sea takimata sanctus. </p>
              <h5><span>05</span> june</h5>
              <p class="p3"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. </p> -->
              <!-- <a href="#" class="button">More</a> -->
            </div>
            <div class="col-8">
              <h3 class="hp-1">Your Calendar</h3>
              <div id="calendar"></div>
            </div>
          </div>
        </div>
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
