<?php
function gallery_item($id, $title, $idx)
{
  $base_thumbnail_url = "static/img/thumbnails/";
  $format = '
    <div class="col-xs-6 col-sm-3 col-md-2">
      <a href="javascript:;" ng-click="open_lightbox(%4$s)">
        <img alt="%1$s" src="%2$s" title="%3$s">
      </a>
    </div>
    ';
  return sprintf($format, $id, $base_thumbnail_url.$id.".jpg", $title, $idx);
}
  
?>
<div>
<?php
  $json_file = file_get_contents("static/json/gallery.".$tab.".json");
  $json_array=json_decode($json_file, true);
  echo "<div id=\"$tab\">";
  echo "<div ng-init='itemsInit(".$json_file.")'>";
  echo "<div class='row small'>";
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]["id"];
    $title = $json_array[$i]["title"];
    
    echo gallery_item($id, $title, $i);
  }
  echo "</div>";
  echo "</div>";
?>
</div>
