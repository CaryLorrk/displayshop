<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Shop fitting-Kupo Display</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Store Fixture, Shop Display, Display Rack, Shopfitting, Modular Display, Window Display, Retail, Store Interiors, Visual Merchandising, Space Design, In-Store Communication">
    <meta name="description" content="Polestar supplying a dedicated complete service and are ideal for shop display, shop fitting, display rack, retail area, window display, sales promotion, new product launch, point of sale, exhibition stand, showroom and anywhere it is important to delivery your message across quickly in dramatic fashion. Succinct, flexible and mobile are the basic design concepts of Polestar which is achieve eye-catching presentations, improve visual merchandising, capture attention and increase sales.">


    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">
    <link href="./assets/css/index.css" rel="stylesheet">

    <script src="./assets/js/jquery-1.8.3.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/custom.js"></script>

    <!-- HTML5 and Media Queries Supported for IE6-8 -->
    <!--[if lt IE 9]>
    <script src="./assets/js/html5.js"></script>
    <script src="./assets/js/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-43958182-2', 'displayshop.com.tw');
      ga('send', 'pageview');

    </script>

  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- Responsive Navbar Button -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./index.php">POLESTAR</a>
          <!-- Navbar Contents -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./about.html">About Us</a></li>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./gallery.php">Gallery</a></li>
                <li><a href="./news.php">News</a></li>
                <li><a href="./inquiry.php">Inquiry</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <a href="http://www.euroshop.de/exh_r/euroshop2014/e/2345304"></a>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="jumbotron">
        <img src="./assets/img/jumbotron-index.jpg" alt="jumbotron image">
        <div class="container">
          <img src="./assets/img/kupo-logo.gif" alt="kupo logo">
          <p>A flexible way to make your shop elegant.</p>
        </div>
      </div>
      <div class="indextxt">
        <p>Kupo Display is a professional manufactory for the retail and shopfitting industry. All our systems, Kupole, Pillar, Kube, X-Bone, Super Joint, are the eye catching design: Lightweight, Durable, Easy assemble, Flexible and Elegant. What we focus on is always to be your best partner in the shopftting. We can fit different purposes, ex: Beauty Salon shop, Bike store, Clothing store, Shoe store, Sport shop, and Office, Home, Department Stores…etc.. To create the brand-new image, Kupo display offer the best solution for the retail display and the shopfitting environments. </p>
        <p>Category: Store Fixture, Shop Display, Display Rack, Shopfitting, Modular Display, Window Display, Retail Store interiors, Visual Merchandising, Space Design, In-Store Communication.</div>
        <div id="content">
          <div class="container">
<?php
  function home_item($href, $img, $caption, $target) {
    $format = '
      <div class="span4">
        <div class="thumbnail">
          <a href="%1$s" target="%4$s">
            <img src="/%2$s" alt="%3$s">
          </a>
          <div class="caption">
            <h4>%3$s</h4>
          </div>
        </div>
      </div>';
    return sprintf($format, $href, $img, $caption, $target);
  }
  $json_array=json_decode(file_get_contents("../static/json/home.json"),true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $href = $json_array[$i]["href"];
    $href = str_replace("#/youtube", "youtube.html", $href);
    $img = $json_array[$i]["img"];
    $caption = $json_array[$i]["caption"];
    $target = $json_array[$i]["target"];
    if ($i % 3 == 0) {
      echo "<div class=\"row-fluid\"><div class=\"thumbnails\">";
    }
    echo home_item($href, $img, $caption, $target);
    if ($i % 3 == 2 || $i == sizeof($json_array) - 1) {
      echo "</div></div>";
    }
  }
?>
          </div>
        </div>

        <div id="toTop">
          <a href="javascript:void(0)">back to top</a>
        </div>

        <div class="footer">
          <div class="container">
            <p><strong>Kupo Co., Ltd</strong></p>
            <p>6F, No.4, Lane 609, Sec.5, Chung Shin Rd, San Chung District, New Taipei City, Taiwan.R.O.C.</p>
            <p>Tel:886-2-2999-1906</p>
            <p>Fax:886-2-2999-1955</p>
            <p>E-mail: <a href="mailto:display@kupo.com.tw">display@kupo.com.tw</a></p>
            <p><strong>- Copyright&copy; 2013 KUPO CO., LTD. -</strong></p>
          </div>
        </div>


      </body>
    </html>
