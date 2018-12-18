<?php

use PHPUnit\Framework\TestCase;
use App\MarksInverter;

class InverterTest extends TestCase
{
    /**
     * @test
     */
    public function invert_symbol_order()
    {
        $inverter = new MarksInverter;

        $this->assertEquals(
            'Привет! как дела. Все хорошо! Ок? Пока,',
            $inverter->invert('Привет, как дела? Все хорошо! Ок. Пока!')
        );

        $this->assertEquals(
            'Нужны конфеты! Зачем? Чтобы быть счастливым.',
            $inverter->invert('Нужны конфеты. Зачем? Чтобы быть счастливым!')
        );
    }

    /**
     * @test
     */
    public function invert_symbol_order_v2()
    {
        $this->assertEquals(
            'Привет! как дела. Все хорошо! Ок? Пока,',
            invert('Привет, как дела? Все хорошо! Ок. Пока!')
        );

        $this->assertEquals(
            'Нужны конфеты! Зачем? Чтобы быть счастливым.',
            invert('Нужны конфеты. Зачем? Чтобы быть счастливым!')
        );
    }
}