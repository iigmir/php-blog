<!DOCTYPE html>
<html lang="en">
<?php
    include("./app/core.php");
    function href( $input ) { return "/article/" . $input; };
    $app = new Article;
    $my_contents = $app->get_contents();
    function array_to_html( $input_array, $app )
    {
        $str = "";
        foreach( $input_array as $item )
        {
            $readable_tag = $app->get_readable_tag($item->category_id);
            $link = '<a class="header" href="' .href($item->id). '">' .$item->title. '</a>';
            $desc = '<div class="description"> <p>' .$readable_tag. '</p></div>';
            $str .= '<section class="ts card"><div class="content">' . $link . $desc . '</div></section>';
        }
        return $str;
    }
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
                $ary = array_reverse( array_slice($my_contents,0,4) ); // 1sec
                // $ary = $my_contents; // 15sec
                // var_dump( array_slice($my_contents,0,4) );
                // var_dump( $ary );
                echo( array_to_html( $ary, $app ) );
            ?> 
        </article>
    </main>
    <script src="./index.js"></script>
</body>
</html>