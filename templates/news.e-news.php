<div id="e-news">
<?php
  $json_file = file_get_contents("static/json/news.e-news.json");
  $json_array=json_decode($json_file, true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]['id'];
    $caption = $json_array[$i]['caption'];
    if ($i % 3 == 0) {
      echo "<div class=\"row\">";
    }
    $format = '
      <div class="col-sm-4">
        <a target="_blank" href="static/img/normal/e-news/%1$s.jpg">
          <img src="static/img/thumbnails/e-news/%1$s.jpg" class="img-thumbnail">
        </a>
        <div class="caption">
          <h4>%2$s</h4>
        </div>
      </div>
      ';
    printf($format, $id, $caption);
    if ($i % 3 == 2 || $i == sizeof($json_array) - 1) {
      echo "</div>";
    }
  }
?>
</div>
