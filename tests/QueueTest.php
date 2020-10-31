<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;        
    }
    
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;        
    }    

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testNewItemAddedToTheQueue() 
    {
        static::$queue->push('Monica');
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testRemoveItemFromTheQueue() 
    {
        static::$queue->push('Monica');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('Monica', $item);
    }

    public function testAnItemIsRemoveFromTheFrontOfTheQueue() 
    {
        $item1 = static::$queue->push('first');
        $item2 = static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());

    }

}