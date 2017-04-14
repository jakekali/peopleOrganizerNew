<?php
include 'vendor/autoload.php';
//include 'users.php';
include "header.php";
    $user = new users;
    $userID = $_SESSION['userID'];
    $userInfo = $user->getUserInfo($userID);

echo'
            </div><!-- /.container-fluid -->
    </nav>
</header>';
echo '
    <div class="container" style="padding-top: 1%; margin: auto; width: 90%">
  <h1 class="page-header">Edit Profile - User ID: '.$userID.'</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-3 col-xs-12">
      <div class="text-center">
        <img src="'.$userInfo['pictureLink'].'" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="'.$userInfo['firstName'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="'.$userInfo['lastName'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Year of HS Graduation:</label>
          <div class="col-lg-8">
            <input class="form-control" value="'.$userInfo['yearHSGrad'].'" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="'.$userInfo['email'].'" type="text">
          </div>
        </div>
        <!--
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        -->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
        <div class="text-center">
        <embed src="'.$userInfo['resumeLink'].'"  width="550px" height="550px" type=\'application/pdf\'>
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm">
      </div>
      </form>
    </div>
  </div>
</div>
';



