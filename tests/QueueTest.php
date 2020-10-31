<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testNewQueueIsEmpty() {

        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());
        
    }

    public function testNewItemAddedToTheQueue() {

        $queue = new Queue;
        $queue->push('Monica');

        $this->assertEquals(1, $queue->getCount());
        
    }

    public function testRemoveItemFromTheQueue() {

        $queue = new Queue;
        $queue->push('Monica');

        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals('Monica', $item);
        
    }

}