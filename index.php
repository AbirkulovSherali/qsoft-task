<?php

    require_once __DIR__.'/vendor/autoload.php';

    use App\MarksInverter;

    $inverter = new MarksInverter;

    $result = $inverter->invert('Привет, как дела? Все хорошо! Ок. Пока!');
    echo 'Привет, как дела? Все хорошо! Ок. Пока!<br>';
    echo $result.'<br><br>';

    $result = $inverter->invert('Нужны конфеты. Зачем? Чтобы быть счастливым!');
    echo 'Нужны конфеты. Зачем? Чтобы быть счастливым!<br>';
    echo $result;