<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">People Organizer</a>
                </div>

                <!-- //TODO add logic to determine the type of user and if they are logged in
                <?php
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
                ?>
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