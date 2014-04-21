<div id="about" ng-controller="AboutController">
  <div class="jumbotron">
    <img src="static/img/jumbotron-about.jpg" alt="jumbotron image">
  </div>
  <div id="content">
    <div class="container">
      <ul class="nav nav-pills">
        <li ng-repeat="tab in tabs" ng-class="{active: $state.includes('about.list', {tab: tab.id})}">
          <a ui-sref="about.list({tab: tab.id})">{{tab.text}}</a>
        </li>
      </ul>
      <div class="tab-content">
        <div ui-view class="page-fade"></div>
      </div>
    </div>
  </div>
</div>
