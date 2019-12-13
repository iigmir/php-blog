<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $json = file_get_contents("http://xkcd.com/info.0.json");
    $response = json_decode($json);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>xkcd: <?php echo $response->safe_title; ?></title>
    <style>
    #app h1, #app blockquote { text-align: center; }
    #app img { margin: 1rem auto; display: block; }
    </style>
</head>
<body>
    <div id="app">
        <h1><?php echo $response->safe_title; ?></h1>
        <img src="<?php echo $response->img; ?>" alt="<?php echo $response->alt; ?>" />
        <blockquote><?php echo $response->alt; ?></blockquote>
    </div>
</body>
</html>
