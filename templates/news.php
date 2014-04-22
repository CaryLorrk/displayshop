<div id="news" ng-controller="NewsController">
  <div class="jumbotron">
    <img src="static/img/jumbotron/jumbotron-news-{{getResponsiveClass()}}.jpg" alt="jumbotron image">
  </div>
  <div id="content">
    <div class="container">
      <ul class="nav nav-pills">
        <li ng-repeat="tab in tabs" ng-class="{active: $state.includes('news.list', {tab: tab.id})}">
          <a href="javascript:;" ng-click="changeState('news-ui-view', 'news.list', {tab: tab.id})">{{tab.text}}</a>
        </li>
      </ul>
      <div class="tab-content">
        <div ui-view class="page-fade" id="news-ui-view"></div>
      </div>
    </div>
  </div>
</div>
