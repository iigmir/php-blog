<?php

include("../app/core.php");

function get_article($id)
{
    $zero_prefix = array(
        "",
        "00",
        "0",
        ""
    );
    $correct_id = $zero_prefix[strlen($id)] . $id;
    return ( new Article )->get_article($correct_id);
}

?>
