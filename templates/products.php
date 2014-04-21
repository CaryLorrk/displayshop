<div id="products" ng-controller="ProductsController">
  <div class="jumbotron">
    <img src="static/img/jumbotron-products.jpg" alt="jumbotron image">
  </div>
  <div id="content">
    <div class="container">
      <ul class="nav nav-pills">
        <li ng-class="{active: $state.includes('products.new')}">
          <a ui-sref="products.new">New Products</a>
        </li>
        <li class="dropdown" ng-class="{active: dropdown_check(kupoles)}">
          <a href="javascript:;" class="dropdown-toggle">Kupole System<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li ng-repeat="series in kupoles">
              <a ui-sref="products.list({tab: series.id})">{{series.text}}</a>
            </li>
          </ul>
        </li>
        <li ng-repeat="group in groups" ng-class="{active: $state.includes('products.list', {tab: group.id})}">
          <a ui-sref="products.list({tab: group.id})">{{group.text}}</a>
        </li>
      </ul>
      <div class="tab-content">
        <div ui-view class="page-fade"></div>
      </div>
    </div>
  </div>
</div>
