<?php
// Clean data for the database.
function sanitise($str) {
    // Trim.
    $str = trim($str);

    // Remove any adjacent multiple spaces.
    while (strstr($str, '  ')) {
        $str = str_replace('  ', ' ', $str);
    }

    // Replace any funny Microsoft related characters as these tend to cause issues with search.
    // The second hyphen looks a LOT like a normal one, but causes encoding issues.
    $remove  = array('“', '”', '‘', '’', '–', '‐', '…');
    $replace = array('"', '"', '&#39;', '&#39;', '-', '-', '...');
    $str     = str_replace($remove, $replace, $str);

    // Escape the data.
    // $str, encode quotes, UTF-8 encoding, false (do not double encode).
    $str = htmlentities($str, ENT_QUOTES, 'UTF-8', false);

    // If we are working with an email address or a URL, make it all lower case.
    $str = (filter_var($str, FILTER_VALIDATE_EMAIL) ? strtolower($str) : $str);
    $str = (filter_var($str, FILTER_VALIDATE_URL) ? strtolower($str) : $str);

    // Return the string.
    return $str;
}