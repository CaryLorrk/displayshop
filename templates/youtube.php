<div class="youtube">
  <div id="content">
    <div class="container">
<?php
  $json_file = file_get_contents("static/json/youtube.json");
  $json_array=json_decode($json_file, true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $title = $json_array[$i]['title'];
    $src = $json_array[$i]['src'];
    $format = '
      <section>
        <h4>%s</h4>
        <div class="video-container">
          <iframe width="560" height="315" src="%s" frameborder="0" allowfullscreen></iframe>
        </div>
      </section>
      ';
    printf($format, $title, $src);
    if ($i != sizeof($json_array) - 1) {
      echo "<hr>";
    }
  }
?>
    </div>
  </div>
</div>
