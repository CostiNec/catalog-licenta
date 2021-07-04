<?php

function hello()
{
    echo 'Hello world!';
}

function removeqsvar($url, $varname) {
    $url = preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);

    if (in_array($url[strlen($url) - 1],['?', '&'])) {
        $url = substr($url,0,-1);
    }

    return $url;
}

function urlWithNoPage()
{
    return removeqsvar($_SERVER['REQUEST_URI'], 'page');
}

function getUrlOfSpecificPage($page)
{
    $url = urlWithNoPage();

    if (count(explode('?',$url)) > 1) {
        return $url.'&page='.$page;
    }

    return $url.'?page='.$page;
}
