<!DOCTYPE html>
<html lang="en">
<?php include("./md-html.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>露比的銳思</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1><a href="/">露比的銳思</a></h1>
        <!-- <h2>Foo</h2> -->
        <article>
            <?php echo( get_article( $_GET["id"] ) ); ?> 
        </article>
    </main>
</body>
</html>