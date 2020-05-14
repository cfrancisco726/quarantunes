<?php
    if(isset($_POST['loginButton'])){
        $loginUsername = $_POST['loginUsername'];
        $loginPassword = $_POST['loginPassword'];

        $loginSuccessful = $account->login($loginUsername, $loginPassword);

        if($loginSuccessful) {
            $_SESSION['userLoggedIn'] = $loginUsername;
            header("Location: index.php");
        }
    }

?>