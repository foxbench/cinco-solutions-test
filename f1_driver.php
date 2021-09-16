<?php
require_once 'load.php';
if (isset($_GET['driver']) && !empty($_GET['driver'])) {
    $driver = f1_search($_GET['driver']);
    if (empty($driver)) {
        show_404();
    }

    $driver_keys = ['nationality', 'birthdate'];
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
    <title>Cinco-Solutions Test</title>

    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="wrapper">
    <div class="entry">
        <h1><?php echo $driver['name']; ?></h1>
        <div class="image">
            <img src="<?php echo $driver['image']; ?>" alt="<?php echo $driver['name']; ?>">
        </div>
        <div class="description">
            <p>
                <?php echo nl2br($driver['bio']); ?>
            </p>
        </div>
        <div class="clear"></div>
        <div class="keys">
            <?php foreach ($driver_keys as $key) : ?>
                <div class="key">
                    <span class="key-text"> <?php echo strtoupper($key); ?> </span>
                    <span class="value-text"> <?php echo (isset($driver[$key]) ? $driver[$key] : 'N/A'); ?> </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</body>
</html>
