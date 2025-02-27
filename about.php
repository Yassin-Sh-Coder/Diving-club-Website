<!DOCTYPE html>
<html lang="en">
<head>
<title>DivingClub | About</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
<script src="js/jquery.cycle.all.min.js"></script>
<script>
$(function(){
	$('.content-slider').cycle({
		fx: 'fade',
		prev: '.cs-prev',
		next: '.cs-next'
	}); 
})
</script>
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
          <li class="current"><a href="about.php">About</a></li>
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
        <article class="a1">
          <div class="wrapper">
            <figure class="img-box img-indent-1"> <img src="images/page2-img1.jpg" alt=""> </figure>
            <div class="extra-wrap">
              <h3> About our club </h3>
              <p class="p2"> Welcome to DivingClub, your gateway to the mesmerizing underwater world! We are a community of passionate divers who share a love for exploring the ocean's depths. Whether you're a seasoned diver or just getting your fins wet, we offer a welcoming and supportive environment for all levels. Our club organizes regular dives to breathtaking local dive sites and exciting international destinations. We also host educational workshops, social events, and conservation initiatives to deepen our understanding and appreciation of marine life. Join us as we discover vibrant coral reefs, encounter fascinating marine creatures, and create unforgettable memories together. Dive in and become part of our aquatic family! </p>
            </div>
          </div>
        </article>
        <article class="content-box">
          <div class="wrapper">
            <div class="col-3 relative">
              <h3 class="hp-1">Testimonials</h3>
              <div class="content-slider">
                <section>
                  <blockquote class="quote-1">
                    <p class="p3"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait. </p>
                    <a href="#">David Crane</a> </blockquote>
                </section>
                <section>
                  <blockquote class="quote-1">
                    <p class="p3"> Blandit praesent luptatum zzril delenit augue duis dolore te feugait uis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui. </p>
                    <a href="#">Martin Pool</a> </blockquote>
                </section>
              </div>
              <a class="cs-prev"></a> <a class="cs-next"></a> </div>
            <div class="col-4">
              <h3 class="hp-1">Boats</h3>
              <div class="wrapper">
                <?php
                    require "conn.php";
                    $sql = "SELECT * FROM boats";
                    $result = mysqli_query($conn, $sql);
                    $x = 1;
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
                              echo "<img src='images/page2-img2.jpg' alt=''>";
                          }
                          echo "</figure>";
                          echo "<h5>" . $row['name']."</h5>";
                          echo "<p>" . $row['description'] . "</p>";
                          echo "</div>";
                          $x ++;
                      }
                    } else {
                        echo "No boats found.";
                    }
                ?>
                <!-- <div class="col-1">
                  <figure class="img-box"> <img src="images/page2-img2.jpg" alt=""> </figure>
                  <h5>Ut wisi enim ad</h5>
                  <p> Lorem ipsum dolor amet, consectetuer adipiscing elitom nonummy nibh euismod tincidunt ut laoreet dolore magna. </p>
                </div>
                <div class="col-2">
                  <figure class="img-box"> <img src="images/page2-img3.jpg" alt=""> </figure>
                  <h5>minim veniam</h5>
                  <p> Ut wisi enim ad minim veniam, quis nostrd exerci tation ullamcorper suscipit lobortis nisl ut aliquip. </p>
                </div> -->
              </div>
            </div>
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
