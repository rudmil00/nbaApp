<?php

require "dbBroker.php";
require "model/player.php";

session_start();
$playerID = $_GET['playerID'];
$name = $_GET['playerName'];
$lastName = $_GET['lastname'];

?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/updatePlayer.css">
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
</head>

<body>
    <h1><?php echo   "  You are updating  $name $lastName "; ?></h1>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <form role="form" method="post" action="#" class="updatePlayer" id="updatePlayer">

        <div class="form-group row">
            <label for="inputPlayerID" class="col-sm-8 col-form-label">Player ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="playerID" name="playerID" value="<?php echo "$playerID" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputTeamName" class="col-sm-8 col-form-label">Team name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="teamName" name="teamName" placeholder="Team name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCountry" class="col-sm-8 col-form-label">Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="country" name="country" placeholder="Country">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPointsPerGame" class="col-sm-8 col-form-label">Points per game</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ppg" name="ppg" placeholder="ppg...">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAssitsPerGame" class="col-sm-8 col-form-label">Assits per game</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="apg" name="apg" placeholder="apg...">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="Update player" name="submitPlayer" class="btn btn-primary" />
                <button type="button" class="btn btn-primary" onclick="history.back();">Players Page</button>
            </div>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/main.js"></script>

</html>