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

    public function testAnItemIsRemoveFromTheFrontOfTheQueue() 
    {
        $item1 = $this->queue->push('first');
        $item2 = $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());

    }

}