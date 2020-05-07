<?php
    if(isset($_POST['loginButton'])){
        $loginTeamname = $_POST['loginTeamname'];
        $loginPassword = $_POST['loginPassword'];

        $loginSuccessful = $account->login($loginTeamname, $loginPassword);

        if($loginSuccessful) {
            $_SESSION['userLoggedIn'] = $loginTeamname;
            header("Location: index.php");
        }
    }

?>