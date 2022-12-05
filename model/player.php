<?php
// playerID int(11) AI PK 
// playerName varchar(15) 
// lastplayerName varchar(25) 
// teamID int(11) 
// country varchar(20) 
// ppg float 
// apg float
class Player
{
    private $playerID;
    private $playerName;
    private $lastplayerName;
    private $teamID;
    private $country;
    private $ppg;
    private $apg;

    public function __construct(
        $playerID = null,
        $playerName = null,
        $lastplayerName = null,
        $teamID = null,
        $country = null,
        $ppg = null,
        $apg = null
    ) {

        $this->playerID = $playerID;
        $this->playerName = $playerName;
        $this->lastplayerName = $lastplayerName;
        $this->teamID = $teamID;
        $this->country = $country;
        $this->ppg = $ppg;
        $this->apg = $apg;
    }

    public static function getPlayersByTeamID($teamID, mysqli $conn)
    {
        $query = "SELECT * from player where teamID=$teamID";
        return $conn->query($query);
    }



    public static function updatePlayer($playerID,  $teamID, $country, $ppg, $apg, mysqli $conn)
    {

        $q = "UPDATE player set teamID=$teamID,country='$country', ppg=$ppg,apg=$apg WHERE playerID=$playerID";
        return $conn->query($q);
    }
}
