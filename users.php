<?php
include_once 'vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 4/13/2017
 * Time: 8:47 PM
 */
class users
{
    private $firstName;
    private $lastName;
    private $email;
    private $HSGraduationYear;


    public function __construct()
    {
        return $this;
    }

    /**
     * @param $userID
     */
    /**
     * @param mixed $email
     */
    public function setFieldIDs($userID, $fieldIDs)
    {
        //TODO TEST AND FIX
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $resultoldFieldIDs = $this->getFieldIDs($userID);
        if($resultoldFieldIDs['error']){
            return array('error'=>true, 'message' =>'error getting old field IDs: '. $resultoldFieldIDs['message']);
        }
        $oldFieldIDs = $resultoldFieldIDs['fieldsIDArray'];
        //Remove stuff that is the same
        foreach ($fieldIDs as $fieldID) {
            foreach ($oldFieldIDs as $oldFieldID) {
                if ($oldFieldID == $fieldID) {
                    unset($oldFieldIDs[$fieldID]);
                    unset($fieldIDs[$fieldID]);
                }
            }
        }
        $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       // var_dump($fieldIDs);
        //Add stuff that is not in $oldFieldIDs into the DB
        foreach ($fieldIDs as $fieldID) {
            if (!(in_array($fieldID, $oldFieldIDs))) {
                $sql = "INSERT INTO `phpautho`.`fieldsmappping` (`userID`,`fieldID`) 
                    VALUES ('" . $userID . "', '" . $fieldID . "');";
                $data = $conn->query($sql);
                if ($data != TRUE) {
                    return array('error' => true, 'message' => "Error: " . $sql . "<br>" . $conn->error);
                }
                unset($fieldID, $fieldIDs);
            }

        }
        //Remove stuff that is $oldFieldIDs but not in the new Fields
        foreach ($oldFieldIDs as $oldFieldID) {

            if (!(in_array($oldFieldID,$fieldIDs ))) {
                $sql = "DELETE   FROM `phpautho`.`fieldsmappping` 
                        WHERE (userID = '" . $userID . "' AND fieldID = '" . $oldFieldID . "')
                        ";
                var_dump($sql);
                $data = $conn->query($sql);
                if ($data != TRUE) {
                    return array('error' => true, 'message' => "Error: " . $sql . "<br>" . $conn->error);
                }
                unset($fieldID, $fieldIDs);
            }
        }
        return array('error'=>false, 'message'=>'Mission accomplished! You have changed your fields');
    }
    public function getFieldIDs($userID){
        // Create connection
        $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `phpautho`.`fieldsmappping` WHERE userID = " . $userID ;
        $data = $conn->query($sql);
        if ($data != TRUE) {
            return array('error'=>true, 'message'=>"Error: " . $sql . "<br>" . $conn->error);
        }
        $fieldsID = array();
        for($i = 0 ; $i < $data->field_count; $i++){
            $array = $data->fetch_array();
            array_push($fieldsID, $array['fieldID']);

        }
        $conn->close();
        return array('error' => false, 'fieldsIDArray'=> $fieldsID);
    }

    public function getFields($userID){
    // Create connection
    $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $return = $this->getFieldIDs($userID);
    if($return['error'] != false){
        return $return;
    }else{
        $fieldsID = $return['fieldsIDArray'];
    }
    $fields = array();
    foreach($fieldsID  as $fieldID) {
        $sql = "SELECT * FROM `phpautho`.`fields` WHERE fieldID = " . $fieldID ;
        $data = $conn->query($sql);
        if ($data != TRUE) {
            return array('error' => true, 'message' => "Error: " . $sql . "<br>" . $conn->error);
        }
        $array = $data->fetch_array();
        array_push($fields, $array['fieldName']);
    }
    $conn->close();
    return array('error' => false, 'fieldsArray'=> $fields);
}
    public function setPictureURL($userID, $pictureURL){
        // Create connection
        $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "REPLACE INTO `phpautho`.`picturemap` (`userID`,`pictureLink`) 
                    VALUES ('".$userID."', '".$pictureURL."');";

        if ($conn->query($sql) === TRUE) {
            return array('error'=>false, 'message'=>'Mission accomplished! You have uploaded your picture');
        } else {
            return array('error'=>true, 'message'=>"Error: " . $sql . "<br>" . $conn->error);
        }

        $conn->close();

    }
    public function setResumeURL($userID, $resumeURL){
        // Create connection
        $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "REPLACE INTO `phpautho`.`resumemap` (`userID`,`resumeLink`) 
                    VALUES ('".$userID."', '".$resumeURL."');";

        if ($conn->query($sql) === TRUE) {
            return array('error'=>false, 'message'=>'Mission accomplished! You have uploaded your resume');
        } else {
            return array('error'=>true, 'message'=>"Error: " . $sql . "<br>" . $conn->error);
        }

        $conn->close();

    }
    public function getUserInfo($userID){
        $userID = (int) $userID;
        //GET EMAIL
        $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpautho", "jacob", "https://slack.com/downloads/instructions/windows");
        $config = new PHPAuth\Config($dbh);
        $auth   = new PHPAuth\Auth($dbh, $config);
        $user = $auth->getUser($userID);
        //GET OTHER INFO


        // Create connection  mysqli($servername, $username, $password, $dbname);
        $conn = new mysqli("localhost", "jacob", "https://slack.com/downloads/instructions/windows", "phpautho");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `phpautho`.`userdetails` WHERE userID = " . $userID ;
        $data = $conn->query($sql);
        if ($data == TRUE) {
            $dataArr = $data->fetch_assoc();
            $firstName =$dataArr['firstName'];
            $lastName = $dataArr['lastName'];
            $userType = $dataArr['userType'];
            $yearHSGrad = $dataArr['yearHSGrad'];
            if($userType == 1){
                $sql = "SELECT * FROM `phpautho`.`resumemap` WHERE userID = " . $userID ;
                $data = $conn->query($sql);
                    if($data != false){
                        $dataArr = $data->fetch_assoc();
                        $resumeLink =$dataArr['resumeLink'];
                    }
                $sql = "SELECT * FROM `phpautho`.`picturemap` WHERE userID = " . $userID ;
                $data = $conn->query($sql);
                if($data != false){
                    $dataArr = $data->fetch_assoc();
                    $pictureLink =$dataArr['pictureLink'];
                }
            }else{
                echo 'data = false';
                echo $conn->error;
            }
        } else {
            echo 'data = false';
            echo $conn->error;
        }

        $userInfo = array('userId'=>$userID,'email'=>$user['email'],'firstName'=>$firstName,'lastName'=>$lastName,
            'userType'=>$userType,'yearHSGrad'=>$yearHSGrad,'resumeLink'=>$resumeLink,'pictureLink'=>$pictureLink);
        $conn->close();
        return $userInfo;
    }

    public function registerUser($userType, $firstName, $lastName, $email, $HSGradYear, $password){
        $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpautho", "jacob", "https://slack.com/downloads/instructions/windows");
        $config = new PHPAuth\Config($dbh);
        $auth   = new PHPAuth\Auth($dbh, $config);
        $registerReturn = $auth->register($email, $password, $password);
        if($registerReturn['error'] == 0){
            $userID = $auth->getUID($email);
            $servername = "localhost";
            $username = "jacob";
            $password = "https://slack.com/downloads/instructions/windows";
            $dbname = "phpautho";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `phpautho`.`userdetails` (`userID`,`userType`,`firstName`, `lastName`, `yearHSGrad`) 
                    VALUES ('".$userID."', '".$userType."', '".$firstName."', '". $lastName."', '".$HSGradYear."');";

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