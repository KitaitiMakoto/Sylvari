<?php

  /**
   * ObjectList, list containing instances of specified class
   * 
   * ObjectList is a list that can contain instances of specified class only.
   * This extends SplDoublyLinkedList, so see document of it for most APIs.
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
   *
   * LICENSE:
   *     This file(ObjectList.php) is distributed under the term of the MIT License.
   *     See http://www.opensource.org/licenses/mit-license.php for the term.
   *
   * @author    KITAITI Makoto
   * @copyright Copyright (c) 2011 KITAITI Makoto <KitaitiMakoto@gmail.com>
   * @license   http://www.opensource.org/licenses/mit-license.php MIT License
   */

class ObjectList extends SplDoublyLinkedList
{
    protected $className;
    
    /**
     * @param $className The class name which this list can contain instances of.
     */
    public function __construct($className)
    {
        $this->className = strval($className);
    }
    
    /**
     * @param $index               The index being set.
     * @param $newObj              The new object for the index.
     * @throw OutOfBoundsException If the new objecct is not an instance of set class.
     */
    public function offsetSet($index, $newObj)
    {
        $this->assert($newObj);
        parent::offsetSet($index, $newObj);
    }
    
    /**
     * @param $obj                 The object to push.
     * @throw OutOfBoundsException If the new objecct is not an instance of set class.
     */
    public function push($obj)
    {
        $this->assert($obj);
        parent::push($obj);
    }
    
    /**
     * @param $obj                 The object to unshift.
     * @throw OutOfBoundsException If the new objecct is not an instance of set class.
     */
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