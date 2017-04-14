<?php
include_once 'vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: joey
 * Date: 4/13/2017
 * Time: 8:47 PM
 */
class users
{
    private $firstName;
    private $lastName;
    private $email;
    private $HSGraduationYear;

    public function registerUser($firstName, $lastName, $email, $HSGradYear, $password){
        $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpauth", "root", "");
        $config = new PHPAuth\Config($dbh);
        $auth   = new PHPAuth\Auth($dbh, $config);

        $registerReturn = $auth->register($email, $password, $password);
        if($registerReturn['error'] == 0){
            $userID = $auth->getUID($email);
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "phpAutho";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO userdetails (userID, firstName, lastName, yearHSGrad)
            VALUES ($userID, $firstName,$lastName, $HSGradYear)";

            if ($conn->query($sql) === TRUE) {
                return array('error'=>false, 'message'=>'Mission accomplished! You have registered');
            } else {
                return array('error'=>true, 'message'=>"Error: " . $sql . "<br>" . $conn->error);
            }

            $conn->close();

        }else{
            return $registerReturn['message'];
        }

    }
}