<?php

/**
 * Инвертирует порядок символов пунктуации.
 * Возвращает результирующую строку
 * 
 * @param string $str
 * @return string
 */
function invert(string $str) : string
{
    $newStr = '';
    $posMatches = [];
    $pattern = '/[^A-Za-z0-9А-Яа-я\s]/u';
    $str = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

    for ($i = 0; $i < count($str); $i++) {
        if (preg_match($pattern, $str[$i])) {
            $newStr .= '%s';
            $posMatches[] = $str[$i];
        } else {
            $newStr .= $str[$i];
        }
    }

    return sprintf($newStr, ...array_reverse($posMatches));
}