<?php
include 'header.php';
echo '
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/index.php">Home <span class="sr-only">(current)</span></a></li>
                                <li class="active"><a href="/login.php">Login</a></li>
                                <li><a href="/register.php">Register</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse --> 
                      
            </div><!-- /.container-fluid -->
    </nav>
</header>
';



echo '
                    <form class="panel panel-default" style="width: 35%; margin: auto" action="logger.php" method="post">
                        <div class="panel-heading">Login In</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                              </div>
                          <div class="checkbox">
                            <label>
                         <input type="checkbox" name="remember"> Remember Me
                            </label>
                          </div>
                          <button type="submit" class="btn btn-default" style="margin: auto">Login</button>
                        </div>';
    if($_SESSION['loginReturn']['error']==true){
    echo'
        <div class="alert alert-danger" style="width: 90%; margin: auto">
            <strong>I\'m Sorry!</strong> '.$_SESSION['loginReturn']['message'].'
        </div>
        <br>
        ';
}

                 echo'   </form>
';

