<?php
include 'includes/config.php';
// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header('Location: register.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quarantunes</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" > 
    </head>
    <body>
        <div id="playerBarContainer">
            <div id="playerBar">
                <div id="playerBarLeft">left</div>
                <div id="playerBarMiddle">
                    <div class="content playerControls" ></div>
                        <div class="buttons">

                            <button class="controlButton shuffle" title="Shuffle button">
                                <img src="assets/images/icons/shuffle.png" alt="shuffle">
                            </button>

                            <button class="controlButton last" title="Last button">
                                <img src="assets/images/icons/last.png" alt="last">
                            </button>

                            <button class="controlButton play" title="Play button">
                                <img src="assets/images/icons/play.png" title="Play button"alt="play">
                            </button>

                            <button class="controlButton pause" title="Pause button">
                                <img src="assets/images/icons/play.png" title="Pause button" alt="play">
                            </button>
                            

                            <button class="controlButton next" title="Next button">
                                <img src="assets/images/icons/next.png"  alt="next">
                            </button>

                            <button class="controlButton repeat" title="Repeat Button">
                                <img src="assets/images/icons/repeat.png" alt="repeat">
                            </button>
                            
                        </div>
                    </div>   
                <div>
            </div>

            <div id="playerBarRight">right</div>
            
            </div>
        </div>    
    </body>
</html>