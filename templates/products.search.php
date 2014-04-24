<div class="products_search" ng-controller="ProductsSearchController">
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-search"></span>
        </span>
        <input type="text" class="form-control" ng-model="searchText" ng-change="search()" placeholder="Search items">
      </div>
    </div>
  </div>
  <div style="margin-top:10px; padding:10px;">
    <div ng-show="searchText.length==0" class="alert alert-info">
      <p>Please enter search text.</p>
    </div>
    <div ng-show="searchText.length && filteredItems.length==0" class="alert alert-danger">
      <p>No result.</p>
    </div>
    <div ng-if="searchText.length" ng-repeat="item in filteredItems | startFrom:currentPage*pageSize | limitTo: pageSize">
      <section>
        <div class="row">
          <div class="col-sm-4">
            <a href="javascript:;" ng-click="open_lightbox(currentPage*pageSize+$index)">
              <img ng-src="static/img/thumbnails/{{item.id}}.jpg" class="img-thumbnail" title="{{item.title}}" alt="{{item.id}}">
            </a>
          </div>
          <div class="col-sm-8">
            <dl class="dl-horizontal" ng-repeat="dl in item.dl">
              <dt>{{dl.dt}}</dt>
              <dd ng-repeat="dd in dl.dd" ng-class="{'bg-warning': checkSearch('{{dd}}')}">{{dd}}</dd>
            </dl>
          </div>
        </div>
        <div class="description">
        </div>
      </section>
      <div ng-bind-html="item.detail.join('')"></div>
      <hr>
    </div>
    <div ng-if="searchText.length && getNumberOfPages() > 1" class="text-center">
      <button class="btn btn-default" ng-disabled="currentPage == 0" ng-click="prev()">
        &larr;Previous
      </button>
      &nbsp;{{currentPage+1}}/{{getNumberOfPages()}}&nbsp;
      <button class="btn btn-default" ng-disabled="currentPage >= getNumberOfPages()-1" ng-click="next()">
        Next &rarr;
      </button>
    </div>
  </div>
</div>
