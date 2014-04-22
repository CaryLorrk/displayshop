<?php
function gallery_index_subjects($id, $text)
{
  $base_thumbnail_url = "static/img/thumbnails/";
  $format = '
    <div class="col-sm-4">
      <div class="thumbnail">
        <a href="javascript:;" ng-click="changeState(\'gallery-ui-view\', \'gallery.list\', {tab: \'%1$s\'})">
          <img src="static/img/thumbnails/%1$s.jpg" title="%2$s" id=%1$s>
        </a>
        <div class="caption">
          <h4>%2$s</h4>
        </div>
      </div>
    </div>';

  return sprintf($format, $id, $text);

  return sprintf($format, $base_thumbnail_url.$id.".jpg", $id, $title, $caption, $group);
}

?>
<div id="gallery_index">
<?php
  $json_array=json_decode(file_get_contents("static/json/gallery.index.json"), true);
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
        echo "<div class=\"row\">";
      }
        echo gallery_index_subjects($sub_id, $sub_text);
        if ($j % 3 == 2 || $j == sizeof($subjects) - 1) {
          echo "</div>";
        }
    }
    echo "</section>";
    if ($i < sizeof($json_array) - 1) {
      echo "<hr>";
    }
  }
?>
</div>
