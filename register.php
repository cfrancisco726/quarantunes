<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quarantunes</title>
  </head>
  <body>
    <div id="inputContainer">
      <form action="">
      <h1>Team Login</h1>
        <p>       
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text"  required>
		</p>
        <p>
            <label for="loginPassword"></label>
            <input type="text">

        </p>

      </form>

    </div>

  </body>
</html>
