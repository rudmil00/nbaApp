<?php
require "../dbBroker.php";
require  "../model/team.php";

if (isset($_POST['teamID'])) {

    $status = Team::deleteById($_POST['teamID'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}
