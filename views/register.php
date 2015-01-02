
      <div class="row">

      <form class="form-horizontal" role="form" method="post" data-ng-submit=""
            id="product-form" enctype="multipart/form-data">

          <div class="form-group">
              <label for="fname" class="col-xs-4 control-label"> First Name </label>

              <div class="col-xs-4">
                  <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname"
                         data-validation="required" value="<?php echo $customer['fname'] ?>">
              </div>
          </div>

          <div class="form-group">
              <label for="lname" class="col-xs-4 control-label"> Last Name </label>

              <div class="col-xs-4">
                  <input type="text" class="form-control" id="lname" placeholder="Last Name"
                         name="lname" data-validation="required" value="<?php echo $customer['lname'] ?>">
              </div>
          </div>

          <div class="form-group">
              <label for="email" class="col-xs-4 control-label"> Email </label>

              <div class="col-xs-4">
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $customer['email'] ?>">
              </div>
          </div>

          <div class="form-group">
              <label for="password1" class="col-xs-4 control-label"> Password </label>

                <div class="col-xs-4">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password" data-validation="length" 
                      data-validation-length="min6" data-validation="confirmation" maxlength="12">
              </div>
          </div>

          <div class="form-group">
              <label for="password2" class="col-xs-4 control-label"> Password </label>

                <div class="col-xs-4">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Password" data-validation="length" 
                      data-validation-length="min6" data-validation="confirmation" maxlength="12">
              </div>
          </div>

            <div class="form-group">
              <label for="captcha" class="col-xs-4 control-label">  </label>

              <div class="col-xs-4">
                  <div class="col-xs-7" id="imgdiv"><img id="captcha-image" ng-src="/ecommerce/functions/captcha.php" width="180" height="50" /></div>
                  <div class="col-xs-5"> <img id="reload" ng-src="/ecommerce/images/reload.png"/></div>
              </div>
          </div>

          <div class="form-group">
              <label for="captcha" class="col-xs-4 control-label"> Captcha </label>

              <div class="col-xs-4">
                  <input type="text" class="form-control" id="captcha" placeholder="Captcha Text" name="captcha"
                  data-validation="length" data-validation-length="min6" maxlength="6" minlength="6">
              </div>
          </div>

          <input name="register" type="hidden" value="<?php echo $register ?>">

          <div class="form-group">
             &nbsp;&nbsp; <button type="submit" class="btn btn-md btn-primary col-xs-offset-4" value="submit" name="submit" id="submit"> &nbsp;
                  <span class="glyphicon glyphicon-floppy-saved"></span> Register Now &nbsp; </button>
          </div>

      </form>

    </div>