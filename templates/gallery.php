<div id="gallery" ng-controller="GalleryController">
  <div class="jumbotron">
    <img src="static/img/jumbotron-gallery.jpg" alt="jumbotron image">
  </div>
  <div id="content">
    <div class="container">
      <ul class="nav nav-pills">
        <li ng-class="{active: $state.includes('gallery.index')}">
          <a ui-sref="gallery.index">Index</a>
        </li>
        <li class="dropdown" ng-class="{active: dropdown_check(projects)}">
          <a href="javascript:;" class="dropdown-toggle">Projects<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li ng-repeat="project in projects">
              <a ui-sref="gallery.list({tab: project.id})">{{project.text}}</a>
            </li>
          </ul>
        </li>
        <li class="dropdown" ng-class="{active: dropdown_check(sketches)}">
          <a href="javascript:;" class="dropdown-toggle">Sketches<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li ng-repeat="sketch in sketches">
              <a ui-sref="gallery.list({tab: sketch.id})">{{sketch.text}}</a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="tab-content">
        <div ui-view class="page-fade"></div>
      </div>
    </div>
  </div>
</div>
