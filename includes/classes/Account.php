<?php
class Account {
	private $con;
	private $errorArray;

	public function __construct($con) {
		$this->con = $con;
		$this->errorArray = [];
	}

	public function login($un, $pw) {
		$pw = md5($pw);
		$loginQuery = mysqli_query(
			$this->con,
			"SELECT * FROM users WHERE username='$un' and password='$pw' "
		);

		if (mysqli_num_rows($loginQuery) == 1) {
			return true;
		} else {
			array_push($this->errorArray, Constants::$loginFailed);
			return false;
		}
	}

	public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
		$this->validateUsername($un);
		$this->validateEmails($em, $em2);
		$this->validatePasswords($pw, $pw2);

		if (empty($this->errorArray) == true) {
			return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
		} else {
			return false;
		}
	}

	public function getError($error) {
		if (!in_array($error, $this->errorArray)) {
			$error = '';
		}
		return "<span class='errorMessage'>$error</span>";
	}

	private function insertUserDetails($fn, $ln, $un, $em, $pw) {
		$encryptedPw = md5($pw);
		$profilePic = 'assets/images/profile-pics/group-profile-pic';
		$date = date('Y-m-d');

		$result = mysqli_query(
			$this->con,
			"INSERT INTO users VALUES (null, '$fn', '$ln', '$un', '$em', '$encryptedPw', '$date', '$profilePic')"
        );
        return $result;

	}

	private function validateUsername($un) {
		if (strlen($un) > 25 || strlen($un) < 3) {
			array_push($this->errorArray, Constants::$usernameCharacters);
			return;
		}

		$checkUsernameQuery = mysqli_query(
			$this->con,
			"SELECT username FROM users WHERE username='$un'"
		);
		if (mysqli_num_rows($checkUsernameQuery) != 0) {
			array_push($this->errorArray, Constants::$usernameTaken);
			return;
		}
	}

	private function validateEmails($em, $em2) {
		if ($em != $em2) {
			array_push($this->errorArray, Constants::$emailsUnmatched);
			return;
		}

		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}

		$checkEmailQuery = mysqli_query(
			$this->con,
			"SELECT email FROM users WHERE email='$em'"
		);
		if (mysqli_num_rows($checkEmailQuery) != 0) {
			array_push($this->errorArray, Constants::$emailTaken);
			return;
		}
	}
	private function validatePasswords($pw, $pw2) {
		if ($pw != $pw2) {
			array_push($this->errorArray, Constants::$passwordsUnmatched);
			return;
		}

		if (preg_match('/[^A-Za-z0-9]/', $pw)) {
			array_push($this->errorArray, Constants::$passwordOnlyCharacters);
			return;
		}

		if (strlen($pw) > 30 || strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return;
		}
	}
}
?>
