<div id="inquiry" ng-controller="InquiryController">
  <div class="jumbotron">
    <img src="static/img/jumbotron-inquiry.jpg" alt="jumbotron image">
  </div>
  <div id="content">
    <div class="container">
      <div id="form-alert" ng-show="alert.text" class="alert" ng-class="alert.type">
        <p class="text-center">{{alert.text}}</p>
      </div>
      <form name="form" class="form-horizontal" role="form" novalidate>
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label"><span popover="required" popover-trigger="mouseenter" class="text-danger">*&nbsp;</span>Name</label>
          <div class="col-sm-4">
            <div ng-class="{'has-error': form.name.$invalid && submitted,
                            'has-warning': form.name.$invalid && form.name.$dirty}">
              <input type="text" ng-model="inputs.name.content" class="form-control" id="name" name="name" placeholder="Name (required)" required>
              <span class="help-block" ng-show="form.name.$error.required && (form.name.$dirty || submitted)">Name is required.</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label"><span popover="required" popover-trigger="mouseenter" class="text-danger">*&nbsp;</span>E-Mail</label>
          <div class="col-sm-4">
            <div ng-class="{'has-error': form.email.$invalid && submitted,
                            'has-warning': form.email.$invalid && form.email.$dirty}">
              <input type="email" ng-model="inputs.email.content" class="form-control" id="email" name="email" placeholder="E-Mail (required)" required>
              <span class="help-block" ng-show="form.email.$error.required && (form.email.$dirty || submitted)">E-mail is required.</span>
              <span class="help-block" ng-show="form.email.$error.email && (form.email.$dirty || submitted)">This is not a valid e-mail.</span>
            </div>
          </div>
          <label for="company" class="col-sm-2 control-label">Company</label>
          <div class="col-sm-4">
            <input type="text" ng-model="inputs.company.content" class="form-control" id="company" placeholder="Company">
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">Phone</label>
          <div class="col-sm-4">
            <input type="text" ng-model="inputs.phone.content" class="form-control" id="phone" placeholder="Phone">
          </div>
          <label for="fax" class="col-sm-2 control-label">Fax Number</label>
          <div class="col-sm-4">
            <input type="text" ng-model="inputs.fax.content" class="form-control" id="fax" placeholder="Fax Number">
          </div>
        </div>
        <div class="form-group">
          <label for="website" class="col-sm-2 control-label">Website</label>
          <div class="col-sm-10">
            <input type="text" ng-model="inputs.website.content" class="form-control" id="website" placeholder="Website">
          </div>
        </div>
        <div class="form-group">
          <label for="country" class="col-sm-2 control-label">Country</label>
          <div class="col-sm-4">
            <input type="text" ng-model="inputs.country.content" class="form-control" id="country" placeholder="Country">
          </div>
          <label for="city" class="col-sm-2 control-label">City</label>
          <div class="col-sm-4">
            <input type="text" ng-model="inputs.city.content" class="form-control" id="city" placeholder="City">
          </div>
        </div>
        <div class="form-group">
          <label for="addr" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10">
            <input type="text" ng-model="inputs.addr.content" class="form-control" id="addr" placeholder="Address">
          </div>
        </div>
        <div class="form-group">
          <label for="profession" class="col-sm-2 control-label">Profession</label>
          <div id="profession" class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <label class="checkbox-inline">
                  <input id="profession-1" type="checkbox" ng-model="profession.dstributor" ng-true-value="Distributor" ng-false-value="">
                  Distributor
                </label>
                <label class="checkbox-inline">
                  <input id="profession-2" type="checkbox" ng-model="profession.dealer" ng-true-value="Dealer" ng-false-value="">
                  Dealer
                </label>
                <label class="checkbox-inline">
                  <input id="profession-3" type="checkbox" ng-model="profession.end_user" ng-true-value="End User" ng-false-value="">
                  End User
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <input id="professionOther" class="form-control" type="text" ng-model="profession.other" placeholder="Other">
            </div>
              </div>
          </div>
          <label for="specially" class="col-sm-2 control-label">Area of specially</label>
          <div id="specially" class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <label class="checkbox-inline">
                  <input id="specially-1" type="checkbox" ng-model="specially.shop" ng-true-value="Shop" ng-false-value="">
                  Shop
                </label>
                <label class="checkbox-inline">
                  <input id="specially-2" type="checkbox" ng-model="specially.chain_store" ng-true-value="Chain Store" ng-false-value="">
                  Chain Store
                </label>
                <label class="checkbox-inline">
                  <input id="specially-3" type="checkbox" ng-model="specially.space_design" ng-true-value="Space Design" ng-false-value="">
                  Space Design
                </label>
              </div>
              <div class="col-sm-12">
                <input id="speciallyOther" class="form-control" type="text" ng-model="specially.other" placeholder="Other">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="comment" class="col-sm-2 control-label"><span popover="required" popover-trigger="mouseenter" class="text-danger">*&nbsp;</span>Comment</label>
          <div class="col-sm-10">
            <div ng-class="{'has-error': form.comment.$invalid && submitted,
                            'has-warning': form.comment.$invalid && form.comment.$dirty}">
              <textarea id="comment" name="comment" class="form-control" cols="30" rows="5" ng-model="inputs.comment.content" placeholder="Comment (required)" required></textarea>
              <span class="help-block" ng-show="form.comment.$error.required && (form.comment.$dirty || submitted)">Comment is required.</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="captcha" class="col-sm-2 control-label"><span popover="required" popover-trigger="mouseenter" class="text-danger">*&nbsp;</span>Security Check</label>
          <img id="captcha" class="col-sm-2" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
	<button class="btn btn-link" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false"><span class="glyphicon glyphicon-refresh"></span>[ Different Image ]</a>
              </div>
            </div>
            <div class="div">
              <div class="col-sm-12">
                <div ng-class="{'has-error': (form.captcha.$invalid && submitted) || wrong_captcha,
                                'has-warning': form.captcha.$invalid && form.captcha.$dirty}">
                  <input type="text" ng-model="inputs.captcha.content" class="form-control" name="captcha" placeholder="Type the text (required)" autocomplete="off" ng-change="check_captcha()" required>
                  <span class="help-block" ng-show="form.captcha.$error.required && (form.captcha.$dirty || submitted)">Security code is required.</span>
                  <span class="help-block" ng-show="!form.captcha.$error.required && wrong_captcha && (form.captcha.$dirty || submitted)">Security code is wrong.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-primary" ng-click="submit()" ng-disabled="send!='Send'">
              <span class="glyphicon glyphicon-envelope"></span>&nbsp;{{send}}
            </button>
            <button type="reset" class="btn btn-danger" ng-click="reset();form.$setPristine()">Clear</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
