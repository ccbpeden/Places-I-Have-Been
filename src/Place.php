class Place
{
    private $location;
    private $photo;
    private $duration;

    function __construct($location, $photo, $duration)
    {
        $this->location = $location;
        $this->photo = $photo;
        $this->duration = $duration;
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
}
