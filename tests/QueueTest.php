<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testNewQueueIsEmpty() {

        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());

        return $queue;
        
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testNewItemAddedToTheQueue(Queue $queue) {

        $queue->push('Monica');

        $this->assertEquals(1, $queue->getCount());

        return $queue;
        
    }

    /**
     * @depends testNewItemAddedToTheQueue
     */
    public function testRemoveItemFromTheQueue(Queue $queue) {
        
        $item = $queue->pop();

        $this->assertEquals(0, $queue->getCount());
        $this->assertEquals('Monica', $item);
        
    }

}