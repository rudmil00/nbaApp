<?php

require "dbBroker.php";
require "model/team.php";


session_start();

if (empty($_SESSION['logged']) || $_SESSION['logged'] == '' || $_SESSION['user_id'] < 0) {
    header("Location: index.php");
    die();
}

if (isset($_POST['radio'])) {
    $varTeam = $_GET['radio'];
    $_SESSION['radio'] = $varTeam;
    header('Location: playersPage.php');
    exit();
}

$result = Team::getAllTeam($conn);
if (!$result) {
    echo "Pogresan upit ! ! !  <br>";
    die();
}




if ($result->num_rows == 0) {
    echo "Nema nijednog tima! ";
    die();
} else {





?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
        <link rel="icon" href="image/favicon.ico" type="image/x-icon">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
        </style>
        <title>Home</title>
    </head>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <div class="row">
            <h1>NBA Teams</h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class=" tabelDiv">
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">TeamID</th>
                                    <th scope="col">Team name</th>
                                    <th scope="col">Titles</th>
                                    <th scope="col">Head Coach</th>
                                    <th scope="col">Founded</th>
                                    <th scop="col">City name</th>
                                    <th scop="col"></th>
                                    <th scop="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ovde krece php t.teamID,t.name,t.titles,t.head_coach,t.founded,c.name-->
                                <?php
                                while ($row = $result->fetch_array()) :
                                ?>
                                    <tr>

                                        <td><?php echo $row['teamID'] ?></td>
                                        <td><?php echo $row['teamName'] ?></td>
                                        <td><?php echo $row['titles'] ?></td>
                                        <td><?php echo $row['head_coach'] ?></td>
                                        <td><?php echo $row['founded'] ?></td>
                                        <td><?php echo $row['cityName'] ?></td>
                                        <td> <a href="playersPage.php?teamID=<?php echo $row["teamID"] ?>"><button class="viewPlayers" id="viewPlayers"> View players</button></a></td>
                                        <td>

                                            <label class=" radio-btn">
                                                <input type="radio" name="radio" value=<?php echo $row["teamID"] ?>>
                                                <span class="checkmark"></span>

                                            </label>
                                        </td>

                                    </tr>
                                <?php endwhile ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <form role="form" method="post" action="#" class="formaAddTeam" id="dodajForm">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-8 col-form-label">Team name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inpuTeamName" name="teamName" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputtitles" class="col-sm-8 col-form-label">Number of titles</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputtitles" name="titles" placeholder="Number of titles">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHeadCoach" class="col-sm-8 col-form-label">Head coach</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="headCoach" name="headCoach" placeholder="Name and Surname of head coach">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputFounded" class="col-sm-8 col-form-label">Founded</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="founded" name="founded" placeholder="Date when team was founded">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputFounded" class="col-sm-8 col-form-label">City name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cityName" name="cityName" placeholder="Name of the city">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="submit" value="Add new team !" name="submit" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="buttons">
                <button type="button" id="addButton" class=" btn btn-primary btn-lg ">Dodaj novi tim</button>
                <button type="button" class="btn btn-primary btn-lg" id="deleteTeam">Obrisi tim</button>



                <a href="logout.php" class="btn btn-primary btn-lg enabled" role="button" aria-disabled="true">Odjavi se</a>


            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/main.js"></script>

    </body>

    </html>