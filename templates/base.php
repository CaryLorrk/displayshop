<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" id="ng-app" ng-app="DisplayShop" ng-controller="BaseController">
  <head>
    <title>Shop fitting-Kupo Display</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Store Fixture, Shop Display, Display Rack, Shopfitting, Modular Display, Window Display, Retail, Store Interiors, Visual Merchandising, Space Design, In-Store Communication">
    <meta name="description" content="Polestar supplying a dedicated complete service and are ideal for shop display, shop fitting, display rack, retail area, window display, sales promotion, new product launch, point of sale, exhibition stand, showroom and anywhere it is important to delivery your message across quickly in dramatic fashion. Succinct, flexible and mobile are the basic design concepts of Polestar which is achieve eye-catching presentations, improve visual merchandising, capture attention and increase sales.">

    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/base.css" rel="stylesheet">
    <link href="static/css/{{$state.current.name.split('.')[0]}}.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="static/js/html5shiv.min.js"></script>
    <script src="static/js/respond.min.js"></script>
    <script src="static/js/es5-sham.min.js"></script>
    <script src="static/js/es5-shim.min.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <script>
      window.location.replace("old/index.php");
    </script>
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
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" ng-click="navCollapsed = !navCollapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="javascript:;" ng-click="changeState('base-ui-view', 'home', {})">POLESTAR</a>
        </div>
        <div class="navbar-collapse" collapse="navCollapsed">
          <ul class="nav navbar-nav navbar-right">
            <li ng-class="{active: $state.includes('home')}" ng-click="navCollapsed = true">
              <a href="javascript:;" ng-click="changeState('base-ui-view', 'home', {})"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a>
            </li>
            <li ng-class="{active: $state.includes('about')}" ng-click="navCollapsed = true">
              <a href="javascript:;" ng-click="changeState('base-ui-view', 'about', {})"><span class="glyphicon glyphicon-user"></span>&nbsp;About</a>
            </li>
            <li ng-class="{active: $state.includes('products')}" ng-click="navCollapsed = true">
              <a href="javascript:;" ng-click="changeState('base-ui-view', 'products', {})"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Products</a>
            </li>
            <li ng-class="{active: $state.includes('gallery')}" ng-click="navCollapsed = true">
              <a href="javascript:;" ng-click="changeState('base-ui-view', 'gallery', {})"><span class="glyphicon glyphicon-picture"></span>&nbsp;Gallery</a>
            </li>
            <li ng-class="{active: $state.includes('news')}" ng-click="navCollapsed = true">
              <a  href="javascript:;" ng-click="changeState('base-ui-view', 'news', {})"><span class="glyphicon glyphicon-calendar"></span>&nbsp;News</a>
            </li>
            <li ng-class="{active: $state.includes('inquiry')}" ng-click="navCollapsed = true">
              <a href="javascript:;" ng-click="changeState('base-ui-view', 'inquiry', {})"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Inquiry</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div ui-view class="page-fade" id="base-ui-view"></div>

    <div id="toTop">
        <button class="btn btn-link" ng-click="toTop()">back to top</button>
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

    <img src='static/img/jumbotron/jumbotron-home-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <img src='static/img/jumbotron/jumbotron-about-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <img src='static/img/jumbotron/jumbotron-products-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <img src='static/img/jumbotron/jumbotron-gallery-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <img src='static/img/jumbotron/jumbotron-news-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <img src='static/img/jumbotron/jumbotron-inquiry-{{getResponsiveClass()}}.jpg' class="ng-hide">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/angular.min.js"></script>
    <script src="static/js/angular-animate.min.js"></script>
    <script src="static/js/angular-sanitize.min.js"></script>
    <script src="static/js/ui-bootstrap.min.js"></script>
    <script src="static/js/ui-router.min.js"></script>
    <script src="static/js/DisplayShop.js"></script>
  </body>
</html>
