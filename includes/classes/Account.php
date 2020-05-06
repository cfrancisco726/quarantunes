<?php
    class Account {

        private $con;
        private $errorArray;

        public function __construct($con) {  
            $this->con = $con;
            $this->errorArray = array();
        }

        public function register($tn, $em, $em2, $pw, $pw2) {
            $this->validateTeamname($tn);
            $this->validateEmail($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if(empty($this->errorArray)) {
                return $this->insertUserDetails($tn, $em, $pw);
            }
            else {
                return false;
            }
        }

        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($tn, $em, $pw) {
            $encryptedPw = md5($pw);
            $profilePic = "assets/images/profile-pics/group-profile-pic.jpeg";
            $date = date("Y-m-d");

            $result = mysqli_query($this->con, "INSERT INTO users VALUES('', '$tn', '$em', '$encryptedPw', '$date', '$profilePic' )");
            return $result;
        }

        private function validateTeamname($tn) {
            if(strlen($tn) > 25 || strlen($tn) < 3) {
                array_push($this->errorArray, Constants::$teamnameCharacters);

            } 
        }
        
        private function validateEmail($em, $em2){            
            if($em != $em2) {
                array_push($this->errorArray, Constants::$emailsUnmatched);
                return;
            }
            

            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
    
        }
    
        private function validatePasswords($pw, $pw2){
            if($pw != $pw2) {
                array_push($this->errorArray, (Constants::$passwordsUnmatched));
                return;
            }

            
            if(strlen($pw) > 25 || strlen($pw) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            } 

            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
                array_push($this->errorArray, Constants::$passwordOnlyCharacters);
            }
        }
    }
?>