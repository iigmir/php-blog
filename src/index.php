<!DOCTYPE html>
<html lang="en">
<?php
    include("./app/core.php");
    function href( $input ) { return "/article/" . $input; };
    $app = new Article;
    $my_contents = $app->get_contents();
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>露比的銳思</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocas-ui/2.3.3/tocas.css" />
    <link rel="stylesheet" href="./index.css" />
</head>
<body>
    <main class="ts container">
        <h1 class="ts header">露比的銳思</h1>
        <article>
            <?php
            foreach ( array_reverse($my_contents) as $item )
            {
                $readable_tag = $app->get_readable_tag($item->category_id);
            ?> 
            <div class="ts card">
                <div class="content">
                    <?php echo( "<a class='header' href='".href($item->id)."'>$item->title</a>" ); ?> 
                    <div class="description">
                        <p><?php echo($readable_tag) ?></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?> 
        </article>
    </main>
    <script src="./index.js"></script>
</body>
</html>