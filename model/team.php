<?php
// teamID int(11) AI PK 
// teamName varchar(50) 
// titles int(11) 
// head_coach varchar(30) 
// founded date 
// city
class Team
{
    private $teamID;
    private $teamName;
    private $titles;
    private $head_coach;
    private $founded;
    private City $city;

    public function __construct($teamID = null, $teamName = null, $titles = null, $head_coach = null, $founded = null, $city = null)
    {
        $this->teamID = $teamID;
        $this->teamName = $teamName;
        $this->titles = $titles;
        $this->head_coach = $head_coach;
        $this->founded = $founded;
        $this->city = $city;
    }

    public static function getAllTeam(mysqli $conn)
    {
        $query = "SELECT t.teamID,t.teamName,t.titles,t.head_coach,t.founded,c.cityName FROM team  t join city  c on (t.cityID=c.cityID) ORDER BY t.teamID ASC";

        return $conn->query($query);
    }
    public static function add(Team $team, mysqli $conn)
    {

        if ($team == null) {
        }
        $a = $team->city->cityID;

        $q = "INSERT INTO team(teamName,titles,head_coach,founded,cityID)  VALUES('$team->teamName',$team->titles,'$team->head_coach','$team->founded',$a)";
        // echo "Ovo je $q";
        return $conn->query($q);
    }

    public static function deleteByID($id, mysqli $conn)
    {
        $query = "DELETE FROM team WHERE teamID=$id";
        return $conn->query($query);
    }


    public static function getTeamID($name, mysqli $conn)
    {
        $query = "SELECT teamID from team where teamName='$name'";

        $result = mysqli_query($conn, $query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        print_r($result);
        return $array;
    }
}
