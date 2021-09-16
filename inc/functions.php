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

    return false;
}

function show_404() {
    include('404.php');
    exit;
}