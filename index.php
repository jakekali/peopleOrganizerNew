<?php
include 'header.php';

//0 - not logged in
//1 - standaard user
//2 - benhamu

if($_SESSION['userType'] == 1){
    echo '
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                                <li><a href="/profile.php">Profile</a></li>
                                <li><a href="/logout.php">Log Out</a></li>
                            </ul>
                        </div>
                ';
}elseif($_SESSION['userType'] == 2){
    echo '
                         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="/search.php">Search</a></li>
                        <li><a href="/logout.php">Log Out</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->

                    ';
}else{
    echo '
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                                <li><a href="/login.php">Login</a></li>
                                <li><a href="/register.php">Register</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse --> 
                    ';
}
echo '
            </div><!-- /.container-fluid -->
    </nav>
</header>
<div class="jumbotron" style="width: 80%; margin:0 auto; padding: 3%">
    <h1>Hello World!</h1>
    <p>
        This is simple website, so we can help keep track of you people so we can better get you jobs!
        Please Login or Register.
    </p>
</div>

</body>
</html>
1325-1998-3101-2618-1103-4514 ';