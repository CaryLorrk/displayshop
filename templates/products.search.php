<div class="products_search" ng-controller="ProductsSearchController">
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-search"></span>
        </span>
        <input type="text" class="form-control" ng-model="searchText" placeholder="Search items">
      </div>
    </div>
  </div>
  <div ng-if="searchText.length >= 2" ng-repeat="item in items | filter: searchText" style="margin-top:10px; padding:10px;">
    <section>
      <div class="row">
        <div class="col-sm-4">
          <a href="javascript:;" ng-click="open_lightbox($index)">
            <img ng-src="static/img/thumbnails/{{item.id}}.jpg" class="img-thumbnail" title="{{item.title}}" alt="{{item.id}}">
          </a>
        </div>
        <div class="col-sm-8">
          <dl class="dl-horizontal" ng-repeat="dl in item.dl">
            <dt>{{dl.dt}}</dt>
            <dd ng-repeat="dd in dl.dd">{{dd}}</dd>
          </dl>
        </div>
      </div>
      <div class="description">
      </div>
    </section>
    <hr>
  </div>
</div>
