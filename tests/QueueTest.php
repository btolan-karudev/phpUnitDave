<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty() {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testNewItemAddedToTheQueue() 
    {
        $this->queue->push('Monica');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testRemoveItemFromTheQueue() 
    {
        $this->queue->push('Monica');
        $item = $this->queue->pop();

        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('Monica', $item);
    
    }

}