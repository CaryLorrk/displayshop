<?php
function products_item($id, $title, $dl, $idx, $detail)
{
  $base_thumbnail_url = "static/img/thumbnails/";
  $format = '
    <section id="%1$s">
        <div class="row">
            <div class="col-sm-4">
              <a href="javascript:;" ng-click="open_lightbox(%5$s)">
                <img src="%2$s" class="img-thumbnail" title="%3$s" alt="%1$s">
              </a>
            </div>
            <div class="col-sm-8">
                <dl class="dl-horizontal">
                %4$s
                </dl>
            </div>
        </div>
        <div class="description">
          %6$s
        </div>
    </section>
    ';
  $dl_html = '';
  for ($i = 0; $i < sizeof($dl); $i++) {
    $dl_html = $dl_html . sprintf("<dt>%s</dt>", $dl[$i]["dt"]);
    for ($j = 0; $j < sizeof($dl[$i]["dd"]); $j++) {
      $dl_html = $dl_html . sprintf("<dd>%s</dd>", $dl[$i]["dd"][$j]);
    }
  }
  $description = join("\n", $detail);
  return sprintf($format, $id, $base_thumbnail_url.$id.".jpg", $title, $dl_html, $idx, $description);
}
  
?>

<div>
<?php
  $json_file = file_get_contents("static/json/products.".$group.".json");
  $json_array=json_decode($json_file, true);
  echo "<div id=\"$group\">";
  echo "<div ng-init='itemsInit(".$json_file.")'>";
  for ($i = 0; $i < sizeof($json_array); $i++) {
    $id = $json_array[$i]["id"];
    $title = $json_array[$i]["title"];
    $dl = $json_array[$i]["dl"];
    
    if (array_key_exists("detail", $json_array[$i])) {
      $detail = $json_array[$i]["detail"];
    }
    else {
      $detail = array();
    }
    echo products_item($id, $title, $dl, $i, $detail);
    if ($i != sizeof($json_array) - 1) {
      echo "<hr>";
    }
  }
  echo "</div>";
?>
</div>
