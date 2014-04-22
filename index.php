<?php

session_start();
include_once 'securimage/securimage.php';
require 'Slim/Slim.php';
$app = new Slim(array(
  'debug' => true,
  'templates.path' => 'templates',
));

$app->get('/', 'base_view');
function base_view() {
  $app = Slim::getInstance();
  $app->render('base.php');
}

$app->post('/securimage/securimage_ajax', 'securimage_ajax_view');
function securimage_ajax_view() {
  $app = Slim::getInstance();
  $input = file_get_contents('php://input');
  $data = json_decode($input, true);
  $securimage = new Securimage();
  $securecode = $securimage->getCode();
  $response = $app->response(); 
  if (strtolower($securecode) != strtolower($data['input'])) {
    $response->status(402);
  }
  $response['Content-Type'] = 'application/json';
  $response->body($input);
}

$app->post('/sendemail', 'sendemail_view');
function sendemail_view() {
  $app = Slim::getInstance();
  $data = json_decode(file_get_contents('php://input'), true);
  $securimage = new Securimage();
  if ($securimage->check($data['captcha']['content']) == false) {
    $app->response()->status(402);
    return;
  }
  $from = $data['name']['content'] . ' <' . $data['email']['content'] . '>';
  $message = '<table class="table">';
  foreach ($data as $key => $value){
    $text = $data[$key]['text'];
    if (array_key_exists('content', $data[$key])) {
      $content = $data[$key]['content'];
    } else {
      $content = "";
    }
    if ($key == 'comment') {
      $content = nl2br($content);
    }
    $message = "$message <tr><th>$text</th><td>$content</td></tr>";
  }
  $message = "$message </table>";

  $to = "display@kupo.com.tw";
  $subject = 'POLESTAR inquiry from ' . $from;
  if(!mail($to, $subject, wordwrap($message, 70),
    "From: POLESTAR website\nContent-Type: text/html;\n")){
    $app->response()->status(500);
    return;
  }
};

$app->get('/:page', 'page_view');
function page_view($page) {
  $app = Slim::getInstance();
  $app->render("$page.php");
}

$app->get('/about/group', 'about_group_view');
function about_group_view() {
  $app = Slim::getInstance();
  $app->render('about.group.php');
}

$app->get('/about/polestar', 'about_polestar_view');
function about_polestar_view() {
  $app = Slim::getInstance();
  $app->render('about.polestar.php');
}

$app->get('/about/contact', 'about_contact_view');
function about_contact_view() {
  $app = Slim::getInstance();
  $app->render('about.contact.php');
}

$app->get('/products/new', 'product_new_view');
function product_new_view()
{
  $app = Slim::getInstance();
  $app->render('products.new.php');
}

$app->get('/products/:tab', 'product_list_view');
function product_list_view($tab)
{
  $app = Slim::getInstance();
  $app->render('products.list.php', array("group" => $tab));
}

$app->get('/gallery/index', 'gallery_index_view');
function gallery_index_view()
{
  $app = Slim::getInstance();
  $app->render('gallery.index.php');
}

$app->get('/gallery/:tab', 'gallery_list_view');
function gallery_list_view($tab)
{
  $app = Slim::getInstance();
  $app->render('gallery.list.php', array("tab" => $tab));
}

$app->get('/news/event', 'news_event_view');
function news_event_view()
{
  $app = Slim::getInstance();
  $app->render('news.event.php');
}

$app->get('/news/e-news', 'news_enews_view');
function news_enews_view()
{
  $app = Slim::getInstance();
  $app->render('news.e-news.php');
}

$app->get('/lightbox', 'lightbox_view');
function lightbox_view()
{
  $app = Slim::getInstance();
  $app->render('lightbox.php');
}

$app->run();
?>
