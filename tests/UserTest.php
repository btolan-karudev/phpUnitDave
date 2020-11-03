<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {   
        $user = new User;                

        $user->first_name = "Teresa";
        $user->surname = "Green";
        
        $this->assertEquals('Teresa Green', $user->getFullName());        
    }
        
    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;
        
        $this->assertEquals('', $user->getFullName());                    
    }

    public function GetFirstNameReturnsFirstName() {
        $user = new User;
        $user->first_name = "Tereza";

        $this->assertEquals("Tereza", $user->first_name);
    }

    public function testNotificationIsSent() {
        $user = new User;

        $mailerMock = $this->createMock(Mailer::class);

        $mailerMock->method('sendMessage')
                ->willReturn(true);

        $mailerMock->sendMessage('emilio@gmail.Com', 'Hello Emilio');

        $user->setMailer($mailerMock);

        $this->assertTrue($user->notify("Salut"));
    }
}