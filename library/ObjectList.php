<?php

  /**
   * ObjectList, list containing instances of specified class
   * 
   * ObjectList is a list that can contain instances of specified class only.
   * This extends SplDoublyLinkedList, so use like that almost.
   * 
   * Construct with class name that items of list belong to:
   * <code>
   * require_once 'ObjectList.php';
   *
   * class Book
   * {
   *     // definition of Book class
   * }
   *
   * $bookList = new ObjectList('Book');
   * </code>
   * 
   * List can accept instances of given class:
   * <code>
   * $bookList->push(new Book);
   * $bookList->unshift(new Book);
   * $bookList->offsetSet(0, new Book);
   * </code>
   *
   * But it cannot accept instances of other class:
   * <code>
   * $bookList->push(new stdClass); // => OutOfBoundsException thrown
   * $bookList->unshift(new stdClass); // => OutOfBoundsException thrown
   * $bookList->offsetSet(0, new stdClass); // => OutOfBoundsException thrown
   * </code>
   */

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
            throw new OutOfBoundsException("argument must be an instance of {$this->className}");
        }
    }
}