<?php
require "../dbBroker.php";
require "../model/team.php";
require "../model/player.php";

if (
    isset($_POST['teamName']) && isset($_POST['country'])
    && isset($_POST['ppg']) && isset($_POST['apg']) && isset($_POST['playerID'])
) {
    echo "usao sam u updatePlayer hand";
    $teamID = Team::getTeamID($_POST['teamName'], $conn);
    print_r($teamID);
    foreach ($teamID as $id) {
        $idT = $id['teamID'];
    }
    print("----");
    print_r($idT);
    if (!isset($idT)) {








        die();
    }


    $status = Player::updatePlayer($_POST['playerID'], $idT, $_POST['country'], $_POST['ppg'], $_POST['apg'], $conn);
}
if ($status) {
    echo 'Success';
} else {
    echo $status;
    echo "Failed";
}
