<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place/php";

    session_start();

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function(){
      
        $output = "";

        $all_places = Place::getAll;

        if(!empty($all_places)) {
            $output .= "
                <h1>Places You Have Been</h1>
                ";
            foreach ($all_places as $place) {
                $output .= "<p>" . $place->getLocation() . "</p>";
            }
        }

    $output .= "
        <form action='/places' method='post'>
            <label for='location'>Place Name</label>
            <input id='location' name='location' type='text'>

            <button type='submit'>Add Place</button>
        </form>
    ";

    $output .= "
        <form action='/delete_places' method='post'>
            <button type='submit'>delete</button>
        </form>
    ";

    return $output;
});

$app->post("/places", function() {
    $place = new Place($_POST['location']);
    $location->save();
    return "
        <h1>You have marked a location!</h1>
        <p>" . $place->getLocation() . "</p>
        <p><a href='/'>View the list of places you have been </a></p>
    ";
});

$app->post("/delete_places", function() {

    Place::deleteAll();

    return "
        <h1>List Cleared!</h1>
        <p><a href='/'>Home</a></p>
    ";
});

return $app;

?>
