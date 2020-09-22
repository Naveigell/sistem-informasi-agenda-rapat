<?php

if (!function_exists('html_filter')) {
    function html_filter($html) {

//        $html = htmlentities($html);
        $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
        $html = preg_replace('#<img(.*?)>(.*?)/>#is', '', $html);

        return $html;
    }
}

