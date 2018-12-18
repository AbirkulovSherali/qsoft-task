<?php

namespace App;

/**
 * Класс для выполнения инвертирования 
 * порядка символов пунктуации
 */
class MarksInverter {
    private $str;
    private $posMatches;

    /**
     * Сохраняет позицию каждого символа пунктуации
     * 
     * @return void
     */
    public function savePosMatches()
    {
        $this->posMatches = [];
        $pattern = '/[^A-Za-z0-9А-Яа-я\s]/u';

        for ($i = 0; $i < count($this->str); $i++) {
            if (preg_match($pattern, $this->str[$i])) {
                $this->posMatches[] = $i;
            }
        }
    }

    /**
     * Инвертирует порядок символов пунктуации.
     * Возвращает результирующую строку
     * 
     * @param string $str
     * @return string
     */
    public function invert(string $str) : string
    {
        /**
         * Трюк для обхода мульбайтовой строки
         * путем преобразования ее в массив
         */
        $this->str = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);

        $this->savePosMatches();
        $posMatches = $this->posMatches;
        $matchesCount = count($posMatches);

        for ($i = 0; $i < ($matchesCount / 2); $i++) {
            $reversedPos = $matchesCount - $i - 1;
            
            $tmp = $this->str[$posMatches[$i]];
            $this->str[$posMatches[$i]] = $this->str[$posMatches[$reversedPos]];
            $this->str[$posMatches[$reversedPos]] = $tmp;
        }

        return implode($this->str);
    }
}

