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
        <link href="./assets/css/products.css" rel="stylesheet">

        <script src="./assets/js/jquery-1.8.3.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>
        <script src="./assets/yoxview/yoxview-init.js"></script>
        <script src="./assets/js/history.min.js"></script>
        <script src="./assets/js/custom.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $(".yoxview").yoxview({
                    autoHideMenu: false,
                    popupResizeTime: 0,
                    autoHideInfo: false,
                    renderInfoPin: false,
                    renderInfoExternally: true
                });

                $("#new").find("a").click(function() {
                    var dataTab = $(this).attr("data-tab");
                    var etab = $("#products-tabs").find("a[href='"+dataTab+"']");
                    var dataAnchor = $(this).attr("data-anchor");
                    etab.on('shown',function(){scrollToAnchor(dataAnchor); $(this).off("shown");});
                    etab.tab("show");
                });

                $(function() {
                    var baseURL = "/static/img/thumbnails/";
                    $("#new").find("img").each(function(index) {
                        $(this).attr("src", baseURL+$(this).attr("alt")+".jpg");
                        $(this).addClass("loaded");
                    });
                    
                    $("#products-tabs").bind("show", function(e) {
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
	                <li class="active"><a href="./products.html">Products</a></li>
	                <li><a href="./gallery.php">Gallery</a></li>
	                <li><a href="./news.php">News</a></li>
	                <li><a href="./inquiry.php">Inquiry</a></li>
	                <li><a href="./contact.html">Contact</a></li>
	              </ul>
	          </div>
            </div>
          </div>
        </div>

        <div class="jumbotron">
        	<img src="./assets/img/jumbotron-products.jpg" alt="jumbotron image">
        </div>

        <div id="content">
            <div class="container">
                <div class="tabbale">
                    <ul class="nav nav-tabs" id="products-tabs">
                        <li class="active">
                            <a href="#new" data-toggle="tab">New Products</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Kupole System 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#kupole" data-toggle="tab">Kupole</a>
                                </li>   
                                <li>
                                    <a href="#500" data-toggle="tab">500 series</a>
                                </li>   
                                <li>
                                    <a href="#600" data-toggle="tab">600 series</a>
                                </li>  
                                <li>
                                    <a href="#700" data-toggle="tab">700 series</a>
                                </li>  
                                <li>
                                    <a href="#800" data-toggle="tab">800 series</a>
                                </li>  
                                <li>
                                    <a href="#900" data-toggle="tab">900 series</a>
                                </li>    
                                <li>
                                    <a href="#others" data-toggle="tab">Others</a>
                                </li>                            
                            </ul>
                        </li>

                        <li>
                            <a href="#pillar" data-toggle="tab">Pillar System</a>
                        </li>
                        <li>
                            <a href="#super_joint" data-toggle="tab">Super Joint System</a>
                        </li>
                        <li>
                            <a href="#kube" data-toggle="tab">Kube System</a>
                        </li>
                        <li>
                            <a href="#x-bone" data-toggle="tab">X-Bone</a>
                        </li>
                        <li>
                            <a href="#spotlight" data-toggle="tab">Spotlight</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="new">
<?php
function products_new_item($id, $group, $title, $caption)
{
  $base_thumbnail_url = "/static/img/thumbnails/";
  $format = '
    <div class="span3">
      <div class="thumbnail">
        <a href="#%5$s" data-toggle="tab" data-tab="#%5$s" data-anchor="%2$s">
          <img src="./assets/img/blank.gif" title="%3$s" alt="%2$s">
        </a>
        <div class="caption">
          <h5>%4$s</h5>
        </div>
      </div>
    </div>';
  $group = str_replace("kupole.", "", $group);
  return sprintf($format, $base_thumbnail_url.$id.".jpg", $id, $title, $caption, $group);
}
$json_array=json_decode(file_get_contents("../static/json/products.new.json"), true);
for ($i = 0; $i < sizeof($json_array); $i++) {
  $id = $json_array[$i]["id"];
  $group = $json_array[$i]["group"];
  $title = $json_array[$i]["title"];
  $caption = $json_array[$i]["caption"];

  if ($i % 4 == 0) {
    echo "<div class=\"row-fluid\"><ul class=\"thumbnails\">";
                              
  }
  echo products_new_item($id, $group, $title, $caption);
  if ($i % 4 == 3 || $i == sizeof($json_array) - 1) {
    echo "</ul></div>";
  }
}


?>
                        </div>
<?php
function group($type) {
  $json_file = file_get_contents("../static/json/products.".$type.".json");
  $json_array=json_decode($json_file, true);
  $type = str_replace("kupole.", "", $type);
  $base_url = "/static/img/normal/";
  $format = '
    <section id="%1$s">
      <div class="row-fluid">
        <div class="span4">
          <a href="'.$base_url.'%1$s.jpg" class="yoxview">
            <img src="assets/img/blank.gif" class="img-polaroid" title="%3$s" alt="%1$s">
          </a>
        </div>
        <div class="span8">
          <dl class="dl-horizontal">
            %4$s
          </dl>
        </div>
      </div>
      <div class="description">
        %5$s
      </div>
    </section>';
  echo "<div class='tab-pane fade' id='$type'>";
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]["id"];
    $title = $json_array[$i]["title"];
    $dl = $json_array[$i]["dl"];

    if (array_key_exists("detail", $json_array[$i])) {
      $detail = $json_array[$i]["detail"];
    } else {
      $detail = array();
    }
    $dl_html = '';
    for ($k = 0; $k < sizeof($dl); $k++) {
      $dl_html = $dl_html . sprintf("<dt>%s</dt>", $dl[$k]["dt"]);
      for ($j = 0; $j < sizeof($dl[$k]["dd"]); $j++) {
        $dl_html = $dl_html . sprintf("<dd>%s</dd>", $dl[$k]["dd"][$j]);
      }
    }
    $description = join("\n", $detail);
    printf($format, $id, $base_thumbnail_url.$id.".jpg", $title, $dl_html, $description);
    if ($i != sizeof($json_array) - 1) {
      echo "<hr>";
    }
  }
  echo "</div>";
}
group("kupole");
group("kupole.500");
group("kupole.600");
group("kupole.700");
group("kupole.800");
group("kupole.900");
group("kupole.others");
group("pillar");
group("super_joint");
group("kube");
group("x-bone");
group("spotlight");
?>
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
