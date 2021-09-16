<?php


function f1_search($name)
{
    $name = strtolower($name);
    $f1_data = json_decode(file_get_contents('assets/data/f1.json'), true);

    $filtered_drivers = array_filter($f1_data['drivers'], function ($driver) use ($name) {
        return (strpos(strtolower($driver['name']), $name) !== false);
    });

    if(!empty($filtered_drivers))
        return reset($filtered_drivers);

    return [];
}

function movie_search($name) {

    $name = strtolower($name);

    $api_url = "http://www.omdbapi.com/?plot=full&apikey=631cf985&t=" . $name;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $response = curl_exec($ch);
    curl_close($ch);

    $movie = json_decode($response, true);

    if(empty($movie) || $movie['Response'] == "False") {
        return [];
    }

    return $movie;
}

function show_404() {
    include('404.php');
    exit;
}


function load_header($title) {
    include('templates/header.php');
}

function load_footer() {
    include('templates/footer.php');
}