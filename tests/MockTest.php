<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock() {
        $mailerMock = $this->createMock(Mailer::class);

        $mailerMock->method('sendMessage')
                    ->willReturn(true);

        $result = $mailerMock->sendMessage('emilio@gmail.Com', 'Hello Emilio');

        $this->assertTrue($result);
    }
}