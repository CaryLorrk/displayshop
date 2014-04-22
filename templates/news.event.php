<div id="event">
<?php
  $json_file = file_get_contents("static/json/news.event.json");
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
