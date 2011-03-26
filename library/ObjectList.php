<?php

class ObjectList extends SplDoublyLinkedList
{
    private $className;
    
    public function __construct($className)
    {
        $this->className = strval($className);
    }
    
    public function offsetSet($index, $newObj)
    {
        $this->assert($newObj);
        parent::offsetSet($index, $newObj);
    }
    
    public function push($obj)
    {
        $this->assert($obj);
        parent::push($obj);
    }
    
    public function unshift($obj)
    {
        $this->assert($obj);
        parent::unshift($obj);
    }
    
    protected function assert($obj)
    {
        if (! $obj instanceof $this->className) {
            throw new OutOfBoundsException("argument must be an instance of $this->className");
        }
    }
}