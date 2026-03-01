<?php

$key = "UTS";

function vigenereEncrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $result = "";
    $keyLength = strlen($key);
    $keyIndex = 0;

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $shift = ord($key[$keyIndex % $keyLength]) - 65;
            $encrypted = chr(((ord($char) - 65 + $shift) % 26) + 65);
            $result .= $encrypted;
            $keyIndex++;
        } else {
            $result .= $char;
        }
    }

    return $result;
}

function vigenereDecrypt($text, $key) {
    $text = strtoupper($text);
    $key = strtoupper($key);
    $result = "";
    $keyLength = strlen($key);
    $keyIndex = 0;

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $shift = ord($key[$keyIndex % $keyLength]) - 65;
            $decrypted = chr(((ord($char) - 65 - $shift + 26) % 26) + 65);
            $result .= $decrypted;
            $keyIndex++;
        } else {
            $result .= $char;
        }
    }

    return $result;
}
?>