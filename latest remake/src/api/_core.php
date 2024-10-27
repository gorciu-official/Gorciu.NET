<?php
    /** 
     * Gorciu.NET
     * A future social-media platform with superpowers.
     * (c) 2024 Gorciu
    */

    /**
     * Prints start from a page.
     */
    function gn_print_pagestart(string $title, string $desc, bool $override_aftertitle = false) : void {
        $text = '<!DOCTYPE html><html lang="pl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="^^^desc^^^"><title>^^^title^^^</title><script src="/assets/script.js"></script><link rel="stylesheet" href="/assets/style.css"><link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon"></head><body>';

        // Replace title in text
        if ($override_aftertitle) {
            $text = str_replace('^^^title^^^', $title, $text);
        } else {
            $text = str_replace('^^^title^^^', $title . ' - Gorciu.NET', $text);
        }

        // Replace title
        $text = str_replace('^^^desc^^^', $desc, $text);

        // Print the text
        echo $text;
        gn_print_header();
    }

    /**
     * Prints page end.
     */
    function gn_print_pageend() : void {
        echo '</main></body></html>';
    }

    /**
     * Internal function. Loads header component.
     */
    function gn_print_header() : void {
        require 'content/component.header.php';
    }

    /**
     * Returns an array for URL checks.
     */
    function gn_parse_uri() {
        $uri = $_SERVER['REQUEST_URI'];
        $parsed = parse_url($uri);
        if (!$parsed['path']) {
            return [''];
        }
        return explode('/', trim($parsed['path'], '/'));
    }

    session_start();
    define('GN_DB', ["host"=>"gorciu","user"=>"root","pass"=>"","base"=>"gorciu"]);