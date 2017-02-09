<?php

class Place
{
    private $location;

    function __construct($location)
    {
        $this->location = $location;
    }

    function getLocation()
    {
        return $this->location;
    }

    function save()
    {
        array_push($_SESSION['list_of_places'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_places'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_places'] = array();
    }
}
?>
