<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\equalTo;

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

        $mailerMock->expects($this->once())
                ->method('sendMessage')
                ->with($this->equalTo('dave@gmail.com'), $this->equalTo('Hello'))
                ->willReturn(true);

        $user->setMailer($mailerMock);

        $user->email = 'dave@gmail.com';

        $this->assertTrue($user->notify("Hello"));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;
        
        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->setMethods(null)
                            ->getMock();        
                            
        $user->setMailer($mock_mailer);
        
        $this->expectException(Exception::class);
                
        $user->notify("Hello");
    }   
}