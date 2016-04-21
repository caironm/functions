<?php
// Return a URL friendly piece of text.
// This is different for character encoding because I want to control the output here.
function slug($str)
    {
    // Remove and replace HTML entities.
    $remove  = array("&", "!", "\"", "£", "$", "%", "^", "*", "(", ")", "{", "}", "[", "]", ";", ":", "@", "'", "~", "#", "/", "?", ">", "<", ".", ",", "\\", "|", "`",  "¬", "+", "=", "_");
    $replace = array("and", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "-", "", "-");
    $str     = str_replace($remove, $replace, $str);

    // Remove and replace foreign characters.
    $remove  = array("Š", "Œ", "Ž", "š", "œ", "ž", "Ÿ", "¥", "µ", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "ß", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "ÿ");
    $replace = array("S", "O", "Z", "s", "o", "z", "Y", "Y", "u", "A", "A", "A", "A", "A", "A", "A", "C", "E", "E", "E", "E", "I", "I", "I", "I", "D", "N", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "Y", "s", "a", "a", "a", "a", "a", "a", "a", "c", "e", "e", "e", "e", "i", "i", "i", "i", "o", "n", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "y", "y");
    $str     = str_replace($remove, $replace, $str);

    // Remove any adjacent multiple spaces.
    while (strstr($str, '  ')) {
        $str = str_replace('  ', ' ', $str);
    }

    // Remove any adjacent hyphens.
    while (strstr($str, '--')) {
        $str = str_replace('--', '-', $str);
    }

    // Lowercase and trim the string.
    $str = strtolower(trim($str));

    // Replace any spaces with hyphens.
    $str = str_replace(' ', '-', $str);

    // Return that super-clean-mofo of a string.
    return $str;
    }