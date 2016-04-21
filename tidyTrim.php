<?php
// This function trims a string and appends ... to the end to show that it has been trimmed.
function tidyTrim($str, $len) {
    // Remove any whitespace from the end.
    $str = trim($str);

    // If our string is longer than our desire length, cut it down, remove trailing whitespace and append a ...
    if(strlen($str) > $len) {
        $str = substr($str, 0, $len);
        $str = trim($str);
        $str = $str . '...';
        $str = str_replace('....', '...', $str); // This removes the extra dot, if the last character is also a dot.
    }

    return $str;
}