<?php

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{

    public function testAddAndReturnTheCorrrectSum() 
    {
        $funtion = new Functions;

        $this->assertEquals(120, $funtion->add(70, 50));
    }

}