<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place/php";


$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
));

$app->get("/", function(){
    $output = "";

    foreach (Place::getAll() as $place) {
        $output = $output . "<p>" . $task->getLocation() . "</p>";
    }
});

return $app;

?>
