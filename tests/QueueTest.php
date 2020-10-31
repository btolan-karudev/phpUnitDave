<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;    
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

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }        
        
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());        
    }
    
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }     

        $this->expectException(QueueException::class);
        
        $this->expectExceptionMessage("Queue is full");        
        
        $this->queue->push("wafer thin mint");           
    }   

}