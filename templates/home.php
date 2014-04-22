<?php
  function home_item($href, $img, $caption, $target)
  {
    $format = '
      <div class="col-sm-4">
        <div class="thumbnail">
          <a href="%1$s" target="%4$s">
            <img src="%2$s" alt="%3$s">
          </a>
          <div class="caption">
            <h4>%3$s</h4>
          </div>
        </div>
      </div>';
    return sprintf($format, $href, $img, $caption, $target);
  }
?>
<div id="home">
  <div class="jumbotron">
    <img src="static/img/jumbotron-home.jpg" alt="jumbotron image">
    <div class="container">
      <img src="static/img/kupo-logo.gif" alt="kupo logo">
      <p>A flexible way to make your shop elegant.</p>
    </div>
  </div>
  <div class="indextxt">
    <p>Kupo Display is a professional manufactory for the retail and shopfitting industry. All our systems, Kupole, Pillar, Kube, X-Bone, Super Joint, are the eye catching design: Lightweight, Durable, Easy assemble, Flexible and Elegant. What we focus on is always to be your best partner in the shopftting. We can fit different purposes, ex: Beauty Salon shop, Bike store, Clothing store, Shoe store, Sport shop, and Office, Home, Department Stores…etc.. To create the brand-new image, Kupo display offer the best solution for the retail display and the shopfitting environments. </p>
    <p>Category: Store Fixture, Shop Display, Display Rack, Shopfitting, Modular Display, Window Display, Retail Store interiors, Visual Merchandising, Space Design, In-Store Communication.
  </div>
  <div id="content">
    <div class="container">
<?php
  $json_array=json_decode(file_get_contents("static/json/home.json"),true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $href = $json_array[$i]["href"];
    $img = $json_array[$i]["img"];
    $caption = $json_array[$i]["caption"];
    $target = $json_array[$i]["target"];
    if ($i % 3 == 0) {
      echo "<div class=\"row\">";
    }
    echo home_item($href, $img, $caption, $target);
    if ($i % 3 == 2 || $i == sizeof($json_array) - 1) {
      echo "</div>";
    }
  }
?>
    </div>
  </div>
</div>
