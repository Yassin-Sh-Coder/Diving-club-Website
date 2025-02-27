<!DOCTYPE html>
<html lang="en">
<head>
<title>DivingClub | Gallery</title>
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
          <li class="current"> <a href="gallery.php">Gallery</a>
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
        <article class="a2">
          <h3>Underwater photos</h3>
          <div class="wrapper">
            <div class="col-1">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img1.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">Consur sadipscing</a> <span class="capacity">(35 photos)</span> </div>
            </div>
            <div class="col-1">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img2.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">sed diam nonumy</a> <span class="capacity">(27 photos)</span> </div>
            </div>
            <div class="col-2">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img3.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">eirmod tempor</a> <span class="capacity">(56 photos)</span> </div>
            </div>
          </div>
          <div class="wrapper">
            <div class="col-1">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img4.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">Invidunt ut labore</a> <span class="capacity">(16 photos)</span> </div>
            </div>
            <div class="col-1">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img5.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">dolore magna</a> <span class="capacity">(31 photos)</span> </div>
            </div>
            <div class="col-2">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[1]"> <img src="images/page3-img6.jpg" alt=""> </a> </figure>
              <div class="gallery-meta"> <a href="#" class="gallery-name">vero eos accusam</a> <span class="capacity">(42 photos)</span> </div>
            </div>
          </div>
        </article>
        <article class="content-box">
          <h3>Recent Images</h3>
          <div class="wrapper p3">
            <?php
                require "conn.php";
                $sql = "SELECT * FROM gallery";
                $result = mysqli_query($conn, $sql);
                // $c = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-5">';
                        echo '<figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="' . $row["photo"] . '" alt=""> </a> </figure>';
                        echo '</div>';
                        // $c ++;
                        // if ($c > 4){
                        //   $
                        // }
                    }
                }
               else {
                echo '<p>No images found in the gallery.</p>';
            }
            mysqli_close($conn);
            ?>
            <!-- <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img7.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img8.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img9.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img10.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-6">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img11.jpg" alt=""> </a> </figure>
            </div>
          </div> -->
          <div class="wrapper p2">
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img12.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img13.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img14.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-5">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img15.jpg" alt=""> </a> </figure>
            </div>
            <div class="col-6">
              <figure class="img-box"> <a href="images/image-blank.png" class="lightbox-image" data-gal="prettyPhoto[2]"> <img src="images/page3-img16.jpg" alt=""> </a> </figure>
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
