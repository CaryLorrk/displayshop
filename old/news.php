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
    <link href="./assets/css/news.css" rel="stylesheet">

    <script src="./assets/js/jquery-1.8.3.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.isotope.min.js"></script>
    <script src="./assets/yoxview/yoxview-init.js"></script>
    <script src="./assets/js/history.min.js"></script>
    <script src="./assets/js/custom.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".yoxview").each(function(index){
          $(this).yoxview({
            autoHideMenu: false,
            popupResizeTime: 0,
            autoHideInfo: false,
            renderInfoPin: false,
            renderInfoExternally: true
          });
        });

        $(".thumbnail a").click(function() {
          var dataTab = $(this).attr("data-tab");
          var etab = $(".nav-tabs a[href='"+dataTab+"']");
          etab.tab("show");
        });
      });
    </script>

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
          <a class="brand" href="./index.html">POLESTAR</a>
          <!-- Navbar Contents -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="./index.php">Home</a></li>
              <li><a href="./about.html">About Us</a></li>
              <li><a href="./products.php">Products</a></li>
              <li><a href="./gallery.php">Gallery</a></li>
              <li class="active"><a href="./news.php">News</a></li>
              <li><a href="./inquiry.php">Inquiry</a></li>
              <li><a href="./contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="jumbotron">
      <img src="./assets/img/jumbotron-news.jpg" alt="jumbotron image">
    </div>

    <div id="content">
      <div class="container">
        <div class="tabbale">
          <ul class="nav nav-tabs" id="gallery-tabs">
            <li class="active">
              <a href="#index" data-toggle="tab">Index</a>
            </li>
            <li>
              <a href="#event" data-toggle="tab">Event</a>
            </li>
            <li>
              <a href="#e-news" data-toggle="tab">E-news</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="index">
              <div class="row-fluid">
                <ul class="thumbnails">
                  <li class="span6">
                    <div class="thumbnail">
                      <a href="#event" data-toggle="tab" data-tab="#event">
                        <img src="./assets/img/thumbnails/event.jpg" title="Event" alt="event">
                      </a>
                      <div class="caption">
                        <h4>Event</h4>
                      </div>
                    </div>
                  </li>
                  <li class="span6">
                    <div class="thumbnail">
                      <a href="#e-news" data-toggle="tab" data-tab="#e-news">
                        <img src="./assets/img/thumbnails/e-news.jpg" title="E-news" alt="e-news">
                      </a>
                      <div class="caption">
                        <h4>E-news</h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="tab-pane fade" id="event">
<?php
  $json_file = file_get_contents("../static/json/news.event.json");
  $json_array=json_decode($json_file, true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $format = '
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th colspan="4">%s</th>
          </tr>
        </thead>
        <tbody>
        ';
    printf($format, $json_array[$i]['head']);
    $body = $json_array[$i]['body'];
    for ($j = 0; $j < sizeof($body); $j++) {
      $format = '
        <tr>
          <td>%s</td>
          <td>%s</td>
          <td>%s</td>
          <td>%s</td>
          <td><a href="%s" target="_blank">Link</a></td>
        </tr>
        ';
      printf($format, $body[$j]['event'], $body[$j]['location'],
        $body[$j]['date'], $body[$j]['note'], $body[$j]['link']);
    }
    echo '
        </tbody>
      </table>
      ';
  }
?>
</div>
            <div class="tab-pane fade" id="e-news">
<?php
  $json_file = file_get_contents("../static/json/news.e-news.json");
  $json_array=json_decode($json_file, true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]['id'];
    $caption = $json_array[$i]['caption'];
    if ($i % 3 == 0) {
      echo "<div class=\"row-fluid\">";
    }
    $format = '
      <li class="span4">
        <a target="_blank" href="/static/img/normal/e-news/%1$s.jpg">
          <img src="/static/img/thumbnails/e-news/%1$s.jpg" class="img-polaroid">
        </a>
        <div class="caption">
          <h4>%2$s</h4>
        </div>
      </li>
      ';
    printf($format, $id, $caption);
    if ($i % 3 == 2 || $i == sizeof($json_array) - 1) {
      echo "</div>";
    }
  }
?>

            </div>
          </div>
        </div>
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
