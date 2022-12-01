<?php

require "../dbBroker.php";
require "../model/team.php";
require "../model/city.php";





if (
    isset($_POST['teamName']) && isset($_POST['titles'])
    && isset($_POST['headCoach']) && isset($_POST['founded']) && isset($_POST['cityName'])
) {

    $cityID = City::getCity($conn, $_POST['cityName']);

    foreach ($cityID as $city) {
        $idC = $city['cityID'];
    }
    if (!isset($idC)) {

        //stavi alert box


        // PHP program to pop an alert
        // message box on the screen

        // Display the alert box 




        die();
    }
    $nameCity = strval($_POST['cityName']);

    $city = new City($idC, $nameCity);
    print_r($city);
    $team = new Team(null, $_POST['teamName'], $_POST['titles'], $_POST['headCoach'], $_POST['founded'], $city);

    print_r($team);

    $status = Team::add($team, $conn);
}
if ($status) {
    echo 'Success';
} else {
    echo $status;
    echo "Failed";
}
