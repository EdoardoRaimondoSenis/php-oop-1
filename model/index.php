<?php 

class Production {
    public $main_actor;
    public $director;

    function __construct($main_actor, $director) {
        $this->main_actor = $main_actor;
        $this->director = $director;
    }

}

class Movies {
    public $title;
    public $length;
    public $genre;
    public $production;

    function __construct($title, $length, $genre, Production $production) {
        $this->title = $title;
        $this->length = $length;
        $this->genre = $genre;
        $this->production = $production;
    }

    public function getMovieDescription() {
        return "Diretto da {$this->production->director}, con {$this->production->main_actor}.";
    }

}


$mission_impossible = new Movies('Mission: Impossible', '1.50h', 'Action/Thriller', new Production('Tom Cruise', 'Brian De Palma'));
$cars = new Movies('Cars', '1.57h', 'Family/Comedy', new Production('Owen Wilson', 'John Lasseter'));

$movies = [$mission_impossible, $cars];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
</head>
<body>
    <?php foreach($movies as $Movie): ?>
    <div>
        <h2><?php echo $Movie->title ?></h2>
        <span><?php echo $Movie->length ?></span><br>
        <span><?php echo $Movie->genre ?></span><br>
        <span><?php echo $Movie->getMovieDescription() ?></span>
    </div>
    <?php endforeach; ?>
</body>
</html>