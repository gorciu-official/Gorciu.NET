<?php
    /** 
     * Gorciu.NET
     * A future social-media platform with superpowers.
     * (c) 2024 Gorciu
    */
    require_once 'api/_core.php';

    /**
     * The URI array.
     */
    $tua = gn_parse_uri();

    /**
     * User configuration
     */
    if (isset($_SESSION['user'])) {
        $db = new \mysqli(GN_DB['host'], GN_DB['user'], GN_DB['pass'], GN_DB['base']);
        $preparation = $db->prepare("SELECT * FROM users WHERE user=?");
        $preparation->bind_param('s', $_SESSION['user']);
        $preparation->execute();
        $query = $preparation->get_result();

        if ($query->num_rows == 0) {
            $user = false;
        } else {
            $user = $query->fetch_assoc()['user'];
        }

        $db->close();
    } else {
        $user = false;
    }

    /**
     * Configuration of the response.
     */
    $nonce = bin2hex(random_bytes(64));
    http_response_code(200);
    header("Content-Security-Policy: default-src 'self'; frame-ancestors 'self'; script-src 'self' 'nonce-$nonce'; style-src 'self';");

    /**
     * Finnally get the page
     */
    if ($tua[0] == '' && !isset($tua[1])) {
        require_once 'content/page.home.php';
    } elseif ($tua[0] == 'begin' && !isset($tua[1])) {
        require_once 'content/page.begin.php';
    } elseif ($tua[0] == 'login' && !isset($tua[1])) {
        header('Location: /begin');
    } else {
        http_response_code(404);
        gn_print_pagestart('404', 'Brak strony...');
        echo '<h1>Brak strony. To wszystko co wiem.</h1>';
        gn_print_pageend();
    }