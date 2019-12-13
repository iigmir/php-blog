<?php

function ary_loop( $al_array )
{
    $r = "";
    foreach ( $al_array as $vim ) { $r .= $vim . ","; }
    return $r;
}

?>