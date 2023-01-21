<?php

require "dbBroker.php";
require "model/player.php";

session_start();

$result = Player::getPlayersByTeamID($_GET['teamID'], $conn);
if (!$result) {
    echo "Pogresan upit ! ";
    die();
}
if ($result->num_rows == 0) {
    echo "Ne postoji nijedan igrac !! ";
    die();
} else {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Players page</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/playerPage.css">
        <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    </head>

    <body>

        <body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <div class="row">
                <h1>Players</h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class=" tabelDiv">
                        <div class="panel-body table-responsive">
                            <table id="playersTable" class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Player ID</th>
                                        <th scope="col">Player Name</th>
                                        <th scope="col">Player Surname</th>
                                        <th scope="col">Drzava</th>
                                        <th scope="col" onclick="sortTable(4)">Broj poena (prosek)</th>
                                        <th scop="col" onclick="sortTable(5)">Broj asitencija(prosek)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ovde krece php t.teamID,t.name,t.titles,t.head_coach,t.founded,c.name-->
                                    <?php
                                    while ($row = $result->fetch_array()) :
                                    ?>
                                        <tr>

                                            <td><?php echo $row['playerID'] ?></td>
                                            <td><?php echo $row['playerName'] ?></td>
                                            <td><?php echo $row['lastname'] ?></td>
                                            <td><?php echo $row['country'] ?></td>
                                            <td><?php echo $row['ppg'] ?></td>
                                            <td><?php echo $row['apg'] ?></td>
                                            <td> <a href="updatePlayerPage.php?playerID=<?php echo $row["playerID"] ?>&playerName=<?php echo $row["playerName"] ?>&lastname=<?php echo $row["lastname"] ?>"><button class="updatePlayer" id="updatePlayer"> Update players</button></a></td>
                                        </tr>
                                    <?php endwhile ?>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Search...</span>
                            <input type="text" id="searchInput" class="form-control" onkeyup="search()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            <button type="button" class="btn btn-primary btn-lg" onclick="history.back();">Home page</button>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="js/main.js"></script>
                <script src="js/searchPlayer.js"></script>
                <script src="js/sortTable.js"></script>
        </body>

    </html>