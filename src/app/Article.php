<?php
require( "php-markdown-lib/Michelf/Markdown.inc.php" );
use Michelf\Markdown;

function get_http_response_code($url)
{
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

class Article extends MainApp
{
    public function get_index_array( $input_array )
    {
        return array_map( function($value) { return $value->id; } , $input_array );
    }
    public function get_readable_tag( $input_array )
    {
        if( count( $input_array ) < 1 ) { return ""; }
        $object = new Article;
        $tags = $object->get_tags();
        $id_array = $object->get_index_array( $tags );
        $tags_str = "";
        $search_id = 0;
        foreach ( $input_array as $item_id )
        {
            $search_id = array_search( $item_id , $id_array );
            $tags_str .= $tags[ $search_id ]->tag_name . ", ";
        }
        return $tags_str;
    }
    public function get_article($num)
    {
        $response = (new MainApp)->article_url( $num );
        $content = get_http_response_code( $response ) != "200" ? "No contents exist!" : Markdown::defaultTransform( file_get_contents( $response ) );
        return $content;
    }
    public function get_title($num)
    {
        $title = (new MainApp)->article_url( $num );
        $content = get_http_response_code( $response ) != "200" ? "No title exist!" : "gggg";
        return $content;
    }
}

?>