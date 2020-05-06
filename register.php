<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/login-handler.php");
    include("includes/handlers/register-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quarantunes</title>
  </head>
  <body>
    <div id="inputContainer">

        <form id="loginForm" action="register.php" method="POST">
            <h1>Team Login</h1>
            <p>       
                <label for="loginTeamname">Team name</label>
                <input id="loginTeamname" name="loginTeamname" type="text" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="text" required  name="loginPassword" required>
            </p>
            <button type="submit" name="loginButton">
            submit
            </button>
        </form>

        <form id="registerForm" action="register.php" method="POST">    
            <h2>Create Team Account</h2>

            <p>
                <?php echo $account->getError(Constants::$teamnameCharacters);?>
                <label for="teamname">Team Name</label>
                <input id="teamname" name="teamname" type="text" value="<?php getInputValue('teamname')?>" required>
            </p>

            <p>
                <?php echo $account->getError(Constants::$emailsUnmatched)?>  
                <?php echo $account->getError(Constants::$emailInvalid)?>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?php getInputValue('email')?>"required>
            </p>

            <p>
                <label for="email2">Confirm email</label>
                <input id="email2" name="email2" type="email2" value="<?php getInputValue('email')?>"required>
            </p>

            <p>
                <?php echo $account->getError(Constants::$passwordsUnmatched)?>

                <?php echo $account->getError(Constants::$passwordCharacters)?>

                <?php echo $account->getError(Constants::$passwordOnlyCharacters)?>

                <label for="password">Password</label>
                <input id="password" name="password"type="password" required>
            </p>

            <p>
                <label for="password2">Confirm Password</label>
                <input id="password2" name="password2" type="password" required>

            </p>

            <button type="submit" name="registerButton">submit</button>

        </form>

    </div>
  </body>
</html>
