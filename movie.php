<?php
require_once 'load.php';
if (isset($_GET['movie_name']) && !empty($_GET['movie_name'])) {
    $movie = movie_search($_GET['movie_name']);
    if (empty($movie)) {
        show_404();
    }
    $movie_keys = [
        "Year",
        "Rated",
        "Released",
        "Runtime",
        "Genre",
        "Director",
        "Writer",
        "Actors",
        "Language",
        "Country",
        "Awards",
        "Metascore",
        "imdbRating",
        "imdbVotes",
        "imdbID",
        "Type",
        "DVD",
        "BoxOffice"
    ];
} else {
    show_404();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $movie['Title']; ?></title>

    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="wrapper">
    <div class="entry">
        <h1><?php echo $movie['Title']; ?></h1>
        <div class="image">
            <img src="<?php echo $movie['Poster']; ?>" alt="<?php echo $movie['Title']; ?>">
        </div>
        <div class="description">
            <p>
                <?php echo nl2br($movie['Plot']); ?>
            </p>
        </div>
        <div class="clear"></div>
        <div class="keys">
            <?php foreach ($movie_keys as $key) : ?>
                <div class="key">
                    <span class="key-text"> <?php echo strtoupper($key); ?> </span>
                    <span class="value-text"> <?php echo(isset($movie[$key]) ? $movie[$key] : 'N/A'); ?> </span>
                </div>
            <?php endforeach; ?>
            <div class="clear"></div>
        </div>
    </div>

</div>
</body>
</html>