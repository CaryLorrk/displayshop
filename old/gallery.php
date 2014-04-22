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
    <link href="./assets/css/gallery.css" rel="stylesheet">

    <script src="./assets/js/jquery-1.8.3.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
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

        $("#index").find("a").click(function() {
          var dataTab = $(this).attr("data-tab");
          var etab = $("#gallery-tabs").find("a[href='"+dataTab+"']");
          var dataAnchor = $(this).attr("data-anchor");
          etab.on('shown',function(){scrollToAnchor(dataAnchor); $(this).off("shown");});
          etab.tab("show");
        });

        $(function() {
          var baseURL = "/static/img/thumbnails/";
          $("#index").find("img").each(function(index) {
            $(this).attr("src", baseURL+$(this).attr("alt")+".jpg");
            $(this).addClass("loaded");
          });

          $("#gallery-tabs").bind("show", function(e) {
            var pattern=/#.+/gi
            var contentID = e.target.toString().match(pattern)[0];
            $(contentID).find("img").each(function (index) {
              if (!($(this).hasClass("loaded"))) {
                $(this).attr("src", baseURL+$(this).attr("alt")+".jpg");
                $(this).addClass("loaded");
              }
            });
          });                    
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
              <li class="active"><a href="./gallery.php">Gallery</a></li>
              <li><a href="./news.php">News</a></li>
              <li><a href="./inquiry.php">Inquiry</a></li>
              <li><a href="./contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="jumbotron">
      <img src="./assets/img/jumbotron-gallery.jpg" alt="jumbotron image">
    </div>

    <div id="content">
      <div class="container">
        <div class="tabbale">
          <ul class="nav nav-tabs" id="gallery-tabs">
            <li class="active">
              <a href="#index" data-toggle="tab">Index</a>
            </li>
            <li>
              <a href="#projects" data-toggle="tab">Projects</a>
            </li>
            <li>
              <a href="#sketches" data-toggle="tab">Sketches</a>
            </li>
          </ul>
          <div class="tab-content">
<?php
function gallery_index_subjects($id, $text, $sec_id)
{
  $base_thumbnail_url = "/static/img/thumbnails/";
  $format = '
    <li class="span4">
      <div class="thumbnail">
        <a href="#%3$s" data-toggle="tab" data-tab="#%3$s" data-anchor="%1$s">
          <img src="assets/img/blank.gif" title="%2$s" alt="%1$s">
        </a>
        <div class="caption">
          <h4>%2$s</h4>
        </div>
      </div>
    </li>';

  return sprintf($format, $id, $text, $sec_id);

  return sprintf($format, $base_thumbnail_url.$id.".jpg", $id, $title, $caption, $group);
}

$json_array=json_decode(file_get_contents("../static/json/gallery.index.json"), true);
echo '<div class="tab-pane fade active in" id="index">';
for ($i = 0; $i < sizeof($json_array); $i++) {
  $id = $json_array[$i]["id"];
  $text = $json_array[$i]["text"];
  $subjects = $json_array[$i]["subjects"];
  echo "<section>";
  echo "<h2>" . $text . "</h2>";
  for ($j = 0; $j < sizeof($subjects); $j++) {
      $sub_id = $subjects[$j]["id"];
      $sub_text = $subjects[$j]["text"];
    if ($j % 3 == 0){
      echo "<div class=\"row-fluid\"><ul class=\"thumbnails\">";
    }
      echo gallery_index_subjects($sub_id, $sub_text, $id);
      if ($j % 3 == 2 || $j == sizeof($subjects) - 1) {
        echo "</ul></div>";
      }
  }
  echo "</section>";
  if ($i < sizeof($json_array) - 1) {
    echo "<hr>";
  }
}
echo '</div>';

function gallery_item($id, $title)
{
  $base_url = "/static/img/normal/";
  $format = '
    <span>
      <a href="'.$base_url.'%1$s.jpg" class="yoxview">
        <img src="assets/img/blank.gif" title="%2$s" alt="%1$s">
      </a>
    </span>
    ';
  return sprintf($format, $id, $title);
}
function group($tab) {
$json_file = file_get_contents("../static/json/gallery.".$tab.".json");
$json_array=json_decode($json_file, true);
echo "<section id=\"".$json_array['id']."\">";
echo "<h4>".$json_array['text']."</h4>";
echo "<div class=\"container small\">";
for ($i = 0; $i < sizeof($json_array['items']); $i++) {
  $id = $json_array['items'][$i]["id"];
  $title = $json_array['items'][$i]["title"];
  
  echo gallery_item($id, $title);
}
echo "</div></section>";
}
?>
<div id="projects" class="tab-pane fade">
<?php
group('beauty-salon');
echo "<hr>";
group('bike-shop');
echo "<hr>";
group('boutique');
echo "<hr>";
group('clothing-store');
echo "<hr>";
group('promotion-kit');
echo "<hr>";
group('others');
?>
</div>
            <div class="tab-pane fade" id="sketches">
<?php
group('kupole-system');
echo "<hr>";
group('bike-fixture');
echo "<hr>";
group('pillar-system');
echo "<hr>";
group('super-joint-system');
echo "<hr>";
group('kube-system');
echo "<hr>";
group('x-bone');
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
