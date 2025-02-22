<!DOCTYPE html>
<html lang="en">
<head>
<title>DivingClub</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
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
      <h1 class="logo"><a href="index.php">DeepClub</a></h1>
      <nav>
        <ul class="sf-menu">
          <li class="current"><a href="index.php">home</a></li>
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
          <li><a href="members-info.php">Membership</a></li>
          <li><a href="login.php">Login</a></li>
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
        <article class="a1">
          <div class="wrapper"> <img src="images/page1-img1.png" alt="" class="img-indent">
            <div class="extra-wrap">
              <h3> <span class="welcome">Welcome</span> TO THE WONDERFUL SEA WORLD </h3>
              <p class="p1"> The sea world, covering over 70% of our planet, is a realm of astonishing biodiversity and wonder. From the microscopic phytoplankton that form the base of the marine food web to the majestic blue whale, the largest animal to have ever existed, the ocean teems with life in an abundance of forms and sizes. While the mysterious depths of the ocean remain largely unexplored, hiding creatures yet to be discovered. The sea plays a crucial role in regulating our climate, producing oxygen, and providing food and resources for billions of people worldwide. </p>
            </div>
          </div>
        </article>
        <article class="content-box">
          <h3 class="hp-1">Upcoming Events:</h3>
          <div class="wrapper">
              
              <?php
                require "conn.php";
                $sql = "SELECT * FROM events ORDER BY date_from ASC LIMIT 3";
                $result = mysqli_query($conn, $sql);
                $x = 1;
                $c = 1;
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<div class='col-".$x."'>";
                      echo "<figure class='img-box'>";
                      // Check if there's an image
                      if (!empty($row['photo'])) { // Assuming 'photo' is the BLOB column
                          // Output the image data with the correct headers
                          header("Content-type: image/jpeg"); // Adjust for other image types if needed
                          echo $row['photo'];
                      } else {
                          // Default image if none is found in the database
                          echo "<img src='images/page1-img2.jpg' alt=''>";
                      }
                      echo "</figure>";
                      echo "<h5><span>" . date('d', strtotime($row['date_from'])) . "</span> " . date('F', strtotime($row['date_from'])) . "</h5>";
                      echo "<p>" . $row['description'] . "</p>";
                      echo "</div>";
                      $c ++;
                      if ($c > 2){
                        $x ++;
                      }
                  }
              } else {
                  echo "No events found.";
              }
              ?>
            
              <!-- <figure class="img-box"> <img src="images/page1-img2.jpg" alt=""> </figure>
              <h5><span>31</span> june</h5>
              <p> Nam liber tempor cumuod soluta nobis eleifend option congue imperdiet doming id quod mazim placerat. </p>
            </div>
            <div class="col-1">
              <figure class="img-box"> <img src="images/page1-img3.jpg" alt=""> </figure>
              <h5><span>21</span> july</h5>
              <p> Lorem ipsum dolor amet, consectetuer adipiscing elitom nonummy nibh euismod tincidunt ut laoreet dolore magna. </p>
            </div>
            <div class="col-2">
              <figure class="img-box"> <img src="images/page1-img4.jpg" alt=""> </figure>
              <h5><span>03</span> August</h5>
              <p> Ut wisi enim ad minim veniam, quis nostrd exerci tation ullamcorper suscipit lobortis nisl ut aliquip. </p>
            </div> -->
          </div>
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
