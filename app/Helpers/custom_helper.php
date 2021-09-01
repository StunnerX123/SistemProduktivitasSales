<?php
// Function: used to convert a string to revese in order
if (!function_exists("reverse_string")) {
    function reverse_string(string $string)
    {
        return strrev($string);
    }
}

// Function: used to create slugs
if (!function_exists("slugify")) {
    function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', ' ', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', ' ', $text);

        // lowercase
        //$text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}