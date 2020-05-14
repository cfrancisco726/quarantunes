<?php

   function sanitizeString($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = ucfirst(strtolower($input));
        return $input;
    }

    function sanitizeUsername($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }

    function sanitizePassword($input) {
        $input = strip_tags($input);
        return $input;
    }


    if(isset($_POST['registerButton'])) {
        $username = sanitizeUsername($_POST['username']);
        $firstname = sanitizeString($_POST['firstname']);
        $lastname = sanitizeString($_POST['lastname']);
        $email = sanitizeString($_POST['email']);
        $email2 = sanitizeString($_POST['email2']);
        $password = sanitizePassword($_POST['password']);
        $password2 = sanitizePassword($_POST['password2']);

        $registerSuccessful = $account->register( $firstname, $lastname, $username, $email, $email2, $password, $password2);

        if($registerSuccessful) { 
            $_SESSION['userLoggedIn'] = $loginUsername;
            header("Location: index.php");
        }
    }
?>
