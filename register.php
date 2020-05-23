<?php
include 'includes/config.php';
include 'includes/classes/Account.php';
include 'includes/classes/Constants.php';

$account = new Account($con);

include 'includes/handlers/register-handler.php';
include 'includes/handlers/login-handler.php';

function getInputValue($name) {
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
// session_destroy();
?>

<html>
<head>
	<title>Quarantunes</title>
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
            <?php echo $account->getError(Constants::$loginFailed); ?>
				<label for="loginUsername">username</label>
				<input id="loginUsername" name="loginUsername" type="text"  required>
			</p>
			<p>
				<label for="loginPassword">password</label>
				<input id="loginPassword" name="loginPassword"      type="password" required>  
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>



		<form id="register" action="register.php" method="POST">
            <h2>Create account</h2>
            
            <p>
				<label for="firstname">firstname</label>
				<input id="firstname" name="firstname" type="text" value="<?php getInputValue('firstname'); ?>" required>
            </p>
            

			<p>
				<label for="lastname">lastname</label>
				<input id="lastname" name="lastname" type="text" value="<?php getInputValue('lastname'); ?>" required>
			</p>

            <p>
                <?php echo $account->getError(Constants::$usernameCharacters); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
				<label for="username">username</label>
				<input id="username" name="username" type="text" value="<?php getInputValue('username'); ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$emailsUnmatched); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" value="<?php getInputValue('email'); ?>" required>
			</p>

			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" name="email2" type="email" value="<?php getInputValue('email2'); ?>" required>
			</p>

			<p>
				<?php echo $account->getError(Constants::$passwordsUnmatched); ?>
				<?php echo $account->getError(Constants::$passwordOnlyCharacters); ?>
				<?php echo $account->getError(Constants::$passwordCharacters); ?>
				<label for="password">Password</label>
				<input id="password" name="password" type="password"  required>
			</p>

			<p>
				<label for="password2">Confirm password</label>
				<input id="password2" name="password2" type="password"  required>
			</p>

            <button type="submit" name="registerButton">SIGN UP</button>
			
		</form>


	</div>

</body>
</html>