<?php

class MainApp
{
    private function main_api()
    {
        $repo_api = "https://raw.githubusercontent.com/iigmir/blog-source/master";
        return array(
            "repo" => $repo_api,
            "tags" => $repo_api . "/info-files/categories.json",
            "contents" => $repo_api . "/info-files/contents.json",
        );
    }
    public function get_tags()
    {
        return json_decode( file_get_contents( (new MainApp)->main_api()["tags"] ) );
    }
    public function get_contents()
    {
        return json_decode( file_get_contents( (new MainApp)->main_api()["contents"] ) );
    }
    public function article_url($num)
    {
        return (new MainApp)->main_api()["repo"] . "/articles/" . $num . ".md";
    }
}

?>