<?php
function products_new_item($id, $group, $title, $caption)
{
  $base_thumbnail_url = "static/img/thumbnails/";
  $format = '
    <div class="col-sm-3">
      <div class="thumbnail">
        <a href="javascript:;" ng-click="jump_to_item({id: \'%2$s\', group: \'%5$s\'})">
          <img src="%1$s" title="%3$s" alt="%2$s">
        </a>
        <div class="caption">
          <h5>%4$s</h5>
        </div>
      </div>
    </div>';

  return sprintf($format, $base_thumbnail_url.$id.".jpg", $id, $title, $caption, $group);
}

?>
<div id="products_new">
<?php
  $json_array=json_decode(file_get_contents("static/json/products.new.json"), true);
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]["id"];
    $group = $json_array[$i]["group"];
    $title = $json_array[$i]["title"];
    $caption = $json_array[$i]["caption"];
    if ($i % 4 == 0) {
      echo "<div class=\"row\">";
    }
    echo products_new_item($id, $group, $title, $caption);
    if ($i % 4 == 3 || $i == sizeof($json_array) - 1) {
      echo "</div>";
    }
  }
?>
</div>
