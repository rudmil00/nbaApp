<?php
class City
{
    public int $cityID;
    public $cityName;

    public function __construct($cityID = null, $cityName = null)
    {
        $this->cityID = $cityID;
        $this->cityName = $cityName;
    }

    public static function getCity(mysqli $conn, $name)
    {
        $query = "SELECT cityID from city where cityName='$name'";
        // $rezultat = $conn->query($query);
        $result = mysqli_query($conn, $query);
        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        print_r($result);
        return $array;
    }
}
