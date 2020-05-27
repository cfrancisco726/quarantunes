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
        <div class="mainContainer">

            <div id="topContainer">
                <div id="navBarContainer">
                    <nav class="navbar">

                    <div class="">
                        <a href="">
                            <div class="navItem">LOGO</div>
                        </a>
                    </div>
                        
                    <div class="navGroup">
                        <a href="search.php">
                            <div class="navItem">Search</div>
                        </a>
                    </div>

                    <div class="navGroup">
                        <a href="browse.php">
                            <div class="navItem">Browse</div>
                        </a>
                    </div>

                    <div class="navGroup">
                        <a href="playlist.php">
                            <div class="navItem">Playlist</div>
                        </a>
                    </div>

                    <div class="navGroup">
                        <a href="profile">
                            <div class="navItem">Profile</div>
                        </a>
                    </div>
                        
                    </nav>
                </div>
            </div>

            <div id="playerBarContainer">
                <div id="playerBar">

                    <div id="playerBarLeft">
                        <div class="container content">
                            <div class="albumArt">
                                <img src="assets/images/album-covers/theLowEndTheory.png" alt="album-cover" class="albumCover">
                            </div>

                            <div class="trackInfo">
                                <div class="trackArtist">
                                    <div>A Tribe Called Quest</div>
                                </div>
                            
                                <div class="trackSong">
                                    <div>Excursions</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="playerBarMiddle">
                        <div class="container playerControls"></div>
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

                                <button class="controlButton pause" title="Pause button" style="display: none;">
                                    <img src="assets/images/icons/pause.png" title="Pause button" alt="pause">
                                </button>
                                

                                <button class="controlButton next" title="Next button">
                                    <img src="assets/images/icons/next.png"  alt="next">
                                </button>

                                <button class="controlButton repeat" title="Repeat Button">
                                    <img src="assets/images/icons/repeat.png" alt="repeat">
                                </button>

                            </div>
                            <div class="progressBarContainer">
                                <div class="progressTime current">0:00</div>

                                <div class="progressBar">
                                    <div class="progressBarBg">
                                        <div class="progress"></div>
                                    </div>
                                </div>

                                <div class="progressTime remaining">0:00</div>
                            
                            </div>
                        </div>   
                    <div>

                    <div id="playerBarRight">
                        <div class="container volume">
                            <div>
                                <button class="controlButton volume" title="Volume Button">
                                    <img src="assets/images/icons/volume.png" alt="volume">
                                </button>
                            </div>

                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>    

        </div>
    </body>
</html>