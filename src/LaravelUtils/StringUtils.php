<?php

namespace LaravelUtils;

class StringUtils
{
    public static function stringToWordArray($string, $length = 76)
    {
        $return = array();
        $stringArray = array_chunk(preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY), $length);
        foreach ($stringArray as $string) {
            $return[] = join("", $string);
        }
        return $return;
    }

    public static function stringToSlug($text)
    {
        $text = strtolower($text);
        return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $text));
    }

    public static function stringToYoutubeEmbed($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }

    public static function stringToAcronym($string){
        $words = explode(" ", $string);
        $acronym = "";
        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        return $acronym;
    }
}
