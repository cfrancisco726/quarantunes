<?php

   function sanitizeString($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        $input = ucfirst(strtolower($input));
        return $input;
    }

    function sanitizeTeamname($input) {
        $input = strip_tags($input);
        $input = str_replace(" ", "", $input);
        return $input;
    }

    function sanitizePassword($input) {
        $input = strip_tags($input);
        return $input;
    }


    if(isset($_POST['registerButton'])) {
        $teamname = sanitizeTeamname($_POST['teamname']);
        $email = sanitizeString($_POST['email']);
        $email2 = sanitizeString($_POST['email2']);
        $password = sanitizePassword($_POST['password']);
        $password2 = sanitizePassword($_POST['password2']);

        $wasSuccessful = $account->register($teamname, $email, $email2, $password, $password2);

        if($wasSuccessful == true) { 
            header("Location: index.php");
        }
    }
?>
