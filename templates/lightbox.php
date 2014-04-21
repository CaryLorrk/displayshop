<div class="modal-header">
  <div class="row">
    <div class="col-xs-2">
      <button type="button" class="btn btn-link" ng-click="previous()" ng-disabled="idx <= 0">
        <span class="glyphicon glyphicon-chevron-left glyphicons-lg"></span>
      </button>
    </div>
    <div class="col-xs-2">
      <button type="button" class="btn btn-link" ng-click="next()" ng-disabled="idx >= items.length - 1">
        <span class="glyphicon glyphicon-chevron-right glyphicons-lg"></span>
      </button>
    </div>
    <div class="col-xs-5"></div>
    <div class="col-xs-3">
      <button type="button" class="btn btn-link" ng-click="close()">
        <span class="glyphicon glyphicon-remove glyphicons-lg"></span>
      </button>
    </div>
  </div>
</div>
<div class="modal-body">
  <div ng-repeat="item in items" ng-show="idx==$index" class="lightbox-img" id="lightbox-img-{{$index}}">
    <a ng-href="{{path[$index]}}" target="_blank">
      <img ng-src="{{path[$index]}}" alt="{{items[idx].id}}" imageonload />
    </a>
  </div>
</div>
<div class="modal-footer">
  <div class="text-center" ng-bind-html="items[idx].title"></div>
</div>
